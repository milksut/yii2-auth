<?php

use yii\helpers\Html;
use portalium\auth\Module;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;

$this->title = Module::t('Request password reset');

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
<div class="auth-fullscreen-wrapper">
<<<<<<< HEAD

    <!-- Left Panel: Brand & Info -->
    <div class="auth-panel-left mesh-gradient">
        <!-- Top-Left: Brand Header -->
=======
    <div class="auth-left-panel mesh-gradient">
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
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
<<<<<<< HEAD

        <!-- Bottom: Integration Badges -->
        <?php
        $_integrationNames = ['slack', 'github', 'jira', 'notion', 'linkedin'];
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
=======
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
        <?php if (!empty($_visibleIntegrations)): ?>
        <div class="auth-badges">
            <div class="auth-badges-list">
                <?php foreach ($_visibleIntegrations as $_name => $_url): ?>
<<<<<<< HEAD
                <a href="<?= Html::encode($_url) ?>" target="_blank" rel="noopener noreferrer" class="auth-badge" title="<?= Html::encode(ucfirst($_name)) ?>">
                    <?= Html::img($authBundle->baseUrl . '/icons/' . $_name . '.svg', ['class' => 'auth-icon-sm', 'alt' => ucfirst($_name)]) ?>
                </a>
=======
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
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
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
                <h2 class="auth-form-title"><?= Module::t('Secure Password Recovery') ?></h2>
                <p class="auth-form-subtitle"><?= Module::t('Enter your enterprise email to receive recovery instructions.') ?></p>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'request-password-reset-form',
                'fieldConfig' => [
                    'template' => "<div class=\"auth-field\">{label}{input}\n{hint}\n{error}</div>",
                    'labelOptions' => ['class' => 'auth-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'email')->textInput([
                'autofocus' => true,
                'class' => 'auth-input',
                'placeholder' => Module::t('name@company.com'),
            ]) ?>
            <div>
                <?= Html::submitButton(Module::t('Send Reset Link'), [
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
