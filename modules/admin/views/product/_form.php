<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\CategoryWidget;
use mihaildev\ckeditor\CKEditor;
use yii\web\UploadedFile;
use app\modules\admin\models\Product;
use app\modules\admin\models\Category;
use app\modules\admin\models\InCategory;
use app\modules\admin\models\catOption;



/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



    <?= $form->field($model, 'file')->fileInput() ?>
    <img src="/web/<?=$model->photo?>" width="200px;"/>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?=CategoryWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
        ]);
        ?>
        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'price_promo')->textInput() ?>

        <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
        
        <?
        if (!empty($catid)){
            foreach ($catid as $cat){
                if(!empty($cat->catOption)){
                    echo $form->field($cat->catOption, 'value',  [
                "template" => "<label> $cat->name</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['name' => 'value['.$cat->catOption->id.']']); 
                }else{
                $cat1 = New catOption();
                echo $form->field($cat1, 'value',  [
                "template" => "<label>".$cat->name."</label>\n{input}\n{hint}\n{error}"
                    ])->textInput(['name' => 'createvalue['.$cat->id.']']); 
               }
            }
        }

        ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
