<?php

namespace App\Models;

class AboutMe
{
    protected $data;    //защищённое свойство для хранения данных
    protected $path;
   // public $text;

    public function __construct($path) //в конструктор передаём путь к файлу
    {
        $this->path = $path;
        if ( is_readable($this->path) ){
            $lines = file_get_contents( $this->path );
            $this->data = $lines;
        } else {
            $this->data = '';
        }
    }


    public function getData() //Метод getData() возвращает массив записей
    {
        return $this->data;
    }

        public function append($text) //Метод append($text) добавляет новую запись к массиву записей
        {
           // $text = $_POST['msg'];
            if ($text != '') {
               return $this->data = $text;
            }
        }

    public function save() //Метод save() сохраняет массив в файл
    {
        //$this->data = $text . PHP_EOL;
        file_put_contents( $this->path, $this->data );
    }
}