<?php

namespace portalium\auth;

use portalium\base\Event;
use portalium\auth\components\TriggerActions;

class Module extends \portalium\base\Module
{
    public static $tablePrefix = 'auth_';
    
    public static $name = 'auth';

    public static $description = 'auth Module';

    // Auth events
    const EVENT_ON_LOGIN = 'onLogin';
    const EVENT_ON_LOGOUT = 'onLogout';
    const EVENT_ON_SIGNUP = 'onSignup';

    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'auth/default',
                'auth/auth',
            ]
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('auth','@portalium/auth/messages',[
            'auth' => 'auth.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('auth', $message, $params);
    }

    /* 
        public function registerEvents()
        {
            Event::on($this::className(), UserModule::EVENT_USER_DELETE_BEFORE, [new TriggerActions(), 'onUserDeleteBefore']);
        } 
    */
}