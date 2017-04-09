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
<div class="wrap">
<nav class="navbar" style="background: lightyellow; height: 130px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="http://designlife.ru/cms/data/upimages/fish_konkurs.jpg" alt="" style="border-radius: 50%; width: 100px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
        <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Главная</a></li>
        <li><a href="<?=Url::to(['site/spromotions'])?>">Акции</a></li>
        <li><a href="<?=Url::to(['site/about'])?>">О магазине</a></li>
        <li><a href="<?=Url::to(['site/contact'])?>">Контакты</a></li>
        <li><a href="#" class="cart" onclick="return getCart()"><i class="glyphicon glyphicon-shopping-cart" style="color: green"></i></a></li>

      </ul>
      <form class="navbar-form navbar-right" action="<?=Url::to(['site/search', 'q' => $qid])?>" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Поиск" name="q" value="<?=$qid?>">
        </div>
        <button type="submit" class="btn btn-success">Искать</button>
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
  <!--     <div id="myCarousel" style="height: 500px;" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner" style="width: 500px;" role="listbox">
    <div class="item active">
      <img src="http://minionomaniya.ru/wp-content/uploads/2016/01/%D0%9A%D0%B5%D0%B2%D0%B8%D0%BD.jpg" width="100%" alt="Chania">
    </div>

    <div class="item">
      <img src="http://minionomaniya.ru/wp-content/uploads/2016/01/%D0%9A%D0%B5%D0%B2%D0%B8%D0%BD.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="http://minionomaniya.ru/wp-content/uploads/2016/01/%D0%9A%D0%B5%D0%B2%D0%B8%D0%BD.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="http://minionomaniya.ru/wp-content/uploads/2016/01/%D0%9A%D0%B5%D0%B2%D0%B8%D0%BD.jpg" alt="Flower">
    </div>
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 -->
      <!-- /input-group -->
<!--     <a href="#" onclick="return getCart()">Корзина</a> -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])  ?>

  <ul class="nav nav-pills">
        <?php foreach($category as $cat){?>
 <li class="dropdown btn-group ">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-danger btn-lg">
      <?=$cat['name']?>
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php
    $categ = Category::find()->where(['parent_id' => $cat['id']])->all();
    foreach($categ as $c){
    ?>
      <li><a href="#"><?=$c['name']?></a></li>
    <?php }?>
        </ul>
        <?php }?>
       </ul>
</ul>

        <div class="row content">
        <div class="col-md-2">
         <form>
          <div class="form-group">
          <select class="selectpicker form-control">
              <option value="">Все категории</option>
                  <?php foreach($category as $cat){?>
                  <optgroup label="<?=$cat['name']?>" style="font-size: 20px;">
                    <?php
                  $categ = Category::find()->where(['parent_id' => $cat['id']])->all();
                  foreach($categ as $c){ ?>
                    <option><a href="#"><?=$c['name']?></a></option>
                  <?php }?>
                  </optgroup>
             <?php }?>
            </select>
          </div>
          <div class="form-group">   
           <label>Цена</label>
           <div class="clearfix"></div>
           <input type="text" class="form-control" id="from" placeholder="От" style="display: inline; width: 48%">
           <input type="text" class="form-control" placeholder="До" style="display: inline; width: 48%">
          </div>
          <button type="submit" class="btn btn-success" style="width: 100%">Показать</button>
          </form>
        </div>
        <div class="col-md-10" style="margin-top: -20px;">
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
