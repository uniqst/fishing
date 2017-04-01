<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = 'ABC Fishing';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
       <?php foreach($product as $prod){?>
         <div class="col-md-3">
         <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>"><img class="qqq" src="<?php echo $prod->photo;?>" width="100%"/></a>
         <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>" style="text-decoration: none;"><h2><?= $prod->name?></h2></a>
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
        <div class="clearfix"></div>
        <?=LinkPager::widget(['pagination' => $pagination])?>
    </div>
</div>

