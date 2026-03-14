<?php

use yii\db\Migration;
use portalium\auth\Module;
use portalium\site\models\Form;
use portalium\site\Module as SiteModule;

class m260314_000002_add_social_url_settings extends Migration
{
    public function safeUp()
    {
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::slack_url',
            'label' => 'Slack URL (Leave empty to hide)',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Enter the Slack workspace URL to show the icon on auth pages. Leave empty to hide.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::github_url',
            'label' => 'GitHub URL (Leave empty to hide)',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Enter the GitHub organization URL to show the icon on auth pages. Leave empty to hide.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::jira_url',
            'label' => 'Jira URL (Leave empty to hide)',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Enter the Jira project URL to show the icon on auth pages. Leave empty to hide.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::notion_url',
            'label' => 'Notion URL (Leave empty to hide)',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Enter the Notion workspace URL to show the icon on auth pages. Leave empty to hide.'
            ])
        ]);

        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::linkedin_url',
            'label' => 'LinkedIn URL (Leave empty to hide)',
            'value' => '',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Enter the LinkedIn page URL to show the icon on auth pages. Leave empty to hide.'
            ])
        ]);
    }

    public function safeDown()
    {
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::slack_url']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::github_url']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::jira_url']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::notion_url']);
        $this->delete(Module::$tablePrefix . 'setting', ['module' => 'auth', 'name' => 'auth::linkedin_url']);
    }
}
