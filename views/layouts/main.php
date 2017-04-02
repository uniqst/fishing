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
use app\models\Category;
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
<?php $this->beginBody() ?>
<?php $qid = Yii::$app->request->get('q');?>
<div class="wrap container">
<nav class="navbar container">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">ABC Fishing</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
         <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Главная</a></li>
        <li><a href="<?=Url::to(['site/spromotions'])?>">Акции</a></li>
        <li><a href="<?=Url::to(['ssite/about'])?>">О магазине</a></li>
        <li><a href="<?=Url::to(['site/contact'])?>">Контакты</a></li>
        <li><a href="#" class="cart" onclick="return getCart()"><i class="glyphicon glyphicon-shopping-cart" style="color: green"></i></a></li>

      </ul>
      <form class="navbar-form navbar-right" action="<?=Url::to(['site/search', 'q' => $qid])?>" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Поиск" name="q" value="<?=$qid?>">
        </div>
        <button type="submit" class="btn btn-default">Искать</button>
      </form>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


    <?php
    // NavBar::begin([
    //     'brandLabel' => 'ABC Fishing',
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse navbar-fixed-top',
    //     ],
    // ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => [
    //         ['label' => 'Главная', 'url' => [Yii::$app->homeUrl]],
    //         ['label' => 'Акции', 'url' => ['/site/promotions']],
    //         ['label' => 'О магазине', 'url' => ['/site/about']],
    //         ['label' => 'Контакты', 'url' => ['/site/contact']],

    //     ],
    // ]);
    // NavBar::end();

    $category = Category::find()->where(['parent_id' => '0'])->all();
    ?>
    <div class="container">
       <div class="btn-group btn-group-justified">
    <?php foreach($category as $cat):?>
        <a href="<?=Url::to(['catalog', 'id' => $cat->id])?>" class="btn btn-warning btn-lg"><?=$cat->name?></a>
    <?php endforeach;?>
       </div>
      <!-- /input-group -->
<!--     <a href="#" onclick="return getCart()">Корзина</a> -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])  ?>


        <div class="row">
        <div class="col-md-3">
        <ul class="catalog sidebar-catalog">
        <?= CategoryWidget::widget(['tpl' => 'menu'])?>
        </ul>
        </div>
        <div class="col-md-9">
        <?= $content ?>
        </div>
        </div>
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
     	'footer' => '<button class="btn btn-default" data-dismiss="modal">Продолжить покупеки</button>
        <a href="'.Url::to(["cart/view"]).'" class="btn btn-success">Оформить заказ</a>
        <button class="btn btn-danger" onclick="clearCart()" >Очистить корзину</button>'
     	]);
     Modal::End();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
