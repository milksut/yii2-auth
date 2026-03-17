<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;

$this->title = Module::t('Signup');

$authBundle = AuthAsset::register($this);
$iconBundle = IconAsset::register($this);

$_appTitle = Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium');

try {
    $_heroTitle = trim(Yii::$app->setting->getValue('auth::login_hero_title') ?? '');
} catch (\Exception $e) {
    $_heroTitle = '';
}
if (empty($_heroTitle)) {
    $_heroTitle = Module::t('One Command Center');
}

try {
    $_heroSubtitle = trim(Yii::$app->setting->getValue('auth::login_hero_subtitle') ?? '');
} catch (\Exception $e) {
    $_heroSubtitle = '';
}
if (empty($_heroSubtitle)) {
    $_heroSubtitle = Module::t('Manage your entire workflow, deployments, and team communication from a single, unified interface.');
}

$_integrationNames = ['slack', 'github', 'jira', 'notion', 'linkedin', 'google'];
$_visibleIntegrations = [];
foreach ($_integrationNames as $_name) {
    try {
        $_url = trim(Yii::$app->setting->getValue('auth::' . $_name . '_url') ?? '');
    } catch (\Exception $e) {
        $_url = '';
    }
    if (!empty($_url)) {
        $_visibleIntegrations[$_name] = $_url;
    }
}
?>
<div class="auth-fullscreen-wrapper auth-fullscreen-wrapper--flipped">
    <div class="auth-left-panel mesh-gradient">
        <div class="auth-brand">
            <?= Html::img($iconBundle->baseUrl . '/favicon.ico', [
                'alt' => $_appTitle,
                'class' => 'auth-icon-md auth-brand-logo',
            ]) ?>
            <span class="auth-brand-name"><?= $_appTitle ?></span>
        </div>
        <div class="auth-hero">
            <h2 class="auth-hero-title"><?= Html::encode($_heroTitle) ?></h2>
            <p class="auth-hero-subtitle"><?= Html::encode($_heroSubtitle) ?></p>
        </div>
        <?php if (!empty($_visibleIntegrations)): ?>
        <div class="auth-badges">
            <div class="auth-badges-list">
                <?php foreach ($_visibleIntegrations as $_name => $_url): ?>
                <?= Html::a(
                    Html::img($authBundle->baseUrl . '/icons/' . $_name . '.svg', [
                        'alt' => ucfirst($_name) . ' icon',
                        'class' => 'auth-badge-icon',
                    ]),
                    Html::encode($_url),
                    [
                        'class' => 'auth-badge',
                        'title' => ucfirst($_name),
                        'target' => '_blank',
                        'rel' => 'noopener noreferrer',
                    ]
                ) ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="auth-right-panel">
        <div class="auth-form-inner--wide">
            <div class="auth-mobile-logo">
                <?= Html::img($iconBundle->baseUrl . '/favicon.ico', [
                    'alt' => $_appTitle,
                    'class' => 'auth-icon-md',
                ]) ?>
                <span class="auth-mobile-logo-name"><?= $_appTitle ?></span>
            </div>
            <div class="auth-form-header">
                <h2 class="auth-form-title"><?= Module::t('Create your Account') ?></h2>
                <p class="auth-form-subtitle">
                    <?= Module::t('Already have an account?') ?>
                    <?= Html::a(Module::t('Log in'), ['/auth/default/login'], ['class' => 'auth-link']) ?>
                </p>
            </div>
            <?php if (!Yii::$app->user->isGuest): ?>
            <div class="auth-notice">
                <?= Module::t('You are already logged in. You cannot register.') ?>
            </div>
            <?php else: ?>
            <?php
            $providers = [
                'google' => 'Google',
                'apple' => 'Apple',
                'github' => 'GitHub',
                'linkedin' => 'LinkedIn',
                'twitter' => 'Twitter',
            ];
            $hasSocial = false;
            foreach ($providers as $key => $label) {
                try {
                    $isEnabled = Yii::$app->setting->getValue('auth::' . $key . 'Enabled');
                } catch (\Exception $e) {
                    $isEnabled = false;
                }
                if ($isEnabled) {
                    $hasSocial = true;
                    echo Html::a(
                        Html::img($authBundle->baseUrl . '/icons/' . $key . '.svg', ['alt' => $label . ' icon', 'class' => 'auth-icon-xs']) . ' ' . Module::t('Continue with {provider}', ['provider' => $label]),
                        ['/auth/default/login-' . $key],
                        ['class' => 'auth-btn-social mb-3']
                    );
                }
            }
            ?>
            <?php if ($hasSocial): ?>
            <div class="auth-divider">
                <div class="auth-divider-line"></div>
                <span class="auth-divider-text"><?= Module::t('or register with email') ?></span>
                <div class="auth-divider-line"></div>
            </div>
            <?php endif; ?>
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'fieldConfig' => [
                    'template' => "<div class=\"auth-field\">{label}{input}\n{hint}\n{error}</div>",
                    'labelOptions' => ['class' => 'auth-label'],
                ],
            ]); ?>
            <div class="d-flex gap-3">
                <div class="flex-grow-1">
                    <?= $form->field($model, 'first_name')->textInput([
                        'autofocus' => true,
                        'class' => 'auth-input auth-input-sm',
                        'placeholder' => Module::t('John'),
                    ])->label(Module::t('First Name')) ?>
                </div>
                <div class="flex-grow-1">
                    <?= $form->field($model, 'last_name')->textInput([
                        'class' => 'auth-input auth-input-sm',
                        'placeholder' => Module::t('Doe'),
                    ])->label(Module::t('Last Name')) ?>
                </div>
            </div>
            <?= $form->field($model, 'username')->textInput([
                'class' => 'auth-input auth-input-sm',
                'placeholder' => Module::t('username'),
            ]) ?>
            <?= $form->field($model, 'email')->textInput([
                'class' => 'auth-input auth-input-sm',
                'placeholder' => Module::t('name@company.com'),
            ]) ?>
            <?= $form->field($model, 'password')->passwordInput([
                'class' => 'auth-input auth-input-sm',
                'placeholder' => '••••••••',
            ]) ?>
            <?= $form->field($model, 'password_confirm')->passwordInput([
                'class' => 'auth-input auth-input-sm',
                'placeholder' => '••••••••',
            ]) ?>
            <?= $form->field($model, 'verifyCode', ['template' => '{input}'])->widget(
                \himiklab\yii2\recaptcha\ReCaptcha3::className(),
                [
                    'siteKey' => '6LdtOVspAAAAAGGnMu_yPK2hlyyNAjmiQJz0v7Ws',
                    'action' => 'signup',
                ]
            ) ?>
            <div>
                <?= Html::submitButton(Module::t('Create Account'), [
                    'class' => 'btn btn-outline-success auth-btn auth-btn-sm',
                    'name' => 'signup-button',
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
