<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use ishop\App;
use ishop\libs\Pagination;

class CategoryController extends AppController {

    public function viewAction(){
        $alias = $this->route['alias'];
        $category = \R::findOne('category', 'alias = ?', [$alias]);
        if(!$category){
            throw new \Exception('Страница не найдена', 404);
        }

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        // хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        // пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // номер текущей страницы
        $perpage = App::$app->getProperty('pagination'); // передаем значение пагинации из config.php
        $total = \R::count('product', "category_id IN ($ids)"); // Общее количество записей
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart(); // Начальное (активное) положение



        $products = \R::find('product', "category_id IN ($ids) LIMIT $start, $perpage");
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));
    }

}