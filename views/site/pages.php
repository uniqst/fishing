<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use app\models\Pages;

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $pages->title;
$this->params['breadcrumbs'][] = $this->title;

?>

<?=$pages->content?>