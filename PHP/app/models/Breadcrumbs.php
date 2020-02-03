<?php

namespace app\models;

use ishop\App;

class Breadcrumbs {

    public static function getBreadcrumbs($category_id, $name = ''){
        $cats = App::$app->getProperty('cats'); // Берем из реестра - категории
        $breadcrumbs_array = self::getParts($cats, $category_id);
        $breadcrumbs = "<li><a href='" . PATH . "'>Главная</a></li>";
        if ($breadcrumbs_array) {
            foreach($breadcrumbs_array as $alias => $title) {
                $breadcrumbs .= "<li><a href='" . PATH . "/category/{$alias}'>{$title}</a></li>";
            }
        }
        if($name){
            $breadcrumbs .= "<li>$name</li>";
        }
        return $breadcrumbs;
    }

    // Получаем части хлебных крошек (если parent_id != 0, то поднимаемся по дереву пока не станет 0, тем самым формируя части)
    public static function getParts($cats, $id) {
        if (!$id) return false;
        $breadcrumbs = [];
        foreach ($cats as $k => $v) {
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else break;
        }
        return array_reverse($breadcrumbs, true);
    }

}