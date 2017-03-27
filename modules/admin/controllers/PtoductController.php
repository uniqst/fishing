<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class ProductController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
       echo $id;
    }

     public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
       echo $id;
    }
}
