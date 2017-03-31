<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\Product;
use app\models\Cart;
use yii\data\Pagination;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

     
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        $product = Product::find();
        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $product->count(),
            ]);
        $product = $product
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        // $category = Category::find()->where(['parent_id' => '0'])->all();
        return $this->render('index', compact('product','pagination'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPromotions()
    {
        return $this->render('promotions');
    }

    public function actionCatalog()
    {
        $category = Category::find()->all();
        return $this->render('catalog',[
            'category' => $category,
            ]);
    }
    public function actionProduct()
    {
        $product = Product::find()->all();
        return $this->render('product',[
            'product' => $product,
            ]);
    }

     public function actionSingleProduct()
    {
     $id = Yii::$app->request->get('id');
     $prod = Product::find()->where(['id' => $id])->one();
     return $this->render('single-product', [
        'id' => $id,
        'prod' => $prod,
        'title' => $prod->name,
        ]);

    }
    

}
