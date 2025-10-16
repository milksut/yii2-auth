<?php

use yii\db\Migration;
use portalium\auth\Module;
use portalium\site\models\Form;
use portalium\site\Module as SiteModule;

class m240917_000002_auth_oauth_settings extends Migration
{
    public function safeUp()
    {
        // Google OAuth Settings
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::googleClientId',
            'label' => 'Google Client ID',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::googleClientSecret',
            'label' => 'Google Client Secret',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::googleEnabled',
            'label' => 'Google Login Enabled',
            'value' => '0',
            'type' => Form::TYPE_CHECKBOX,
            'config' => json_encode([
                'help' => 'Enable/Disable Google OAuth login'
            ])
        ]);

        // GitHub OAuth Settings
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::githubClientId',
            'label' => 'GitHub Client ID',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::githubClientSecret',
            'label' => 'GitHub Client Secret',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::githubEnabled',
            'label' => 'GitHub Login Enabled',
            'value' => '0',
            'type' => Form::TYPE_CHECKBOX,
            'config' => json_encode([
                'help' => 'Enable/Disable GitHub OAuth login'
            ])
        ]);

        // Apple OAuth Settings
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::appleClientId',
            'label' => 'Apple Client ID',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::appleClientSecret',
            'label' => 'Apple Client Secret',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        // auth::appleTeamId
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::appleTeamId',
            'label' => 'Apple Team ID',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => json_encode([
                'help' => 'Your Apple Developer Team ID'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::appleKeyId',
            'label' => 'Apple Key ID',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => json_encode([
                'help' => 'Your Apple Key ID'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::applePrivateKey',
            'label' => 'Apple Private Key',
            'value' => '',
            'type' => Form::TYPE_TEXTAREA,
            'config' => json_encode([
                'help' => 'Your Apple private key content (.p8 file content)',
                'rows' => 10
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::appleEnabled',
            'label' => 'Apple Login Enabled',
            'value' => '0',
            'type' => Form::TYPE_CHECKBOX,
            'config' => json_encode([
                'help' => 'Enable/Disable Apple OAuth login'
            ])
        ]);

        // Twitter OAuth Settings
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::twitterClientId',
            'label' => 'Twitter Client ID',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::twitterClientSecret',
            'label' => 'Twitter Client Secret',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'config' => ''
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::twitterEnabled',
            'label' => 'Twitter Login Enabled',
            'value' => '0',
            'type' => Form::TYPE_CHECKBOX,
            'config' => json_encode([
                'help' => 'Enable/Disable Twitter OAuth login'
            ])
        ]);
    }

    public function safeDown()
    {
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::googleClientId']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::googleClientSecret']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::googleEnabled']);
        
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::githubClientId']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::githubClientSecret']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::githubEnabled']);
        
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::appleClientId']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::appleClientSecret']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::appleTeamId']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::appleKeyId']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::applePrivateKey']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::appleEnabled']);
        
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::twitterClientId']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::twitterClientSecret']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::twitterEnabled']);
    }
}