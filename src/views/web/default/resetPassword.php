<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;
use portalium\auth\bundles\AuthAsset;

$this->title = Module::t('Reset password');

$authBundle = AuthAsset::register($this);
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
            </div>
        </div>

        <!-- Version Text -->
        <div class="auth-version">
            v2.4.0-stable &copy; <?= date('Y') ?> <?= Html::encode(trim(Yii::$app->setting->getValue('app::title') ?? 'Portalium')) ?> Systems
        </div>
    </div>

    <!-- Right Panel: Reset Password Form -->
    <div class="auth-panel-right">
        <div class="auth-form-container">
            <!-- Mobile Logo -->
            <div class="auth-mobile-logo">
                <span class="material-symbols-outlined text-success auth-mobile-logo-icon">polyline</span>
                <span class="auth-mobile-logo-name"><?= Html::encode(trim(Yii::$app->setting->getValue('app::title') ?? 'Portalium')) ?></span>
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
