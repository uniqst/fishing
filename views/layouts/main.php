<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Category;
//dfdfdf

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
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ABC Fishing',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Акции', 'url' => ['/site/promotions']],
            ['label' => 'О магазине', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],

        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
    <a href="#" onclick="return getCart()">Корзина</a>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ABC Fishing <?= date('Y') ?></p>
    </div>
</footer>
<?php
     Modal::Begin([
     	'header' => '<h2>Корзина</h2>',
     	'id' => 'cart',
     	'size' => 'modal-lg',
     	'footer' => '<button class="btn btn-default">Продолжить покупеки</button>
        <a href="/cart/view" class="btn btn-success">Оформить заказ</a>
        <button class="btn btn-danger" onclick="clearCart()" >Очистить корзину</button>'
     	]);
     Modal::End();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
