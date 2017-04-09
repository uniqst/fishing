<?php

/* @var $this yii\web\View */
use app\components\CategoryWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Qwe;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	
  <?php $form = ActiveForm::begin(); ?>

                   <?= $form->field($qwe, 'name')->textInput() ?>
                   <?= $form->field($ewq, 'brand')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
</div>
