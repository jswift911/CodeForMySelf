<?php


namespace app\widgets\currency;


use ishop\App;

class Currency
{
    protected $tpl; // Шаблон вывода списка валют
    protected $currencies; // Список всех доступных валют
    protected $currency; // Активная валюта

    public function __construct()
    {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    // Получает список доступных валют и возвращает текущую валюту
    protected function run() {
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }


    // Методы статичны, для того чтобы не создавать постоянно объект данного класса
    public static function getCurrencies() {
        return \R::getAssoc("SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC");
    }

    // Получить активную валюту
    public static function getCurrency($currencies){
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies)){
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    // Формирует html разметку
    protected function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}