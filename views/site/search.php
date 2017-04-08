<?php
use yii\widgets\LinkPager;
use app\models\Product;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Поиск|'.$q;
?>
<?php if(!empty($product)):?>
  <h2>Поиск по запросу: <?=$q?></h2>
<div class="site-index">
    <div class="body-content">
         <div class="row">
       <?php foreach($product as $prod){?>
        
 <div class="col-sm-4">
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
            </div>
       
        <?php }?>
        </div>
        <div class="clearfix"></div>
        <?=LinkPager::widget(['pagination' => $pagination])?>
    </div>
</div>
<?php else:?>
  <h2>По запросу <?=$q?> ничего не найдено...</h2>
<?php endif;?>

