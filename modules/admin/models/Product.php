<?php

namespace app\modules\admin\models;
use app\models\Category;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property integer $price_promo
 * @property string $photo
 * @property string $brand
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getInCaregory()
    {  
        return $this->hasMany(InCategory::className(), ['product_id' => 'id']);
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'price', 'price_promo', 'brand'], 'required'],
            [['category_id', 'price', 'price_promo'], 'integer'],
            [['file'], 'file', 'skipOnEmpty' => false], 
            [['name', 'description', 'photo', 'brand'], 'string', 'max' => 255],
      
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'price_promo' => 'Акция',
            'photo' => 'Фото',
            'brand' => 'Бренд',
            'file' => 'Картинка'
        ];
    }
}
