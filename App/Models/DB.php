<?php

namespace App\Models;

class DB //Создаём класс DB
{
    protected $dbh;

    public function __construct() //Создаём конструктор. В нём устанавливаем соединение с БД.
    {
        $path = __DIR__ . '/../../config.php';
        $conf = require $path; //Параметры берём из файла config.php
        if ( is_array($conf) ) {
            if ( isset( $conf['dsn'], $conf['username'], $conf['password'] ) ) {
                $this->dbh = new \PDO( $conf['dsn'], $conf['username'], $conf['password'] );
           }
        }
    }

    public function execute(string $sql) //Метод execute(string $sql) выполняет запрос и возвращает либо true, либо false
    {
        $sth = $this->dbh->prepare($sql); //подготовка запроса
        if ( false === $sth ) { //если ошибка при подготовке запроса
                return false;
            }
        return $sth->execute(); //возвращает или true или false, в зависимости от того, удалось ли выполнение
    }

//Метод query(string $sql, array $data) выполняет запрос, подставляет в него данные $data, возвращает данные результата запроса или false
    public function query(string $sql, array $data)
    {
        $sth = $this->dbh->prepare($sql); //Подготавливает запрос к выполнению
        if (false !== $sth) {
            if ( $sth->execute($data) ) {
                return $sth->fetchAll();
            }
        }
        return false;
    }
}