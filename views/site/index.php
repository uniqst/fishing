<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'ABC Fishing';
?>

        <h2 class="title text-center index-item">Новые товары</h2>
        <div class="row">
       <?php foreach($product as $prod){
         include "_product.php";
        }?>
        </div>
        <div class="clearfix"></div>
        <?=LinkPager::widget(['pagination' => $pagination])?>

             <h2 class="title text-center index-item">Топ продаж</h2>
        <div class="row">
       <?php foreach($top as $prod){
          // echo "<div>".$count[$prod->id]."</div>";

         include "_product.php";
        }?>
        </div>
        <div class="clearfix"></div>
        <?=LinkPager::widget(['pagination' => $pagination])?>
