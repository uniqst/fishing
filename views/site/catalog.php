<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Каталог | '. $category->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
       <div class="row">
        <?php foreach($product as $prod){?>
         <div class="col-md-3">
         <img src="<?php echo $prod->photo;?>" />
          <h2><?php echo $prod->name;?></h2>
            </div>
        <?php }?>
        </div>
</div>
