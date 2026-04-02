<?php

use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\auth\Module;
use portalium\auth\bundles\AuthAsset;
use portalium\theme\bundles\IconAsset;

$this->title = Module::t('Resend verification email');

$authBundle = AuthAsset::register($this);
$iconBundle = IconAsset::register($this);

$_appTitle = Html::encode(Yii::$app->setting->getValue('app::title') ?? 'Portalium');

try {
    $_layout = Yii::$app->setting->getValue('auth::layout_style') ?? 'split';
} catch (\Exception $e) {
    $_layout = 'split';
}
try {
    $colorSetting = Yii::$app->setting->getValue('auth::box_gradient_colors');
    $colors = explode(',', $colorSetting);
    $color1 = trim($colors[0] ?? '#011f1b');
    $color2 = trim($colors[1] ?? '#2ecc71');
} catch (\Exception $e) {
    $color1 = '#011f1b'; $color2 = '#2ecc71';
}
$boxGradient = "linear-gradient(135deg, {$color1} 0%, {$color2} 100%)";
?>
<?php if ($_layout === 'single'): ?>
<!-- ======================== SINGLE — White BG + Centered Card ======================== -->
<div class="position-fixed top-0 start-0 vw-100 vh-100 d-flex flex-column overflow-hidden bg-white" style="z-index: 9999; margin: 0; padding: 0;">
    <!-- Centered Card Area -->
    <div class="d-flex flex-column flex-grow-1 align-items-center justify-content-center w-100 pt-5">
        <!-- Centered Logo -->
        <div class="d-flex flex-column align-items-center mb-4">
            <?= Html::img($iconBundle->baseUrl . '/favicon.ico', [
                'alt' => $_appTitle,
                'class' => 'auth-sl-header-icon',
                'style' => 'width:48px;height:48px;'
            ]) ?>
            <span class="fw-bold fs-4 text-dark mt-2"><?= $_appTitle ?></span>
        </div>
        <!-- Centered Card -->
        <div class="bg-white rounded-4 shadow-lg px-4 py-4" style="min-width:320px;max-width:400px;width:100%;">
            <h3 class="card-title text-center mb-1 fw-bold text-dark"><?= Module::t('Resend Verification Email') ?></h3>
            <p class="text-center text-muted mb-3"><?= Module::t('Please fill out your email. A verification email will be sent there.') ?></p>
            <?php $form = ActiveForm::begin([
                'id' => 'resend-verification-email-form',
                'fieldConfig' => [
                    'template' => "<div class=\"auth-sl-field\">{label}{input}\n{hint}\n{error}</div>",
                    'labelOptions' => ['class' => 'auth-sl-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'email', ['options' => ['class' => 'mb-2']])->textInput([
                'autofocus' => true,
                'class' => 'auth-sl-input',
                'placeholder' => Module::t('name@company.com'),
            ]) ?>
            <?= Html::submitButton(Module::t('Send'), [
                'class' => 'btn bg-white border border-2 border-success text-dark fw-bold w-100 mb-2',
                'name' => 'send-button',
                'style' => 'border-radius: 0.375rem; padding: 0.7rem 1rem; font-size: 1rem;',
            ]) ?>
            <?php ActiveForm::end(); ?>
            <p class="auth-sl-footer-text mb-0">
                <?= Html::a(Module::t('Back to Log in'), ['/auth/default/login'], ['class' => 'auth-sl-link']) ?>
            </p>
        </div>
    </div>
</div>

<?php else: ?>
<!-- ======================== SPLIT (fallback — simple layout) ======================== -->
<div class="site-resend-verification-email">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Module::t('Please fill out your email. A verification email will be sent there.') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Module::t('Send'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php endif; ?>