<?php

namespace ishop;

class Cache{

    use TSingleton;

    public function set($key, $data, $seconds = 3600){ // Кэшировать на 1 час
        if($seconds){
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            // Записать данные кэша в файл
            if(file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){
                return true;
            }
        }
        return false;
    }

    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['end_time']){ // Смотрим не устарел ли кэш
                return $content;
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }

}