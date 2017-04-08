<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Корзина';
?>
<?php if( Yii::$app->session->hasflash('success')):?>
	<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-lable="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo Yii::$app->session->getFlash('success');?>
	</div>
<?php endif;?>

<?php if( Yii::$app->session->hasflash('error')):?>
	<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-lable="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo Yii::$app->session->getFlash('error');?>
	</div>
<?php endif;?>

<?php if(!empty($session['cart'])):?>
      <div class="table-responsive">
      	<table class="table table-hover table-stried">
      	 	<thead>
      	 		<tr>
      	 			<th>Фото</th>
      	 			<th>Наименование</th>	
      	 			<th>Количество</th>	
      	 			<th>Цена</th>
      	 			<th>Cума</th>		
      	 			<th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>	
      	 		</tr>
      	 		<tbody>
      	 			<?php foreach($session['cart'] as $id => $item):?>
      	 			<tr>
                                    <td><img src="/web/<?= $item['img']?>" width="50px"/></td>
                                    <td><?= $item['name']?></td>
                                    <td><?= $item['qty']?></td>
                                    <td><?= $item['price']?></td>
                                    <td><?= $item['qty'] * $item['price']?></td>
      	 				<td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
      	 			</tr>
      	 			<?php endforeach;?>
      	 			<tr>
      	 				<td colspan="5">Итого</td>
      	 				<td><?= $session['cart.qty']?></td>
      	 			</tr>
      	 			<tr>
      	 				<td colspan="5">Сума</td>
      	 				<td><?= $session['cart.sum']?></td>
      	 			</tr>
      	 		</tbody>
      	 	</thead>
      	</table>
      </div>
<hr>
<?php $form = ActiveForm::begin()?>
<?= $form->field($order, 'name')?>
<?= $form->field($order, 'email')?>
<?= $form->field($order, 'phone')?>
<?= $form->field($order, 'address')?>
<?= Html::submitButton('Заказать', ['class' => 'btn btn-success'])?>
<?php $form = ActiveForm::end()?>
<?php else:?>
	<h3>Корзина пуста</h3>
<?php endif;?>
