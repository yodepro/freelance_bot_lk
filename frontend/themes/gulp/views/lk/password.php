<?php

declare(strict_types=1);
use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $profile User */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordForm */

$theme = $this->theme;
$this->title = 'Личный кабинет';
?>


<?= $this->render('_bread_crums') ?>
<section class="container profile-page profile-page--tarif">
    <?= $this->render('__sidebar',['profile' => $profile])?>
    <div class="profile-page__main">
        <div class="profile-card">
            <?php $form = ActiveForm::begin(['id' => 'form-password-update','options' => ['class' => 'site-form']]); ?>

            <label for="password" class="label login__label">Пароль</label>
              <?= $form->field($model, 'password')
                  ->passwordInput(['class' => 'input login__input'])
                  ->label(false)
              ?>
            <label for="repeat-password" class="label login__label">Повторите пароль</label>
              <?= $form->field($model, 'password_repeat')
                  ->passwordInput(['class' => 'input login__input'])
                  ->label(false)
              ?>
            <?= Html::submitButton('Сохранить',
                                   ['disabled','class' => 'site-button login__button', 'name' => 'login-button'])
            ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
