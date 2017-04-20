<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Category;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>
<div class="category-index">
    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'parent_id',
             [
                'attribute' => 'parent_id',
                'value'     => function($data){
                    return $data->category->name ? $data->category->name : "Нет";
                },
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
