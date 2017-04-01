<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-product">
    <div class="body-content">
        <p class="lead">ИНТЕРНЕТ-МАГАЗИН ДЛЯ РЫБАЛКИ №1 В КИЕВЕ И УКРАИНЕ</p>
        <div class="row">
       <?php foreach($product as $prod){?>
         <div class="col-md-3 items">
         <a href="<?= Url::to(['site/single-product', 'id' => $prod->name]);?>"><img class="qqq" src="<?php echo $prod->photo;?>" /></a>
         <a href="<?= Url::to(['site/single-product', 'id' => $prod->name]);?>" style="text-decoration: none;"><h2><?= $prod->name?></h2></a>
          <p>Цена: <?= $prod->price?></p>
          <lable>Количество:</lable>
          <input type="text" value="1" id="qty<?= $prod->id?>" />
          <a href="#" data-id="<?= $prod->id?>" class="btn btn-danger add-to-cart cart">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            Добавить в корзину
          </a>
        <!--   <a class="add-to-cart" data-id="<?= $prod->id?>" href="<?=\yii\helpers\Url::to(['cart/add', 'id' => $prod->id])?>"><i class="glyphicon glyphicon-shopping-cart"></i>Добавить в корзину</a> -->
            </div>
        <?php }?>
        </div>
    </div>
</div>


