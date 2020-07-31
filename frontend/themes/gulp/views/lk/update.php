<?php

declare(strict_types=1);
use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $profile User */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ProfileForm */

$theme = $this->theme;

$js = <<<JS
  let email = '$model->email';
  console.log(email);
  let input = document.querySelector('#profileform-email');
  let form = $('#form-profile-update');
  form.on('beforeSubmit', function() {
    var data = form.serialize();
      if(input.value === email){
       return false;
      }
      return true;
  });
JS;
$this->registerJs($js);

?>


<section class="container">
    <div class="bread-crumbs">
        <a class="bread-crumbs__link" href="#">
            Главная<span></span>
        </a>
        <p class="bread-crumbs__this-page">
            Личный кабинет
        </p>
    </div>
    <h1 class="section-title section-title--profile">
        Личный кабинет
    </h1>
</section>
<section class="container profile-page profile-page--tarif">
    <?= $this->render('__sidebar',['profile' => $profile])?>
    <div class="profile-page__main">
        <div class="profile-card">
            <?php $form = ActiveForm::begin(['id' => 'form-profile-update','options' => ['class' => 'site-form']]); ?>
            <label for="email" class="label login__label">Email</label>

            <?= $form->field($model, 'email')->textInput(['class' => 'input login__input'])->label(false) ?>
            <?= Html::submitButton('Сохранить', ['disabled','class' => 'site-button login__button', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
