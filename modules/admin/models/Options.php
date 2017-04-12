<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property integer $size_product
 * @property integer $size_md
 * @property integer $size_sm
 * @property integer $size_xs
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size_product', 'size_md', 'size_sm', 'size_xs'], 'required'],
            [['size_product', 'size_md', 'size_sm', 'size_xs'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size_product' => 'Количество товаров на страницу',
            'size_md' => 'Количество товаров в строку(ПК)',
            'size_sm' => 'Количество товаров в строку(Планшет)',
            'size_xs' => 'Количество товаров в строку(Телефон)',
        ];
    }
}
