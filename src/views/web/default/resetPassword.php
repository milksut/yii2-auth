<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;

$this->title = Module::t('Reset password');
$this->context->layout = '@vendor/portalium/yii2-auth/src/views/web/layouts/auth';
?>
<div class="auth-layout">

    <!-- Left Panel: Brand & Info -->
    <div class="auth-panel-left mesh-gradient">
        <!-- Centered Content Block -->
        <div class="auth-hero">
            <!-- Hero Logo: DigiNova Network Node -->
            <div class="auth-hero-logo">
                <svg class="auth-icon-lg" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <filter id="nodeGlow" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur stdDeviation="3" result="blur" />
                            <feMerge>
                                <feMergeNode in="blur" />
                                <feMergeNode in="SourceGraphic" />
                            </feMerge>
                        </filter>
                    </defs>
                    <!-- Hexagon perimeter -->
                    <line x1="64" y1="26" x2="97" y2="45" stroke="#78D64B" stroke-width="1.5" stroke-opacity="0.35" />
                    <line x1="97" y1="45" x2="97" y2="83" stroke="#78D64B" stroke-width="1.5" stroke-opacity="0.35" />
                    <line x1="97" y1="83" x2="64" y2="102" stroke="#78D64B" stroke-width="1.5" stroke-opacity="0.35" />
                    <line x1="64" y1="102" x2="31" y2="83" stroke="#78D64B" stroke-width="1.5" stroke-opacity="0.35" />
                    <line x1="31" y1="83" x2="31" y2="45" stroke="#78D64B" stroke-width="1.5" stroke-opacity="0.35" />
                    <line x1="31" y1="45" x2="64" y2="26" stroke="#78D64B" stroke-width="1.5" stroke-opacity="0.35" />
                    <!-- Center-to-outer spokes -->
                    <line x1="64" y1="64" x2="64" y2="26" stroke="#78D64B" stroke-width="2" stroke-opacity="0.5" />
                    <line x1="64" y1="64" x2="97" y2="45" stroke="#78D64B" stroke-width="2" stroke-opacity="0.5" />
                    <line x1="64" y1="64" x2="97" y2="83" stroke="#78D64B" stroke-width="2" stroke-opacity="0.5" />
                    <line x1="64" y1="64" x2="64" y2="102" stroke="#78D64B" stroke-width="2" stroke-opacity="0.5" />
                    <line x1="64" y1="64" x2="31" y2="83" stroke="#78D64B" stroke-width="2" stroke-opacity="0.5" />
                    <line x1="64" y1="64" x2="31" y2="45" stroke="#78D64B" stroke-width="2" stroke-opacity="0.5" />
                    <!-- Cross-connections for network density -->
                    <line x1="64" y1="26" x2="97" y2="83" stroke="#78D64B" stroke-width="1" stroke-opacity="0.15" />
                    <line x1="64" y1="26" x2="31" y2="83" stroke="#78D64B" stroke-width="1" stroke-opacity="0.15" />
                    <line x1="97" y1="45" x2="31" y2="83" stroke="#78D64B" stroke-width="1" stroke-opacity="0.15" />
                    <line x1="31" y1="45" x2="97" y2="83" stroke="#78D64B" stroke-width="1" stroke-opacity="0.15" />
                    <!-- Ambient glow behind center -->
                    <circle cx="64" cy="64" r="22" fill="#78D64B" fill-opacity="0.06" />
                    <circle cx="64" cy="64" r="15" fill="#78D64B" fill-opacity="0.10" />
                    <!-- Outer hex nodes -->
                    <circle cx="64" cy="26" r="7" fill="#78D64B" filter="url(#nodeGlow)" />
                    <circle cx="97" cy="45" r="7" fill="#78D64B" filter="url(#nodeGlow)" />
                    <circle cx="97" cy="83" r="7" fill="#78D64B" filter="url(#nodeGlow)" />
                    <circle cx="64" cy="102" r="7" fill="#78D64B" filter="url(#nodeGlow)" />
                    <circle cx="31" cy="83" r="7" fill="#78D64B" filter="url(#nodeGlow)" />
                    <circle cx="31" cy="45" r="7" fill="#78D64B" filter="url(#nodeGlow)" />
                    <!-- Center node (largest, brightest) -->
                    <circle cx="64" cy="64" r="10" fill="#78D64B" filter="url(#nodeGlow)" />
                    <!-- Micro accent dots at spoke midpoints -->
                    <circle cx="64" cy="45" r="2" fill="#78D64B" fill-opacity="0.4" />
                    <circle cx="80.5" cy="54.5" r="2" fill="#78D64B" fill-opacity="0.4" />
                    <circle cx="80.5" cy="73.5" r="2" fill="#78D64B" fill-opacity="0.4" />
                    <circle cx="64" cy="83" r="2" fill="#78D64B" fill-opacity="0.4" />
                    <circle cx="47.5" cy="73.5" r="2" fill="#78D64B" fill-opacity="0.4" />
                    <circle cx="47.5" cy="54.5" r="2" fill="#78D64B" fill-opacity="0.4" />
                </svg>
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
                        <svg class="auth-icon-sm" viewBox="0 0 24 24" fill="none">
                            <path d="M5.042 15.165a2.528 2.528 0 0 1-2.52 2.523A2.528 2.528 0 0 1 0 15.165a2.527 2.527 0 0 1 2.522-2.52h2.52v2.52zm1.271 0a2.527 2.527 0 0 1 2.521-2.52 2.527 2.527 0 0 1 2.521 2.52v6.313A2.528 2.528 0 0 1 8.834 24a2.528 2.528 0 0 1-2.521-2.522v-6.313z" fill="#E01E5A" />
                            <path d="M8.834 5.042a2.528 2.528 0 0 1-2.521-2.52A2.528 2.528 0 0 1 8.834 0a2.528 2.528 0 0 1 2.521 2.522v2.52H8.834zm0 1.271a2.528 2.528 0 0 1 2.521 2.521 2.528 2.528 0 0 1-2.521 2.521H2.522A2.528 2.528 0 0 1 0 8.834a2.528 2.528 0 0 1 2.522-2.521h6.312z" fill="#36C5F0" />
                            <path d="M18.956 8.834a2.528 2.528 0 0 1 2.522-2.521A2.528 2.528 0 0 1 24 8.834a2.528 2.528 0 0 1-2.522 2.521h-2.522V8.834zm-1.27 0a2.528 2.528 0 0 1-2.522 2.521 2.527 2.527 0 0 1-2.521-2.521V2.522A2.527 2.527 0 0 1 15.165 0a2.528 2.528 0 0 1 2.522 2.522v6.312z" fill="#2EB67D" />
                            <path d="M15.165 18.956a2.528 2.528 0 0 1 2.522 2.522A2.528 2.528 0 0 1 15.165 24a2.527 2.527 0 0 1-2.521-2.522v-2.522h2.521zm0-1.27a2.527 2.527 0 0 1-2.521-2.522 2.527 2.527 0 0 1 2.521-2.521h6.313A2.528 2.528 0 0 1 24 15.165a2.528 2.528 0 0 1-2.522 2.521h-6.313z" fill="#ECB22E" />
                        </svg>
                    </div>
                    <div class="auth-badge" title="GitHub">
                        <svg class="auth-icon-sm" viewBox="0 0 24 24" fill="white">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z" />
                        </svg>
                    </div>
                    <div class="auth-badge" title="Jira">
                        <svg class="auth-icon-sm" viewBox="0 0 24 24" fill="none">
                            <path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005z" fill="#2684FF" />
                            <path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005z" fill="url(#jira1)" fill-opacity="0.3" />
                            <path d="M17.364 5.756H5.792a5.218 5.218 0 0 0 5.233 5.214h2.129v2.058a5.216 5.216 0 0 0 5.214 5.214V6.761a1.005 1.005 0 0 0-1.004-1.005z" fill="#2684FF" />
                            <path d="M23.157 0H11.585a5.217 5.217 0 0 0 5.232 5.214h2.13v2.058A5.216 5.216 0 0 0 24.16 12.486V1.005A1.005 1.005 0 0 0 23.157 0z" fill="#2684FF" />
                            <defs>
                                <linearGradient id="jira1" x1="12.146" y1="12.132" x2="6.934" y2="17.694" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0052CC" offset="0.18" />
                                    <stop stop-color="#2684FF" offset="1" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="auth-badge" title="Notion">
                        <svg class="auth-icon-sm" viewBox="0 0 24 24" fill="white">
                            <path d="M4.459 4.208c.746.606 1.026.56 2.428.466l13.215-.793c.28 0 .047-.28-.046-.326L18.1 2.074c-.42-.326-.98-.7-2.055-.607L3.01 2.539c-.466.046-.56.28-.373.466l1.822 1.203zm.793 3.035v13.907c0 .746.373 1.026 1.213.98l14.523-.84c.84-.046.933-.56.933-1.166V6.336c0-.606-.233-.933-.746-.886l-15.177.886c-.56.047-.746.327-.746.887zm14.337.56c.093.42 0 .84-.42.887l-.7.14v10.264c-.607.327-1.166.513-1.632.513-.746 0-.933-.233-1.492-.933l-4.572-7.186v6.952l1.446.327s0 .84-1.166.84l-3.219.186c-.093-.186 0-.653.327-.746l.84-.233V9.854L7.821 9.76c-.093-.42.14-1.026.793-1.073l3.453-.233 4.759 7.278v-6.44l-1.213-.14c-.093-.513.28-.886.746-.933l3.23-.186zM2.31 1.073L15.833.04c1.632-.14 2.054.047 3.08.747l4.247 2.986c.7.513.933.653.933 1.213v16.706c0 1.073-.373 1.7-1.726 1.793L6.604 24.3c-1.006.047-1.492-.093-2.052-.793l-3.267-4.247c-.606-.84-.886-1.446-.886-2.146V2.725c0-.84.373-1.559 1.912-1.652z" fill-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="auth-badge" title="LinkedIn">
                        <svg class="auth-icon-sm" viewBox="0 0 24 24" fill="none">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" fill="#0A66C2" />
                        </svg>
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
