<?php

namespace ishop\libs;

class Pagination{

    public $currentPage; // текущая страницы
    public $perpage; // сколько выводить на странице (значение в config.php)
    public $total; // Общее количество записей (из БД)
    public $countPages; // Общее количество страниц, которое расчитается из $perpage и $total и округляется в большую сторону
    public $uri; // get-параметры в командной строке ?page=1

    public function __construct($page, $perpage, $total) {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    // Рендерим пагинацию
    public function getHtml(){
        $back = null; // ссылка НАЗАД
        $forward = null; // ссылка ВПЕРЕД
        $startpage = null; // ссылка В НАЧАЛО
        $endpage = null; // ссылка В КОНЕЦ
        $page2left = null; // вторая страница слева
        $page1left = null; // первая страница слева
        $page2right = null; // вторая страница справа
        $page1right = null; // первая страница справа

        if ( $this->currentPage > 1 ) {
            $back = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage - 1). "'>&lt;</a></li>";
        }
        if ( $this->currentPage < $this->countPages ) {
            $forward = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>&gt;</a></li>";
        }
        if ( $this->currentPage > 3 ) {
            $startpage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if ( $this->currentPage < ($this->countPages - 2) ) {
            $endpage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }
        if ( $this->currentPage - 2 > 0 ) {
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-2). "'>" .($this->currentPage - 2). "</a></li>";
        }
        if ( $this->currentPage - 1 > 0 ) {
            $page1left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-1). "'>" .($this->currentPage-1). "</a></li>";
        }
        if ( $this->currentPage + 1 <= $this->countPages ) {
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>" .($this->currentPage+1). "</a></li>";
        }
        if ( $this->currentPage + 2 <= $this->countPages ) {
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }

        return '<ul class="pagination">' . $startpage.$back.$page2left.$page1left.'<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage . '</ul>';
    }

    // Формирует строку с разметкой из объекта, который у нас получается
    public function __toString() {
        return $this->getHtml();
    }

    // Метод получает общее кол-во страниц
    public function getCountPages() {
        return ceil($this->total / $this->perpage) ?: 1; // округляем в большую сторону
    }

    // Метод получает текущую страницу
    public function getCurrentPage($page) {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    // Метод получает активную позицию
    public function getStart() {
        return ($this->currentPage - 1) * $this->perpage;
    }


    // Метод получает свойство $uri (get-параметры в командной строке ?page=1)
    public function getParams() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url); // разбиваем адресную строку по ?
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&', $url[1]); // разбиваем адресную строку по &
            foreach($params as $param){
                if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;"; // Если нету в строке "page="
            }
        }
        return urldecode($uri); // urldecode - декодирует любые кодированные последовательности %## в данной строке.
    }

}