<?php

namespace App\Models;

class GBMessages  //Создаём класс записей гостевой книги
{
    protected $dataBase;
    protected $articles;

   public function __construct()
   {
       $this->dataBase = new DB();
   }

   public function getAll()
   {
       if ( isset($this->articles) ) {
           return $this->articles;
       }
       $sql = 'SELECT * FROM guestbook ORDER BY id DESC';
       $ret = [];
       $arts = $this->dataBase->query($sql, $ret);
       $this->articles = [];
        if (false !== $arts) {
            foreach ($arts as $arr) {
                if ( is_array($arr) ) {
                    if ( isset( $arr['text'], $arr['author'], $arr['id'] ) ) {
                        $this->articles[$arr['id']] = new Article( $arr['text'], $arr['author'] );
                    }
                }
            }
            return $this->articles;
        }
   }

   public function addArticle(Article $article)
   {
       $t = strlen( $article->getAuthor() );
       if ( $t < 1 || $t > 100 ) { //ограничение по длине
           return false;
       }
       $t = strlen( $article->getText() );
       if ( $t < 1 || $t > 100000 ) { //ограничение по длине
           return false;
       }
       $sql = 'INSERT INTO guestbook (text, author) VALUES (:t,:a)'; //Добавление записей в гостевую книгу
       $ar = [
           ':t' => $article->getText(),
           ':a' => $article->getAuthor()
       ];
       $d = $this->dataBase->query($sql, $ar);
       if (false === $d) { //если запись не добавлена
           return false;
       }
       if ( isset($this->articles) ) {
           unset($this->articles);
       }
       return true;
   }

   public function delArticle(string $id)
   {
       $sql = 'DELETE FROM guestbook WHERE id=:id';//Удаление записи с таким id из БД
       $ar = [':id' => $id];
       $d = $this->dataBase->query( $sql, $ar );

       if ( false === $d) {
           return false;
       }
       return true;
   }

}