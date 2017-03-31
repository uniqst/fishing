<?php
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'ABC Fishing';
?>

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
        <?=LinkPager::widget(['pagination' => $pagination])?>
    </div>
</div>

