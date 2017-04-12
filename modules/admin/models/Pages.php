<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $label
 * @property string $content
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'label', 'content'], 'required'],
            [['content'], 'string'],
            [['alias', 'title', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'alias' => 'Алиас(eng)',
            'title' => 'Титул',
            'label' => 'Название кнопки',
            'content' => 'Контент',
        ];
    }
}
