<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $img
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }


    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ категории',
            'parent_id' => 'Родительская категория',
            'name' => 'Название',
        ];
    }
}
