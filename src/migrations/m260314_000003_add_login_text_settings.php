<?php

use yii\db\Migration;
use portalium\auth\Module;
use portalium\site\models\Form;
use portalium\site\Module as SiteModule;

class m260314_000003_add_login_text_settings extends Migration
{
    public function safeUp()
    {
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::login_hero_title',
            'label' => 'Login Hero Title',
            'value' => 'One Command Center',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Main heading displayed on the left panel of the login page.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::login_hero_subtitle',
            'label' => 'Login Hero Subtitle',
            'value' => 'Manage your entire organization with a single login',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Descriptive text displayed below the hero title on the login page.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::login_form_title',
            'label' => 'Login Form Title',
            'value' => 'Sign in to Command Center',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Heading displayed above the login form on the right panel.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::login_form_subtitle',
            'label' => 'Login Form Subtitle',
            'value' => 'Enter your credentials to access your dashboard',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Subtext displayed below the login form heading.'
            ])
        ]);
    }

    public function safeDown()
    {
        $this->delete(SiteModule::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::login_hero_title']);
        $this->delete(SiteModule::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::login_hero_subtitle']);
        $this->delete(SiteModule::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::login_form_title']);
        $this->delete(SiteModule::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::login_form_subtitle']);
    }
}
