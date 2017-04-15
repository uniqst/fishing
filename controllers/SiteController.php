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
use app\models\Pages;
use app\models\Options;
use app\models\Cart;
use app\models\Qwe;
use app\models\Ewq;

use yii\data\Pagination;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

    public $layout = 'main2';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        Yii::$app->view->params['key'] = Category::find()->where(['parent_id' => '0'])->with('product')->all();
        Yii::$app->view->params['cateq'] = Category::find()->where(['parent_id' => $cat['id']])->all();
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
        $options = Options::find()->where(['id' => 1])->one();
        $product = Product::find();
        $pagination = new Pagination([
            'defaultPageSize' => $options->size_product,
            'totalCount' => $product->count(),
            ]);
        $product = $product
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
      
        return $this->render('index', compact('product','pagination', 'options'));
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
        $qwe = new Qwe();
        $ewq = new Ewq();
        if($qwe->load(Yii::$app->request->post()) && $qwe->save() 
        && $ewq->load(Yii::$app->request->post()) && $ewq->save()){
        }
        return $this->render('about', compact('qwe', 'ewq'));
    }

    public function actionPromotions()
    {
        return $this->render('promotions');
    }

    public function actionCatalog($id)
    {
        $id = Yii::$app->request->get('id');
        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $product->count(),
            ]);
        $product = $product
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
      
        return $this->render('catalog', compact('product','pagination'));
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

     public function actionSearch()
     {
        $q = Yii::$app->request->get('q');
        $query = Product::find()->where(['like', 'name', $q]);
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9,
            'forcePageParam' => false,
            'pageSizeParam' => false
         ]);
        $product = $query
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all(); 
        return $this->render('search', compact('product', 'pagination', 'q'));
     }

     public function actionPages()
     {
        $alias = Yii::$app->request->get('alias');
        $pages = Pages::find()->where(['alias' => $alias])->one();
        return $this->render('pages', compact('pages'));
     }
    

}
