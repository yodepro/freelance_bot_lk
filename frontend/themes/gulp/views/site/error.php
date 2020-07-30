<?php

declare(strict_types=1);
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use \yii\helpers\Html;
$this->title = $name;
?>


<main class="body-container__main main-page">

  <section class="intro">
    <div class="container">
      <h1 class="intro__title">
          <?= Html::encode($this->title) ?>
      </h1>
      <div class="intro__desc-box">
          <?= nl2br(Html::encode($message)) ?>
      </div>
    </div>
  </section>

</main>
