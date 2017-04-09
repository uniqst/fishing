<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ewq".
 *
 * @property integer $id
 * @property string $brand
 */
class Ewq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ewq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand'], 'required'],
            [['brand'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
        ];
    }
}
