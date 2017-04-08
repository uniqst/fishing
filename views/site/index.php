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
          <div class="col-md-3 col-sm-6 col-xs-12" >
               <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>"><img class="qqq img-thumbnail"" src="<?= '/web/'.$prod->photo;?>" width="100%"/></a>
                <p class="text-success"><?=$prod->name?></p>
                   <a href="#" style="width: 100%; position: inline-block;" data-id="<?= $prod->id?>" class="btn btn-danger add-to-cart cart">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            Добавить в корзину
          </a>
          </div>
        <?php }?>
        </div>
        <div class="clearfix"></div>
        <?=LinkPager::widget(['pagination' => $pagination])?>
</div>
           
 <!--          
 <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                       <a href="<?= Url::to(['site/single-product', 'name' => $prod->name, 'id' => $prod->id]);?>"><img class="qqq img-thumbnail"" src="<?= '/web/'.$prod->photo;?>" width="100%"/></a>
                      <h2>$<?=$prod->price?></h2>
                      <p><?=$prod->name?></p>
        <input type="text" value="1" class="form-control" id="qty<?= $prod->id?>" style="width: 25%; position: inline-block; margin: auto;" />
          <a href="#" style="width: 70%; position: inline-block;" data-id="<?= $prod->id?>" class="btn btn-danger add-to-cart cart">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            Добавить в корзину
          </a>
                    </div>
                
                </div>
            
              </div>
            </div> -->