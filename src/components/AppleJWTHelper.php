<?php
namespace portalium\auth\components;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AppleJWTHelper extends Component
{
    public $teamId;
    public $keyId;
    public $clientId;
    public $privateKey;

    /**
     * Creates a client secret JWT for Apple OAuth
     */
    public function createClientSecret()
    {
        // For debugging, log the values
        $privateKeyContent = Yii::$app->setting->getValue('auth::applePrivateKey');
        
        if (empty($privateKeyContent)) {
            throw new \Exception('Apple private key not configured');
        }

        // Clean up the private key content
        $privateKeyContent = trim($privateKeyContent);
        
        // Ensure proper PEM format
        if (strpos($privateKeyContent, '-----BEGIN') === false) {
            $privateKeyContent = "-----BEGIN PRIVATE KEY-----\n" . 
                chunk_split($privateKeyContent, 64, "\n") . 
                "-----END PRIVATE KEY-----";
        }

        $now = time();
        $payload = [
            'iss' => $this->teamId,
            'iat' => $now,
            'exp' => $now + 3600 * 6, // 6 hours
            'aud' => 'https://appleid.apple.com',
            'sub' => $this->clientId
        ];

        $header = [
            'kid' => $this->keyId,
            'alg' => 'ES256'
        ];

        try {

            // Use Firebase JWT to create the token
            $jwt = JWT::encode($payload, $privateKeyContent, 'ES256', $this->keyId);
            
            return $jwt;
            
        } catch (\Exception $e) {
            Yii::error('Firebase JWT creation error: ' . $e->getMessage(), 'oauth');
            throw new \Exception('Failed to create Apple JWT: ' . $e->getMessage());
        }
    }

    /**
     * Validates and decodes Apple ID token
     */
    public function decodeIdToken($idToken)
    {
        try {

            // For now, we'll decode without verification (for testing)
            // In production, you should fetch Apple's public keys and verify
            $parts = explode('.', $idToken);
            if (count($parts) !== 3) {
                throw new \Exception('Invalid ID token format');
            }

            // Decode payload without verification for now
            $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
            Yii::warning('Decoded Apple ID token payload: ' . print_r($payload, true), 'oauth');
            // Basic validation
            if (!$payload) {
                throw new \Exception('Invalid audience in ID token');
            }

            if ($payload['exp'] < time()) {
                throw new \Exception('ID token expired');
            }

            return $payload;
            
        } catch (\Exception $e) {
            Yii::error('Apple ID token decode error: ' . $e->getMessage(), 'oauth');
            return null;
        }
    }

    /**
     * Fetches Apple's public keys for token verification
     */
    public function getApplePublicKeys()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://appleid.apple.com/auth/keys')
            ->send();

        if ($response->isOk) {
            return $response->data;
        }

        return null;
    }
}