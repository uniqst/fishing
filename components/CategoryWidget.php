<?
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Category;
use yii\helpers\Url;
use Yii;


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
        $menu = Yii::$app->cache->get('menu');
        //get cache
        if ($menu) return $menu;

				$this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //set cache
        Yii::$app->cache->set('menu', $this->menuHtml, 60);

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
