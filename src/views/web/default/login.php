<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;

$this->title = Module::t('Login');

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

try {
    $_formTitle = trim(Yii::$app->setting->getValue('auth::login_form_title') ?? '');
} catch (\Exception $e) {
    $_formTitle = '';
}
if (empty($_formTitle)) {
    $_formTitle = Module::t('Sign in to Command Center');
}

try {
    $_formSubtitle = trim(Yii::$app->setting->getValue('auth::login_form_subtitle') ?? '');
} catch (\Exception $e) {
    $_formSubtitle = '';
}
if (empty($_formSubtitle)) {
    $_formSubtitle = Module::t('Enter your credentials to access your dashboard');
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
<div class="auth-fullscreen-wrapper">
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
        <div class="auth-form-inner">
            <div class="auth-mobile-logo">
                <?= Html::img($iconBundle->baseUrl . '/favicon.ico', [
                    'alt' => $_appTitle,
                    'class' => 'auth-icon-md',
                ]) ?>
                <span class="auth-mobile-logo-name"><?= $_appTitle ?></span>
            </div>
            <div class="auth-form-header">
                <h2 class="auth-form-title"><?= Html::encode($_formTitle) ?></h2>
                <p class="auth-form-subtitle"><?= Html::encode($_formSubtitle) ?></p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "<div class=\"auth-field\">{label}{input}\n{hint}\n{error}</div>",
                    'labelOptions' => ['class' => 'auth-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'username')->textInput([
                'autofocus' => true,
                'class' => 'auth-input',
                'placeholder' => Module::t('name@company.com'),
            ]) ?>
            <?= $form->field($model, 'password')->passwordInput([
                'class' => 'auth-input',
                'placeholder' => '••••••••',
            ]) ?>
            <div class="auth-remember">
                <div class="auth-remember-left">
                    <?= $form->field($model, 'rememberMe', ['template' => '{input}'])->checkbox([
                        'label' => false,
                    ]) ?>
                    <label for="loginform-rememberme" class="auth-remember-label"><?= Module::t('Remember Me') ?></label>
                </div>
                <div>
                    <?= Html::a(Module::t('Forgot password?'), ['/auth/default/request-password-reset'], [
                        'class' => 'auth-link',
                    ]) ?>
                </div>
            </div>
            <div>
                <?= Html::submitButton(Module::t('Sign In'), [
                    'class' => 'btn btn-outline-success auth-btn',
                    'name' => 'login-button',
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <?php if (Yii::$app->setting->getValue('form::signup')): ?>
            <div class="auth-footer">
                <?= Module::t("Don't have an account?") ?>
                <?= Html::a(Module::t('Sign up'), ['/auth/default/signup']) ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
