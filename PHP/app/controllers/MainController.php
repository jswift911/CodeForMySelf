<?php


namespace app\controllers;


use ishop\Cache;

class MainController extends AppController
{

    public function indexAction() {

        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        $news = \R::find('news', "ORDER BY date DESC LIMIT 4");
        $slider = \R::find('slider', "LIMIT 10");
        $this->setMeta('Главная страница','Описание','Ключевики');

        $this->set(compact('brands', 'hits', 'news', 'slider')); // помещаем данные в вид
    }
}