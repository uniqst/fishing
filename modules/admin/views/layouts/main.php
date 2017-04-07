<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\admin\models\Order;
use app\components\CategoryWidget;
use app\components\MenuWidget;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php error_reporting(E_ALL);
 ini_set('display_errors', 'on'); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?= Html::encode($this->title) ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body>
<?php
$order = Order::find()->where(['status' => '0'])->count();
?>
<div class="container">
   <div class="btn-group btn-group-justified">
        <a href="<?=Url::to(['category/index'])?>" class="btn btn-danger btn-lg">Категории</a>
        <a href="<?=Url::to(['product/index'])?>" class="btn btn-danger btn-lg">Товары</a>
        <a href="<?=Url::to(['order/index'])?>" class="btn btn-danger btn-lg"><i class="text-success glyphicon glyphicon-remove"></i><?=$order?> Заказы</a>
       </div>
<?=$content?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
