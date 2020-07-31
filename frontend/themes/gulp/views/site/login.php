<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1 class="login__title"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'login__form']]); ?>


        <label class="label login__label" for="email">Email</label>
        <?= $form->field($model, 'email')
            ->textInput(['autofocus' => true, 'class' => 'input login__input'])->label(false) ?>

        <label class="label login__label" for="password">Пароль</label>
        <?= $form->field($model, 'password')->passwordInput(['class' => 'input login__input'])
        ->label(false)?>




        <?= Html::submitButton('Войти', ['class' => 'site-button login__button', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>


    <div class="login__footer">
      <p class="login__footer-text">Еще нет аккаунта?<span>&#8194;</span></p>
      <a class="link-hover link-hover--blue" href="<?= \yii\helpers\Url::toRoute(['site/signup'])?>">
        Зарегистрируйтесь
      </a>
    </div>

