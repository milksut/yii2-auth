<?php

use yii\helpers\Html;
use yii\helpers\Url;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;
use portalium\auth\Module;

$this->title = Module::t('Login');

$authBundle = AuthAsset::register($this);
$iconBundle = IconAsset::register($this);
?>
<div class="auth-fullscreen-wrapper">

    <!-- Left Panel: Brand & Info -->
    <div class="auth-panel-left mesh-gradient">
        <!-- Top-Left: Brand Header -->
        <div class="auth-brand">
            <img src="<?= $iconBundle->baseUrl ?>/favicon.ico" alt="<?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?>" class="auth-icon-md auth-brand-logo">
            <span class="auth-brand-name"><?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?></span>
        </div>

        <!-- Center: Hero Content -->
        <div class="auth-hero">
            <?php
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
            ?>
            <h2 class="auth-hero-title"><?= Html::encode($_heroTitle) ?></h2>
            <p class="auth-hero-subtitle"><?= Html::encode($_heroSubtitle) ?></p>
        </div>

        <!-- Feature Grid -->
        <div class="auth-features">
            <div class="auth-feature-grid">
                <div class="auth-feature-card">
                    <span class="auth-feature-title"><?= Module::t('Vision To Insight') ?></span>
                    <span class="auth-feature-text"><?= Module::t('Transform your business.') ?></span>
                </div>
                <div class="auth-feature-card">
                    <span class="auth-feature-title"><?= Module::t('Real-Time AI') ?></span>
                    <span class="auth-feature-text"><?= Module::t('Start operational intelligence.') ?></span>
                </div>
                <div class="auth-feature-card">
                    <span class="auth-feature-title"><?= Module::t('Data To Action') ?></span>
                    <span class="auth-feature-text"><?= Module::t('Fast, reliable, and at scale.') ?></span>
                </div>
                <div class="auth-feature-card">
                    <span class="auth-feature-title"><?= Module::t('Increase Productivity') ?></span>
                    <span class="auth-feature-text"><?= Module::t('One platform for real world.') ?></span>
                </div>
            </div>
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

    <!-- Right Panel: Login Form -->
    <div class="auth-panel-right">
        <div class="auth-form-container">
            <!-- Mobile Logo -->
            <div class="auth-mobile-logo">
                <span class="material-symbols-outlined text-success auth-mobile-logo-icon">polyline</span>
                <span class="auth-mobile-logo-name"><?= Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium') ?></span>
            </div>

            <div class="auth-form-header">
                <?php
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
                ?>
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
                    'class' => 'btn btn-outline-success auth-btn mb-3',
                    'name' => 'login-button',
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
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

            <?php if (Yii::$app->setting->getValue('form::signup')): ?>
                <div class="auth-footer">
                    <?= Module::t("Don't have an account?") ?>
                    <?= Html::a(Module::t('Sign up'), ['/auth/default/signup']) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>