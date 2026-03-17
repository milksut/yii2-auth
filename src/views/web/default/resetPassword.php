<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;
use portalium\auth\bundles\AuthAsset;
<<<<<<< HEAD
=======
use portalium\theme\bundles\IconAsset;
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a

$this->title = Module::t('Reset password');

$authBundle = AuthAsset::register($this);
<<<<<<< HEAD
?>
<div class="auth-fullscreen-wrapper">

    <!-- Left Panel: Brand & Info -->
    <div class="auth-panel-left mesh-gradient">
        <!-- Centered Content Block -->
        <div class="auth-hero">
            <!-- Hero Logo: DigiNova Network Node -->
            <div class="auth-hero-logo">
                <?= Html::img($authBundle->baseUrl . '/icons/hexagonal-network.svg', ['class' => 'auth-icon-lg', 'alt' => 'Network']) ?>
            </div>
            <!-- Logo Typography -->
            <p class="auth-hero-brand-name"><?= Html::encode(trim(Yii::$app->setting->getValue('app::title') ?? 'Portalium')) ?></p>

            <h2 class="auth-hero-title"><?= Html::encode(trim(Yii::$app->setting->getValue('auth::login_hero_title') ?? '')) ?></h2>
            <p class="auth-hero-subtitle"><?= Html::encode(trim(Yii::$app->setting->getValue('auth::login_hero_subtitle') ?? '')) ?></p>

            <!-- Integration Badges -->
            <div class="auth-badges mt-5">
                <p class="auth-badges-label"><?= Module::t('Integrates With:') ?></p>
                <div class="auth-badges-list">
                    <div class="auth-badge" title="Slack">
                        <?= Html::img($authBundle->baseUrl . '/icons/slack.svg', ['class' => 'auth-icon-sm', 'alt' => 'Slack']) ?>
                    </div>
                    <div class="auth-badge" title="GitHub">
                        <?= Html::img($authBundle->baseUrl . '/icons/github.svg', ['class' => 'auth-icon-sm', 'alt' => 'GitHub']) ?>
                    </div>
                    <div class="auth-badge" title="Jira">
                        <?= Html::img($authBundle->baseUrl . '/icons/jira.svg', ['class' => 'auth-icon-sm', 'alt' => 'Jira']) ?>
                    </div>
                    <div class="auth-badge" title="Notion">
                        <?= Html::img($authBundle->baseUrl . '/icons/notion.svg', ['class' => 'auth-icon-sm', 'alt' => 'Notion']) ?>
                    </div>
                    <div class="auth-badge" title="LinkedIn">
                        <?= Html::img($authBundle->baseUrl . '/icons/linkedin.svg', ['class' => 'auth-icon-sm', 'alt' => 'LinkedIn']) ?>
                    </div>
                    <div class="auth-badge">
                        <span class="auth-badge-text">+14</span>
                    </div>
                </div>
=======
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
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
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
                <h2 class="auth-form-title"><?= Module::t('Reset Your Password') ?></h2>
                <p class="auth-form-subtitle"><?= Module::t('Choose a new password for your account') ?></p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'reset-password-form',
                'fieldConfig' => [
                    'template' => "<div class=\"auth-field\">{label}{input}\n{hint}\n{error}</div>",
                    'labelOptions' => ['class' => 'auth-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'password')->passwordInput([
                'autofocus' => true,
                'class' => 'auth-input',
                'placeholder' => '••••••••',
            ]) ?>
            <div>
                <?= Html::submitButton(Module::t('Reset Password'), [
                    'class' => 'btn btn-outline-success auth-btn',
                    'name' => 'reset-button',
                ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <div class="auth-footer">
                <?= Html::a(Module::t('Back to Login'), ['/auth/default/login']) ?>
            </div>
        </div>
    </div>
</div>
