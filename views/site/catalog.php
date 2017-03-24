<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
       <div class="row">
        <?php foreach($category as $cat){?>
         <div class="col-md-3">
         <img src="<?php echo $cat->img;?>" />
          <h2><?php echo $cat->name;?></h2>
            </div>
        <?php }?>
        </div>
</div>
