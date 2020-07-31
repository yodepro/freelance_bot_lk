<?php

declare(strict_types=1);

use yii\helpers\Html;

?>

<section class="container">
  <div class="bread-crumbs">
      <?= Html::a('Главная<span></span>', ['site/index'], ['class' => 'bread-crumbs__link']) ?>
    <p class="bread-crumbs__this-page">
        <?= $this->title ?>
    </p>
  </div>
  <h1 class="section-title section-title--profile">
      <?= $this->title ?>
  </h1>
</section>
