<?php

use portalium\site\bundles\AppAsset;
use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;
use portalium\auth\models\LoginForm;
use portalium\user\models\User;

$this->title = Module::t('Login');
AppAsset::register($this);
?>
<div class="site-login">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h3 mb-3 fw-normal text-center"><?= Html::encode($this->title) ?></h1>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'horizontalCssClasses' => [
                                'label' => 'col-sm-4',
                                'wrapper' => 'col-sm-8',
                            ],
                            'template' => "{input}\n{hint}\n{error}",
                            'labelOptions' => ['style' => 'margin-top: 10px;'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username', ['options' => ['class' => 'form-attribute mb-3 row']])->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => Module::t('Username')]) ?>
                    <?= '<div class = "clearfix" style = "margin-top:2px;"></div>' . $form->field($model, 'password', ['options' => ['class' => 'form-attribute mb-3 row']])->passwordInput(['class' => 'form-control form-control-lg', 'placeholder' => Module::t('Password')]) ?>

                    <div class="row form-attribute">
                        <div class="col-6" style="padding-right:0px">
                            <?= Html::a(Module::t('Forgot Password!'), ['/auth/default/request-password-reset'], ['style' => 'margin-left: -10px']) ?>
                        </div>

                        <div class="col-6" style="padding-right:0px; margin-left:-13px;">
                            <?=
                            $form->field($model, 'rememberMe', ['options' => ['style' => 'margin-top:0px; float:right;']])->checkbox([
                                'template' => "<div style='padding-left:0px;padding-top:-15px; '>\n{input} {label}\n</div>",
                            ])->label(Module::t('Remember Me'), ['style' => 'margin-top: 0px;']) ?>
                        </div>

                    </div>
                    <div class="d-grid mb-3 form-attribute">
                        <?= '<div class = "clearfix"></div>' . Html::submitButton(Module::t('Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

                    </div>

                    <?php if (Yii::$app->setting->getValue('form::signup')): ?>
                        <div class="d-grid mb-3 form-attribute">
                            <?= '<div class = "clearfix"></div>' . Html::a(Module::t('Signup'), ['/auth/default/signup'], ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                        </div>
                    <?php endif; ?>
                    <?php ActiveForm::end(); ?>
                    <hr>
                    <?php 
                    // Check if any OAuth provider is enabled
                    $googleEnabled = Yii::$app->setting->getValue('auth::googleEnabled');
                    $githubEnabled = Yii::$app->setting->getValue('auth::githubEnabled');
                    $appleEnabled = Yii::$app->setting->getValue('auth::appleEnabled');
                    $twitterEnabled = Yii::$app->setting->getValue('auth::twitterEnabled');
                    $hasActiveProviders = $googleEnabled || $githubEnabled || $appleEnabled || $twitterEnabled;
                    ?>
                    
                    <?php if ($hasActiveProviders): ?>
                    <div class="login-container text-center mb-3">
                        <?php if ($googleEnabled): ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/auth/default/login-google']) ?>" class="login-btn">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                            Continue with Google
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($githubEnabled): ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/auth/default/login-github']) ?>" class="login-btn">
                            <img src="https://www.svgrepo.com/show/512317/github-142.svg" alt="GitHub">
                            Continue with GitHub
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($appleEnabled): ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/auth/default/login-apple']) ?>" class="login-btn">
                            <img src="https://www.svgrepo.com/show/511330/apple-173.svg" alt="Apple">
                            Continue with Apple
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($twitterEnabled): ?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/auth/default/login-twitter']) ?>" class="login-btn">
                            <img src="https://www.svgrepo.com/show/475689/twitter-color.svg" alt="Twitter">
                            Continue with Twitter
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>                    <style>
                    .login-container {
                        display: flex;
                        flex-direction: column;
                        gap: 12px;
                        max-width: 300px;
                        margin: 0 auto;
                    }

                    .login-btn {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 12px;
                        padding: 12px 20px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        background-color: #fff;
                        color: #333;
                        text-decoration: none;
                        font-weight: 500;
                        transition: all 0.2s ease;
                        cursor: pointer;
                    }

                    .login-btn:hover {
                        background-color: #f8f9fa;
                        border-color: #adb5bd;
                        text-decoration: none;
                        color: #333;
                    }

                    .login-btn img {
                        width: 20px;
                        height: 20px;
                    }
                    </style>
                </div>
            </div>
        </div>
    </div>
</div>