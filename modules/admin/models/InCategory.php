<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "in_category".
 *
 * @property integer $id
 * @property integer $id_product
 */
class InCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'in_category';
    }

    public function getInProduct()
    {  
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product'], 'required'],
            [['id_product'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
        ];
    }
}
