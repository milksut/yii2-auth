<?php

use yii\helpers\Html;
use yii\helpers\Url;
use portalium\theme\widgets\ActiveForm;
use portalium\theme\bundles\IconAsset;
use portalium\auth\Module;

$this->title = Module::t('Login');
$this->context->layout = '@vendor/portalium/yii2-theme/src/layouts/auth';

$iconBundle = IconAsset::register($this);
?>
<div class="auth-layout">

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
        $_integrations = [
            'slack' => '<svg class="auth-icon-sm" viewBox="0 0 24 24" fill="none"><path d="M5.042 15.165a2.528 2.528 0 0 1-2.52 2.523A2.528 2.528 0 0 1 0 15.165a2.527 2.527 0 0 1 2.522-2.52h2.52v2.52zm1.271 0a2.527 2.527 0 0 1 2.521-2.52 2.527 2.527 0 0 1 2.521 2.52v6.313A2.528 2.528 0 0 1 8.834 24a2.528 2.528 0 0 1-2.521-2.522v-6.313z" fill="#E01E5A"/><path d="M8.834 5.042a2.528 2.528 0 0 1-2.521-2.52A2.528 2.528 0 0 1 8.834 0a2.528 2.528 0 0 1 2.521 2.522v2.52H8.834zm0 1.271a2.528 2.528 0 0 1 2.521 2.521 2.528 2.528 0 0 1-2.521 2.521H2.522A2.528 2.528 0 0 1 0 8.834a2.528 2.528 0 0 1 2.522-2.521h6.312z" fill="#36C5F0"/><path d="M18.956 8.834a2.528 2.528 0 0 1 2.522-2.521A2.528 2.528 0 0 1 24 8.834a2.528 2.528 0 0 1-2.522 2.521h-2.522V8.834zm-1.27 0a2.528 2.528 0 0 1-2.522 2.521 2.527 2.527 0 0 1-2.521-2.521V2.522A2.527 2.527 0 0 1 15.165 0a2.528 2.528 0 0 1 2.522 2.522v6.312z" fill="#2EB67D"/><path d="M15.165 18.956a2.528 2.528 0 0 1 2.522 2.522A2.528 2.528 0 0 1 15.165 24a2.527 2.527 0 0 1-2.521-2.522v-2.522h2.521zm0-1.27a2.527 2.527 0 0 1-2.521-2.522 2.527 2.527 0 0 1 2.521-2.521h6.313A2.528 2.528 0 0 1 24 15.165a2.528 2.528 0 0 1-2.522 2.521h-6.313z" fill="#ECB22E"/></svg>',
            'github' => '<svg class="auth-icon-sm" viewBox="0 0 24 24" fill="white"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>',
            'jira' => '<svg class="auth-icon-sm" viewBox="0 0 24 24" fill="none"><path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005z" fill="#2684FF"/><path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005z" fill="url(#jira1)" fill-opacity="0.3"/><path d="M17.364 5.756H5.792a5.218 5.218 0 0 0 5.233 5.214h2.129v2.058a5.216 5.216 0 0 0 5.214 5.214V6.761a1.005 1.005 0 0 0-1.004-1.005z" fill="#2684FF"/><path d="M23.157 0H11.585a5.217 5.217 0 0 0 5.232 5.214h2.13v2.058A5.216 5.216 0 0 0 24.16 12.486V1.005A1.005 1.005 0 0 0 23.157 0z" fill="#2684FF"/><defs><linearGradient id="jira1" x1="12.146" y1="12.132" x2="6.934" y2="17.694" gradientUnits="userSpaceOnUse"><stop stop-color="#0052CC" offset="0.18"/><stop stop-color="#2684FF" offset="1"/></linearGradient></defs></svg>',
            'notion' => '<svg class="auth-icon-sm" viewBox="0 0 24 24" fill="white"><path d="M4.459 4.208c.746.606 1.026.56 2.428.466l13.215-.793c.28 0 .047-.28-.046-.326L18.1 2.074c-.42-.326-.98-.7-2.055-.607L3.01 2.539c-.466.046-.56.28-.373.466l1.822 1.203zm.793 3.035v13.907c0 .746.373 1.026 1.213.98l14.523-.84c.84-.046.933-.56.933-1.166V6.336c0-.606-.233-.933-.746-.886l-15.177.886c-.56.047-.746.327-.746.887zm14.337.56c.093.42 0 .84-.42.887l-.7.14v10.264c-.607.327-1.166.513-1.632.513-.746 0-.933-.233-1.492-.933l-4.572-7.186v6.952l1.446.327s0 .84-1.166.84l-3.219.186c-.093-.186 0-.653.327-.746l.84-.233V9.854L7.821 9.76c-.093-.42.14-1.026.793-1.073l3.453-.233 4.759 7.278v-6.44l-1.213-.14c-.093-.513.28-.886.746-.933l3.23-.186zM2.31 1.073L15.833.04c1.632-.14 2.054.047 3.08.747l4.247 2.986c.7.513.933.653.933 1.213v16.706c0 1.073-.373 1.7-1.726 1.793L6.604 24.3c-1.006.047-1.492-.093-2.052-.793l-3.267-4.247c-.606-.84-.886-1.446-.886-2.146V2.725c0-.84.373-1.559 1.912-1.652z" fill-rule="evenodd"/></svg>',
            'linkedin' => '<svg class="auth-icon-sm" viewBox="0 0 24 24" fill="none"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" fill="#0A66C2"/></svg>',
        ];
        $_visibleIntegrations = [];
        foreach ($_integrations as $_name => $_svg) {
            try {
                $_url = trim(Yii::$app->setting->getValue('auth::' . $_name . '_url') ?? '');
            } catch (\Exception $e) {
                $_url = '';
            }
            if (!empty($_url)) {
                $_visibleIntegrations[$_name] = ['svg' => $_svg, 'url' => $_url];
            }
        }
        ?>
        <?php if (!empty($_visibleIntegrations)): ?>
            <div class="auth-badges">
                <div class="auth-badges-list">
                    <?php foreach ($_visibleIntegrations as $_name => $_item): ?>
                        <a href="<?= Html::encode($_item['url']) ?>" target="_blank" rel="noopener noreferrer" class="auth-badge" title="<?= Html::encode(ucfirst($_name)) ?>">
                            <?= $_item['svg'] ?>
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
                    <svg class="auth-icon-xs" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4" />
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                    </svg>
                    <?= Module::t('Continue with Google') ?>
                </button>
            <?php endif; ?>
            <?php if (Yii::$app->setting->getValue('auth::githubEnabled')): ?>
                <button type="button" class="auth-btn-social mb-3">
                    <svg class="auth-icon-xs" viewBox="0 0 24 24" fill="white">
                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23c .66 1 .24 2 .12 3 .765 .84 1 .23 1 .23c .23 .23 .23 .53 .23 .93c0 .67 -.01 1 -.01 1s -.77 .17 -1 -.17c -.01 -.17 -.01 -.77 -.01 -1c0 -.77 .47 -1 .47 -1c -.47 -.32 -.01 -.32 -.01 -.32c .47 -.32 .8 -.22 .8 -.22c .8 .55 1 .22 1 .22c .8 -0 .55 -0 .55 -0c -.55 -0 -0 -0 -0 -0c .8 .55 1 .22 1 .22c .8 -.55 .23 -.55 .23 -.55c -.55 -0 -.01 -.43 -.01 -.43c .01 -.43 .47 -.32 .47 -.32c .47 -.32 1.23 -.22 1.23 -.22c .8 .55 1.23 1.22 1.23 1.22c .8 1.22 2.09 .87 2.6 .67c .08 -.52 .31 -.87 .56 -1.07c -2.67 -.3 -5.47 -1.33 -5.47 -5.93c0 -1.31 .47 -2.38 1.24 -3.22c -.12 -.3 -.54 -1.5 .12 -3.13c0 0 1.01 -.32 3.3 1.23c .96 -.27 2 -.4 3.03 -.4s2.07 .13 3.03 .4c2.29 -1.56 3.3 -1.23 3.3 -1.23c .66 1.65 .24 2.88 .12 3.18c .77 .84 1.24 1.91 1.24 3.22c0 4.61 -2.8 5.63 -5.48 5.92c .31 .27 .59 .81 .59 1.63c0 1.17 -.01 2.11 -.01 2.39c0 .26 .17 .57 .82 .47A12 12 0 0 0 24 12c0 -6.63 -5.37 -12 -12 -12z" />
                    </svg>
                    <?= Module::t('Continue with GitHub') ?>
                </button>
            <?php endif; ?>
            <?php if (Yii::$app->setting->getValue('auth::appleEnabled')): ?>
                <button type="button" class="auth-btn-social mb-3">
                    <svg class="auth-icon-xs" viewBox="0 0 24 24" fill="white">
                        <path d="M16.365 1.43c0 1.14-.46 2.17-1.2 2.93-.74.76-1.72 1.25-2.84 1.25s-2.1-.49-2.84-1.25c-.74-.76-1.2-1.79-1.2-2.93C8.365.29 9.825-.17 11 .17c1.18.36 2.365-.17 3.365-2.74zM12 4c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6 2.69-6 6-6z" />
                    </svg>
                    <?= Module::t('Continue with Apple') ?>
                </button>
            <?php endif; ?>
            <?php if (Yii::$app->setting->getValue('auth::twitterEnabled')): ?>
                <button type="button" class="auth-btn-social mb-3">
                    <svg class="auth-icon-xs" viewBox="0 0 24 24" fill="white">
                        <path d="M23.954 4.569c-.885.39-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.949.555-2.005.959-3.127 1.184-.897-.959-2.178-1.559-3.594-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39 .045 .765 .127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427 .722-.666 1.561-.666 2.475 0 1.708 .87 3.216 2.188 4.099-.807-.026-1.566-.248-2.228-.616v .061c0 2.385 1.693 4.374 3.946 4.827-.413 .111-.849 .171-1.296 .171-.317 0-.626-.03-.927-.086 .627 1.956 2.444 3.379 4.6 3.419-1.68 1.318-3.808 2.105-6.102 2.105-.396 0-.787-.023-1.17-.067C2..29 19..29 5..03 20..5c6..29 0 9..73-5..21 9..73-9..73l -.01 -.443c .67 -.48 1..25 -1..08 1..71 -1..42z" />
                    </svg>
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