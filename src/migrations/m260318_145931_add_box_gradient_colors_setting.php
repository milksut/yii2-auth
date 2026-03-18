<?php

use yii\db\Migration;
use portalium\site\models\Form;
use portalium\site\Module as SiteModule;

class m260318_145931_add_box_gradient_colors_setting extends Migration
{
    public function safeUp()
    {
        $this->insert(SiteModule::$tablePrefix . 'setting', [
            'module' => 'auth',
            'name' => 'auth::box_gradient_colors',
            'label' => 'Feature Box Gradient Colors',
            'value' => '#011f1b, #2ecc71',
            'type' => Form::TYPE_INPUTTEXT,
            'is_preference' => 0,
            'config' => json_encode([
                'help' => 'Two comma-separated hex codes for the linear gradient in the feature boxes.'
            ]),
        ]);
    }

    public function safeDown()
    {
        $this->delete(SiteModule::$tablePrefix . 'setting', [
            'name' => 'auth::box_gradient_colors',
            'module' => 'auth',
        ]);
    }
}
