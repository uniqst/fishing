<?php

/* @var $this yii\web\View */
use app\components\CategoryWidget;
use yii\helpers\Html;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
   
<ul class="catalog">
    <?=CategoryWidget::widget(['tpl'=>'menu'])?>
</ul>

</div>
