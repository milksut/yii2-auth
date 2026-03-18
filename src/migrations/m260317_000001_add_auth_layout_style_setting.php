<?php

use yii\db\Migration;
use portalium\site\models\Form;
use portalium\site\Module as SiteModule;

class m260317_000001_add_auth_layout_style_setting extends Migration
{
    public function safeUp()
    {
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::layout_style',
            'label' => 'Auth Layout Style',
            'value' => 'split',
            'type' => Form::TYPE_DROPDOWNLIST,
            'is_preference' => 0,
            'config' => json_encode([
                'split' => 'Split (Two Columns)',
                'single' => 'Single (Centered Card)',
            ]),
        ]);
    }

    public function safeDown()
    {
        $this->delete(SiteModule::$tablePrefix . 'setting', [
            'name' => 'auth::layout_style',
            'module' => 'auth',
        ]);
    }
}
