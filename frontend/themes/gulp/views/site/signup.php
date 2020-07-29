<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1 class="login__title"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'form-signup','options' => ['class' => 'login__form']]); ?>
    <label for="email" class="label login__label">Email</label>
    <?= $form->field($model, 'email')->textInput(['class' => 'input login__input'])->label(false) ?>
    <label for="password" class="label login__label">Пароль</label>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'input login__input'])->label(false) ?>
    <label for="repeat-password" class="label login__label">Повторите пароль</label>
    <?= $form->field($model, 'password_repeat')->passwordInput(['class' => 'input login__input'])->label(false) ?>
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'site-button login__button', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>


<div class="login__footer">
  <p class="login__footer-text">Уже есть аккаунт?<span>&#8194;</span></p>
  <a class="link-hover link-hover--blue" href="<?= \yii\helpers\Url::toRoute(['site/login'])?>">
    Войти
  </a>
</div>

