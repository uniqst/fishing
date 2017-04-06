<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Редактирование заказа №: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  <div class="table-responsive">
        <table class="table table-hover table-stried">
            <thead>
                <tr>
                    <th>Наименование</th>   
                    <th>Количество</th> 
                    <th>Цена</th>
                    <th>Сума</th>
                </tr>
                <tbody>
                    <?php foreach($model as $item):?>
                    <tr>
                                    <td><a href="<?=Url::to(['/site/single-product', 'id' => $item['product_id'], 'name' => $item['name']])?>"><?= $item['name']?></a></td>
                                    <td><?= $item['qty_item']?></td>
                                    <td><?= $item['price']?></td>
                                    <td><?= $item['sum_item']?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </thead>
        </table>
      </div>
</div>
