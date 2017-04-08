<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Product;


$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	.single-first-col{
		width:100px;
	}
</style>
<h1><?= $title;?></h1>
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12">
<img class="img-thumbnail" src="/web/<?=$prod->photo?>" width="100%" />
</div>
<div class="col-md-8 col-sm-8 col-xs-12">
       
<table class="table table-bordered">
  <tbody>
    <tr>
      <td class="single-first-col">Бренд</td>	
	  <td><?= $prod->brand?></td>
    </tr>
    <tr>
      <td class="single-first-col">Цена</td>
	  <td><?= $prod->price?></td>
    </tr>
     <tr>
      <td class="single-first-col"> <input type="text" class="form-control" value="1" id="qty<?= $prod->id?>" /></td>
    <td> <a href="#" data-id="<?= $prod->id?>" class="btn btn-danger add-to-cart cart">
      <i class="glyphicon glyphicon-shopping-cart"></i>
            Добавить в корзину
          </a></td>
    </tr>
  </tbody>
</table>
</div>
<?=$prod->description?>
</div>