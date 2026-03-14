<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\theme\bundles\IconAsset;
use portalium\auth\Module;

$this->title = Module::t('Signup');

// Override layout to remove default chrome
$this->context->layout = false;
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Public+Sans:wght@400;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#198754",
                        "portalium-dark": "#0B2415"
                    }
                }
            }
        }
    </script>
    <style>
        .mesh-gradient {
            background-color: #000000;
            background-image:
                radial-gradient(at 0% 0%, hsla(146, 53%, 9%, 1) 0, transparent 50%),
                radial-gradient(at 50% 0%, hsla(146, 53%, 15%, 1) 0, transparent 50%),
                radial-gradient(at 100% 0%, hsla(146, 53%, 10%, 1) 0, transparent 50%);
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="font-[Inter,sans-serif] bg-white text-slate-900 antialiased">

<?php $iconBundle = IconAsset::register($this); ?>
<div class="flex h-screen w-full overflow-hidden font-[Inter,sans-serif]">

    <!-- Left Panel: Signup Form (White) -->
    <div class="flex h-full w-full flex-col justify-center items-center overflow-hidden bg-white px-8 py-6 lg:px-12 lg:py-8 lg:w-1/2">
        <div class="w-full max-w-md space-y-5">
            <!-- Mobile Logo -->
            <div class="flex items-center gap-2 lg:hidden">
                <img src="<?= $iconBundle->baseUrl ?>/favicon.ico" alt="Portalium" class="w-8 h-8">
                <span class="text-xl font-bold tracking-tight">Portalium</span>
            </div>

            <div>
                <h2 class="text-3xl font-bold text-slate-900"><?= Module::t('Create your Account') ?></h2>
                <p class="mt-1.5 text-sm text-slate-500">
                    <?= Module::t('Already have an account?') ?>
                    <?= Html::a(Module::t('Log in'), ['/auth/default/login'], [
                        'class' => 'font-semibold text-primary hover:underline',
                    ]) ?>
                </p>
            </div>

            <?php if (!Yii::$app->user->isGuest): ?>
                <div class="rounded-lg border border-slate-200 bg-slate-50 p-4 text-center text-slate-600">
                    <?= Module::t('You are already logged in. You cannot register.') ?>
                </div>
            <?php else: ?>

                <!-- Continue with Google -->
                <button type="button" class="flex w-full items-center justify-center gap-3 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 active:scale-[0.98]">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <?= Module::t('Continue with Google') ?>
                </button>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                    <div class="relative flex justify-center text-xs uppercase tracking-wider"><span class="bg-white px-4 text-slate-400"><?= Module::t('or register with email') ?></span></div>
                </div>

                <?php $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'options' => ['class' => 'space-y-3'],
                    'fieldConfig' => [
                        'template' => "<div class=\"space-y-1\">{label}{input}\n{hint}\n{error}</div>",
                        'labelOptions' => ['class' => 'text-xs font-semibold text-slate-700'],
                    ],
                ]); ?>

                <!-- First Name & Last Name side by side -->
                <div class="flex gap-3">
                    <div class="flex-1">
                        <?= $form->field($model, 'first_name')->textInput([
                            'autofocus' => true,
                            'class' => 'block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all',
                            'placeholder' => Module::t('John'),
                        ])->label(Module::t('First Name')) ?>
                    </div>
                    <div class="flex-1">
                        <?= $form->field($model, 'last_name')->textInput([
                            'class' => 'block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all',
                            'placeholder' => Module::t('Doe'),
                        ])->label(Module::t('Last Name')) ?>
                    </div>
                </div>

                <?= $form->field($model, 'username')->textInput([
                    'class' => 'block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all',
                    'placeholder' => Module::t('username'),
                ]) ?>

                <?= $form->field($model, 'email')->textInput([
                    'class' => 'block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all',
                    'placeholder' => Module::t('name@company.com'),
                ]) ?>

                <?= $form->field($model, 'password')->passwordInput([
                    'class' => 'block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all',
                    'placeholder' => '••••••••',
                ]) ?>

                <?= $form->field($model, 'password_confirm')->passwordInput([
                    'class' => 'block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all',
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
                        'class' => 'btn btn-success flex w-full items-center justify-center rounded-lg border-2 border-primary bg-white px-4 py-2.5 text-sm font-bold text-slate-900 transition-all hover:bg-primary/5 active:scale-[0.98]',
                        'name' => 'signup-button',
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            <?php endif; ?>
        </div>
    </div>

    <!-- Right Panel: Brand & Info -->
    <div class="relative hidden h-full w-1/2 flex-col overflow-hidden p-12 lg:flex lg:p-24 mesh-gradient">
        <!-- Top-Left: Brand Header -->
        <div class="flex items-center gap-3">
            <img src="<?= $iconBundle->baseUrl ?>/favicon.ico" alt="Portalium" class="w-8 h-8 drop-shadow-[0_0_20px_rgba(126,211,33,0.6)]">
            <span class="text-lg font-bold tracking-widest text-white">PORTALIUM</span>
        </div>

        <!-- Center: Hero Content -->
        <div class="flex flex-1 flex-col items-center justify-center text-center max-w-lg mx-auto">
            <h2 class="text-5xl font-extrabold leading-tight text-white mb-6"><?= Module::t('One Command Center') ?></h2>
            <p class="text-slate-300 text-lg leading-relaxed mx-auto max-w-md">
                <?= Module::t('Manage your entire workflow, deployments, and team communication from a single, unified interface.') ?>
            </p>
        </div>

        <!-- Bottom: Integration Badges -->
        <?php
        $_integrations = [
            'slack' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M5.042 15.165a2.528 2.528 0 0 1-2.52 2.523A2.528 2.528 0 0 1 0 15.165a2.527 2.527 0 0 1 2.522-2.52h2.52v2.52zm1.271 0a2.527 2.527 0 0 1 2.521-2.52 2.527 2.527 0 0 1 2.521 2.52v6.313A2.528 2.528 0 0 1 8.834 24a2.528 2.528 0 0 1-2.521-2.522v-6.313z" fill="#E01E5A"/><path d="M8.834 5.042a2.528 2.528 0 0 1-2.521-2.52A2.528 2.528 0 0 1 8.834 0a2.528 2.528 0 0 1 2.521 2.522v2.52H8.834zm0 1.271a2.528 2.528 0 0 1 2.521 2.521 2.528 2.528 0 0 1-2.521 2.521H2.522A2.528 2.528 0 0 1 0 8.834a2.528 2.528 0 0 1 2.522-2.521h6.312z" fill="#36C5F0"/><path d="M18.956 8.834a2.528 2.528 0 0 1 2.522-2.521A2.528 2.528 0 0 1 24 8.834a2.528 2.528 0 0 1-2.522 2.521h-2.522V8.834zm-1.27 0a2.528 2.528 0 0 1-2.522 2.521 2.527 2.527 0 0 1-2.521-2.521V2.522A2.527 2.527 0 0 1 15.165 0a2.528 2.528 0 0 1 2.522 2.522v6.312z" fill="#2EB67D"/><path d="M15.165 18.956a2.528 2.528 0 0 1 2.522 2.522A2.528 2.528 0 0 1 15.165 24a2.527 2.527 0 0 1-2.521-2.522v-2.522h2.521zm0-1.27a2.527 2.527 0 0 1-2.521-2.522 2.527 2.527 0 0 1 2.521-2.521h6.313A2.528 2.528 0 0 1 24 15.165a2.528 2.528 0 0 1-2.522 2.521h-6.313z" fill="#ECB22E"/></svg>',
            'github' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="white"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>',
            'jira' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005z" fill="#2684FF"/><path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005z" fill="url(#jira1)" fill-opacity="0.3"/><path d="M17.364 5.756H5.792a5.218 5.218 0 0 0 5.233 5.214h2.129v2.058a5.216 5.216 0 0 0 5.214 5.214V6.761a1.005 1.005 0 0 0-1.004-1.005z" fill="#2684FF"/><path d="M23.157 0H11.585a5.217 5.217 0 0 0 5.232 5.214h2.13v2.058A5.216 5.216 0 0 0 24.16 12.486V1.005A1.005 1.005 0 0 0 23.157 0z" fill="#2684FF"/><defs><linearGradient id="jira1" x1="12.146" y1="12.132" x2="6.934" y2="17.694" gradientUnits="userSpaceOnUse"><stop stop-color="#0052CC" offset="0.18"/><stop stop-color="#2684FF" offset="1"/></linearGradient></defs></svg>',
            'notion' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="white"><path d="M4.459 4.208c.746.606 1.026.56 2.428.466l13.215-.793c.28 0 .047-.28-.046-.326L18.1 2.074c-.42-.326-.98-.7-2.055-.607L3.01 2.539c-.466.046-.56.28-.373.466l1.822 1.203zm.793 3.035v13.907c0 .746.373 1.026 1.213.98l14.523-.84c.84-.046.933-.56.933-1.166V6.336c0-.606-.233-.933-.746-.886l-15.177.886c-.56.047-.746.327-.746.887zm14.337.56c.093.42 0 .84-.42.887l-.7.14v10.264c-.607.327-1.166.513-1.632.513-.746 0-.933-.233-1.492-.933l-4.572-7.186v6.952l1.446.327s0 .84-1.166.84l-3.219.186c-.093-.186 0-.653.327-.746l.84-.233V9.854L7.821 9.76c-.093-.42.14-1.026.793-1.073l3.453-.233 4.759 7.278v-6.44l-1.213-.14c-.093-.513.28-.886.746-.933l3.23-.186zM2.31 1.073L15.833.04c1.632-.14 2.054.047 3.08.747l4.247 2.986c.7.513.933.653.933 1.213v16.706c0 1.073-.373 1.7-1.726 1.793L6.604 24.3c-1.006.047-1.492-.093-2.052-.793l-3.267-4.247c-.606-.84-.886-1.446-.886-2.146V2.725c0-.84.373-1.559 1.912-1.652z" fill-rule="evenodd"/></svg>',
            'linkedin' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" fill="#0A66C2"/></svg>',
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
        <div class="text-center mb-16">
            <div class="flex items-center justify-center gap-4">
                <?php foreach ($_visibleIntegrations as $_name => $_item): ?>
                <a href="<?= Html::encode($_item['url']) ?>" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-12 h-12 rounded-2xl border border-white/10 bg-white/5 grayscale-0 opacity-100 transition-all duration-300 hover:scale-110 hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.2)]" title="<?= Html::encode(ucfirst($_name)) ?>">
                    <?= $_item['svg'] ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

</div>
</body>
</html>