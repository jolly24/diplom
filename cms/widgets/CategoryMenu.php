<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 08.01.2018
 * Time: 23:44
 */

namespace app\widgets;
use app\controllers\CustomController;
use yii\base\Widget;
use app\models\Category;
use Yii;

class CategoryMenu extends Widget
{
    public $view;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if($this->view === null)
        {
            $this->view = 'menu';
        }
        $this->view .= '.php';
    }

    public function run()
    {
        $this->data = Category::find()
            ->indexBy('id')
            ->asArray()
            ->all();


        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        $url = [];

        foreach ($this->data as $id => &$node)
        {
            if (!$node['parentId'])
            {
                $tree[$id] = &$node;
                $tree[$id]['link'] = &$node['url'];

                $url[] = &$node['url'];
            }
            else
            {
                $this->data[$node['parentId']]['childs'][$node['id']] = &$node;
                //$this->data[$node['parentId']]['childs'][$node['id']]['link'] = $this->data[$node['parentId']] .'/'. $node['id'];
                //$url[] = &$node['url'];
            }
        }

        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';

        foreach ($tree as $category)
        {
            $str .= $this->catToTemplate($category, $tab);
        }

        return $str;
    }

    protected function catToTemplate($category, $tab)
    {
        ob_start();
        include __DIR__ . '/views/' .$this->view;
        return ob_get_clean();
    }
}