<?php


namespace ishop;


trait TSingleton
{

 private static $instance;

 public static function instance()
 {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
 }

}