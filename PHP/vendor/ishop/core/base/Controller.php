<?php


namespace ishop\base;


abstract class Controller {

    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta =['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route) {

        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];

    }

    // Рендеринг
    public function getView() {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    // Помещает данные в вид
    public function set($data) {
        $this->data = $data;
    }

    // Мета данные <meta>
    public function setMeta($title = '', $desc = '', $keywords = '') {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}