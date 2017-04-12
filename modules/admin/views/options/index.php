<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Options';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--     <p>
        <?= Html::a('Create Options', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'tableOptions' => [
            'class' => 'table table-hover table-stried',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'size_product',
            'size_md',
            'size_sm',
            'size_xs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
