<?php

namespace app\web\modules\admin\models;

use Yii;

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
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'price', 'price_promo', 'photo', 'brand'], 'required'],
            [['category_id', 'price', 'price_promo'], 'integer'],
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
            'category_id' => 'Category ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'price_promo' => 'Price Promo',
            'photo' => 'Photo',
            'brand' => 'Brand',
        ];
    }
}
