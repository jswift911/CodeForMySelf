<?php


namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use ishop\App;
use ishop\base\Controller;
use ishop\Cache;

class AppController extends Controller
{
    public function __construct($route){
        parent::__construct($route);
        new AppModel();
        // Реестр - это наше  персональное хранилище класс Registry.php
        App::$app->setProperty('currencies', Currency::getCurrencies()); // Запись в реестр данных валют из БД
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies'))); // Запись в реестр активной валюты из БД
        App::$app->setProperty('cats', self::cacheCategory()); // Кладем кеш категорий в реестр
    }

    // Кэширование категорий
    public static function cacheCategory() {
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if (!$cats) {
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }

}