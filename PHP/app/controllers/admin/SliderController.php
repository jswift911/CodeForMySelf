<?php

namespace app\controllers\admin;


use app\models\admin\Product;
use app\models\admin\Slider;
use ishop\App;
use ishop\libs\Pagination;

class SliderController extends AppController {

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('slider');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $slider = \R::findAll('slider', "LIMIT $start, $perpage");
        $this->setMeta('Управление слайдером');
        $this->set(compact('slider', 'pagination', 'count'));
    }

    public function addImageAction(){
        if(isset($_GET['upload'])){
            if ($_POST['name'] == 'single'){
                $wmax = App::$app->getProperty('slider_width');
                $hmax = App::$app->getProperty('slider_height');
            }
            $name = $_POST['name'];
            $slider = new Slider();
            $slider->uploadImg($name, $wmax, $hmax);
        }
    }

    public function addAction(){
        if(!empty($_POST)){
            $slider = new Slider();
            $data = $_POST;
            $slider->load($data);
            $slider->getImg();
            if(!$slider->validate($data)){
                $slider->getErrors();
                redirect();
            }
            if($slider->save('slider', false)){
                $_SESSION['success'] = 'Слайд добавлен';
                redirect();
            }
        }
        $this->setMeta('Новый слайд');
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $slider = new Slider();
            $data = $_POST;
            $slider->load($data);
            $slider->getImg();
            if(!$slider->validate($data)){
                $slider->getErrors();
                redirect();
            }
            if($slider->update('slider', $id)){
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }

        $id = $this->getRequestID();
        $slider = \R::load('slider', $id);
        $this->setMeta("Редактирование слайда {$slider->title}");
        $this->set(compact('slider'));
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $slider = \R::load('slider', $id);
        \R::trash($slider);
        $_SESSION['success'] = "Слайд удален";
        redirect();
    }

}