<?
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Category;
use yii\helpers\Url;


class CategoryWidget extends Widget
{
    public $tpl;
		public $data;
		public $tree;
		public $menuHtml;

    public function init()
    {
        parent::init();

        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
				$this->tpl .= '.php';
    }

    public function run()
    {
				$this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
       
        return $this->menuHtml;
    }
    protected function getTree()
    {
      $tree = [];

      foreach ($this->data as $id => &$node) {
       // echo $id;
        if(!$node['parent_id'])
          $tree[$id]=&$node;
        else {
          $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
      }


      return $tree;
    }

    protected function getMenuHtml($tree){
      $str = '';

      foreach ($tree as $category){
        $str .= $this->carToTemplate($category);
      }

      return $str;
    }

    protected function carToTemplate($category){
      ob_start();
      include __DIR__.'/menu_tpl/'.$this->tpl;
      return ob_get_clean();
    }

    



}
