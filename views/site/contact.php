<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\modules\admin\models\InCategory;
use app\modules\admin\models\CatOption;
use yii\db\ActiveQuery;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <?php
        $cat = CatOption::find()->with(['inCategory' => 
            function (ActiveQuery $query){
                $query->where(['category_id' => 68]);
            }
            ])->groupBy('value')->all();
        

        foreach($cat as $c){?>
           <input type="checkbox" id="check1"><label for="check1"><?=$c->value?></label><br>
       <?php }
    ?>
</div>
