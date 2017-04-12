<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = 'ABC Fishing';
?>

<div class="site-index">
<div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
        <div class="row">
       <?php foreach($product as $prod){?>
          <div class="col-md-<?=$options->size_md?> col-sm-<?=$options->size_sm?> col-xs-<?=$options->size_xs?>" style="margin-bottom: 20px;">
               <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>"><img class="qqq img-thumbnail" src="<?= '/web/'.$prod->photo;?>" style="width: 100%; height: 150px;"/></a>
                <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>"><p class="text-danger text-center product-border" ><?=$prod->name?></p></a>
                <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>"><p class="text-success text-center product-border" ><?=$prod->price?> грн</p></a>
                   <a href="#" style="width: 100%; position: inline-block;" data-id="<?= $prod->id?>" class="btn btn-danger add-to-cart cart">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            В корзину
          </a>
          </div>
        <?php }?>
        </div>
        <div class="clearfix"></div>
        <?=LinkPager::widget(['pagination' => $pagination])?>
</div>
           
