<?php

namespace app\widgets\menu;

use ishop\App;
use ishop\Cache;

class Menu{

    protected $data; // Данные
    protected $tree; // Дерево данных
    protected $menuHtml; // Рендер меню
    protected $tpl; // Шаблон меню
    protected $container = 'ul'; // Обертка менюшки
    protected $class = 'menu'; // Класс для обертки-контейнера меню
    protected $table = 'category'; // Таблица БД с данными
    protected $cache = 3600; // Кэш на 1 час
    protected $cacheKey = 'ishop_menu'; // Ключ для кэша
    protected $attrs = []; // Дополнительные атрибуты для разметки менюшки (id, data-атрибут и тд)
    protected $prepend = ''; // html вставляется перед кодом (например в select самостоятельная категория)

    public function __construct($options = []){
        $this->tpl = __DIR__ . '/menu_tpl/menu.php'; // Путь к шаблону по умолчанию, если в разметке watches.php заполнить путь вручную, то будет использоваться он
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){ // Option - массив из разметки watches.php
        foreach($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }


    protected function run(){
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if(!$this->data){
                $this->data = $cats = \R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }


    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $k => $v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    // Из массива с данными получаем дерево (каждый массив будет вкалдываться в родительский)
    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    // Получаем разметку из дерева. $tab - разделитель.
    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach($tree as $id => $category){
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    // Формируем из конкретной категории кусочек html кода
    protected function catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}