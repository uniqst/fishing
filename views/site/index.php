<?php

/* @var $this yii\web\View */

$this->title = 'ABC Fishing';
?>

<div class="site-index">
    <div class="body-content">
        <p class="lead">ИНТЕРНЕТ-МАГАЗИН ДЛЯ РЫБАЛКИ №1 В КИЕВЕ И УКРАИНЕ</p>
        <div class="row">
        <?php foreach($category as $cat){?>
         <div class="col-md-3 items">
         <img class="qqq" src="<?php echo $cat->img;?>" />
          <h2><?php echo $cat->name;?></h2>
         
            </div>
        <?php }?>

        </div>
    </div>
</div>

