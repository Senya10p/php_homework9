<?php

namespace App\Models;


class Article       // Создаём класс Article
{
    protected $text;   //текст сообщения
    protected $author; //автор сообщения

    public function __construct(string $text, string $author)
    {
        $this->text = $text;
        $this->author = $author;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}