<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
use app\components\CategoryWidget;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>


<div class="form-group field-category-parent_id required has-success">
<label class="control-label" for="category-parent_id">Родительская категория</label>
<select id="category-parent_id" class="form-control" name="Category[parent_id]">
	<option value="0">Нет</option>
	<?=CategoryWidget::widget(['tpl' => 'select', 'model' => $model])?>
</select>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
