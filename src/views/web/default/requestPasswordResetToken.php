<?php

use yii\helpers\Html;
use portalium\auth\Module;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;

$this->title = Module::t('Request password reset');

$authBundle = AuthAsset::register($this);
$iconBundle = IconAsset::register($this);
?>
<div class="auth-fullscreen-wrapper">

    <!-- Left Panel: Brand & Info -->
    <div class="auth-panel-left mesh-gradient">
        <!-- Top-Left: Brand Header -->
        <div class="auth-brand">
            <img src="<?= $iconBundle->baseUrl ?>/favicon.ico" alt="Portalium" class="auth-icon-md auth-brand-logo">
            <span class="auth-brand-name"><?= Html::encode(trim(Yii::$app->setting->getValue('app::title') ?? 'Portalium')) ?></span>
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

    <!-- Right Panel: Password Reset Form -->
    <div class="auth-panel-right">
        <div class="auth-form-container">
            <!-- Mobile Logo -->
            <div class="auth-mobile-logo">
                <span class="material-symbols-outlined text-success auth-mobile-logo-icon">polyline</span>
                <span class="auth-mobile-logo-name">Portalium</span>
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
