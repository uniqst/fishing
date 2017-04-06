<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа №<?=$model->id?></h1>

    <p>
        <?= Html::a('Создать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'update_at',
            'qty',
            'sum',
            // 'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="glyphicon glyphicon-remove text-danger"></span>' : '<span class="glyphicon glyphicon-ok text-success"></span>',
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItem;?>
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
                    <?php foreach($items as $item):?>
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
