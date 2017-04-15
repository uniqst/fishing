<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\options */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="options-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'size_product')->textInput(['style' => 'max-width: 350px;', 'class' => 'form-control']) ?>

    <?= $form->field($model, 'size_md')->radioList(['12' => 1, '6' => 2, '4' => 3, '3' => 4]) ?>

    <?= $form->field($model, 'size_sm')->radioList(['12' => 1, '6' => 2, '4' => 3, '3' => 4]) ?>

    <?= $form->field($model, 'size_xs')->radioList(['12' => 1, '6' => 2, '4' => 3, '3' => 4]) ?>


    <div class="form-group">
        <?= Html::submitButton(
        $model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
