<?php
namespace app\models;
use yii\db\ActiveRecord;
use app\modules\admin\models\InCategory;

class Category extends ActiveRecord
{
  public function getProduct(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
   }

   public function getInCategory(){
        return $this->hasMany(InCategory::className(), ['category_id' => 'id']);
   }
}