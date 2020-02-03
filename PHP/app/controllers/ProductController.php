<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends AppController {

    public function viewAction(){
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if(!$product){
            throw new \Exception('Страница не найдена', 404);
        }

        // хлебные крошки

        // связанные товары
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

        // запись в куки запрошенного товара

        // просмотренные товары

        // галерея
        $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

        // модификации

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery'));
    }

}