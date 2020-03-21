<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use ishop\App;
use ishop\libs\Pagination;
use ishop\base\Model;

class NewsController extends AppController {

    public function viewAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('news');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $news = \R::findAll('news', "ORDER BY date DESC LIMIT $start, $perpage");
        $this->setMeta('Новости');
        $this->set(compact('news', 'pagination', 'count'));
    }

    public function viewOneAction(){
        $id = $this->route['id'];
        $new = \R::findOne('news', "id = ?", [$id]);
        if(!$new){
            throw new \Exception('Страница не найдена', 404);
        }
        \R::exec( 'UPDATE news SET views = views + 1 WHERE id = ?', [$id] );
        $this->setMeta("Новость - {$new->title}");
        $this->set(compact('new'));
    }

}