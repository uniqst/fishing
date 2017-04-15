<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статистика заказов заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-statistica">
        <h2>Всего продано товаров: <?=$all?></h2>
        <h2>Продано за сегодня: <?=$today?></h2>
        <p>За период:</p>
<form method="get" action="<?=Url::to(['/admin/order/statistica', 'ot' => 1])?>" class="form-inline">
<input type="date" class="form-control" name="ot" value="<?=$ot?>">
<input type="date" class="form-control" name="do" value="<?=$do?>">
<input type="submit" class="form-control" value="Отправить">
</form>
<?=$ot1?>
<?=$do1?>
<?=$otd1?>
</div>
