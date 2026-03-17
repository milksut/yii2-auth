<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
<<<<<<< HEAD
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;
=======
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
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
<<<<<<< HEAD
<div class="auth-fullscreen-wrapper">

    <!-- Left Panel: Signup Form (White) -->
    <div class="auth-panel-right">
        <div class="auth-form-container-md">
            <!-- Mobile Logo -->
            <div class="auth-mobile-logo">
                <img src="<?= $iconBundle->baseUrl ?>/favicon.ico" alt="<?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?>" class="auth-icon-md">
                <span class="auth-mobile-logo-name"><?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?></span>
=======
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
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
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
<<<<<<< HEAD

                <!-- Continue with Google -->
                <?php if (Yii::$app->setting->getValue('auth::googleEnabled')): ?>
                    <button type="button" class="auth-btn-social mb-3">
                        <?= Html::img($authBundle->baseUrl . '/icons/google.svg', ['class' => 'auth-icon-xs', 'alt' => 'Google']) ?>
                        <?= Module::t('Continue with Google') ?>
                    </button>
                <?php endif; ?>
                <?php if (Yii::$app->setting->getValue('auth::githubEnabled')): ?>
                    <button type="button" class="auth-btn-social mb-3">
                        <?= Html::img($authBundle->baseUrl . '/icons/github.svg', ['class' => 'auth-icon-xs', 'alt' => 'GitHub']) ?>
                        <?= Module::t('Continue with GitHub') ?>
                    </button>
                <?php endif; ?>
                <?php if (Yii::$app->setting->getValue('auth::appleEnabled')): ?>
                    <button type="button" class="auth-btn-social mb-3">
                        <?= Html::img($authBundle->baseUrl . '/icons/apple.svg', ['class' => 'auth-icon-xs', 'alt' => 'Apple']) ?>
                        <?= Module::t('Continue with Apple') ?>
                    </button>
                <?php endif; ?>
                <?php if (Yii::$app->setting->getValue('auth::twitterEnabled')): ?>
                    <button type="button" class="auth-btn-social mb-3">
                        <?= Html::img($authBundle->baseUrl . '/icons/twitter.svg', ['class' => 'auth-icon-xs', 'alt' => 'Twitter']) ?>
                        <?= Module::t('Continue with Twitter') ?>
                    </button>
                <?php endif; ?>

                <div class="auth-divider">
                    <div class="auth-divider-line"></div>
                    <span class="auth-divider-text"><?= Module::t('or register with email') ?></span>
                    <div class="auth-divider-line"></div>
=======
            <button type="button" class="auth-btn-social mb-3">
                <?= Html::img($authBundle->baseUrl . '/icons/google.svg', ['alt' => 'Google icon', 'class' => 'auth-icon-xs']) ?>
                <?= Module::t('Continue with Google') ?>
            </button>
            <div class="auth-divider">
                <div class="auth-divider-line"></div>
                <span class="auth-divider-text"><?= Module::t('or register with email') ?></span>
                <div class="auth-divider-line"></div>
            </div>
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
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
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
<<<<<<< HEAD

    <!-- Right Panel: Brand & Info -->
    <div class="auth-panel-left mesh-gradient">
        <!-- Top-Left: Brand Header -->
        <div class="auth-brand">
            <img src="<?= $iconBundle->baseUrl ?>/favicon.ico" alt="<?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?>" class="auth-icon-md auth-brand-logo">
            <span class="auth-brand-name"><?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?></span>
        </div>

        <!-- Center: Hero Content -->
        <div class="auth-hero">
            <h2 class="auth-hero-title"><?= Html::encode(trim(Yii::$app->setting->getValue('auth::login_hero_title') ?? '')) ?></h2>
            <p class="auth-hero-subtitle"><?= Html::encode(trim(Yii::$app->setting->getValue('auth::login_hero_subtitle') ?? '')) ?></p>
        </div>

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
        <?php if (!empty($_visibleIntegrations)): ?>
            <div class="auth-badges">
                <div class="auth-badges-list">
                    <?php foreach ($_visibleIntegrations as $_name => $_url): ?>
                        <a href="<?= Html::encode($_url) ?>" target="_blank" rel="noopener noreferrer" class="auth-badge" title="<?= Html::encode(ucfirst($_name)) ?>">
                            <?= Html::img($authBundle->baseUrl . '/icons/' . $_name . '.svg', ['class' => 'auth-icon-sm', 'alt' => ucfirst($_name)]) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
=======
</div>
>>>>>>> 4f7b9fde72f0ee141440f33136d7bead34eb9b0a
