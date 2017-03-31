<?php
use yii\widgets\LinkPager;
use app\models\Product;

/* @var $this yii\web\View */

$this->title = 'Поиск|'.$q;
?>
<?php if(!empty($product)):?>
  <h2>Поиск по запросу: <?=$q?></h2>
<div class="site-index">
    <div class="body-content">
        <div class="row">
        <?php foreach($product as $prod){?>
         <div class="col-md-3" > 
         <img class="qqq" src="<?php echo $prod->photo;?>" style="width: 100%"/>
          <h2><?php echo $prod->name;?></h2>
            </div>
        <?php }?>

        </div>
        <?=LinkPager::widget(['pagination' => $pages])?>
    </div>
</div>
<?php else:?>
  <h2>По запросу <?=$q?> ничего не найдено...</h2>
<?php endif;?>

