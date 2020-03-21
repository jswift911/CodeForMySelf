<?php

namespace app\controllers\admin;


use app\models\admin\News;
use ishop\libs\Pagination;

class NewsController extends AppController {

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('news');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $news = \R::findAll('news', "LIMIT $start, $perpage");
        $this->setMeta('Список новостей');
        $this->set(compact('news', 'pagination', 'count'));
    }

    public function addAction(){
        if(!empty($_POST)){
            $news = new News();
            $data = $_POST;
            $news->load($data);
            if(!$news->validate($data)){
                $news->getErrors();
                redirect();
            }
            if($news->save('news', false)){
                $_SESSION['success'] = 'Новость добавлена';
                redirect();
            }
        }
        $this->setMeta('Новая новость');
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $news = new News();
            $data = $_POST;
            $news->load($data);
            if(!$news->validate($data)){
                $news->getErrors();
                redirect();
            }
            if($news->update('news', $id)){
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }

        $id = $this->getRequestID();
        $news = \R::load('news', $id);
        $this->setMeta("Редактирование новости {$news->title}");
        $this->set(compact('news'));
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $news = \R::load('news', $id);
        \R::trash($news);
        $_SESSION['success'] = "Новость удалена";
        redirect();
    }

}