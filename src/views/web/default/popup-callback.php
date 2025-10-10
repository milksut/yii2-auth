<?php
/**
 * OAuth Popup Callback View
 * Bu view popup'tan parent window'a postMessage gönderir ve popup'ı kapatır
 */

use yii\helpers\Json;

$this->title = 'OAuth Login Callback';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f5f5f5;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
        .message {
            font-size: 18px;
            margin: 20px 0;
        }
        .loading {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($success): ?>
            <div class="success">
                <h2>✅ Giriş Başarılı</h2>
                <p class="message"><?= $message ?? 'OAuth ile giriş başarıyla tamamlandı.' ?></p>
            </div>
        <?php else: ?>
            <div class="error">
                <h2>❌ Giriş Başarısız</h2>
                <p class="message"><?= $error ?? 'Bilinmeyen bir hata oluştu.' ?></p>
            </div>
        <?php endif; ?>
        <p class="loading">Bu pencere otomatik olarak kapanacak...</p>
    </div>

    <script>
        try {
            // Parent window'a sonucu gönder
            if (window.opener && !window.opener.closed) {
                <?php if ($success): ?>
                window.opener.postMessage({
                    type: 'oauth-success',
                    <?php if (isset($userInfo)): ?>
                    userInfo: <?= Json::encode($userInfo) ?>,
                    <?php endif; ?>
                    message: <?= Json::encode($message ?? 'Login successful') ?>
                }, window.location.origin);
                <?php else: ?>
                window.opener.postMessage({
                    type: 'oauth-error',
                    error: <?= Json::encode($error ?? 'Unknown error') ?>
                }, window.location.origin);
                <?php endif; ?>
            }
        } catch (e) {
            console.error('PostMessage error:', e);
        }
        
        // Pencereyi kapat
        setTimeout(function() {
            window.close();
        }, 1500);
    </script>
</body>
</html>