<?php   //класс для Авторизации

namespace App\Models;


class Authorization
{
    protected $username;
    protected $db;
    protected $session;

    public function __construct()
    {
        $this->db = new DB();

        if ( PHP_SESSION_ACTIVE !== session_status() ) {
            session_start();
        }
        $us = $this->getUserSession();

        if ( $this->findLogin($us) ) {
            $this->username = $us;
        }
        if ( !isset($this->username) ) {
            $this->username = null;
        }
    }

    protected function getUserSession() //берём параметры сессии
    {
        if ( PHP_SESSION_ACTIVE === session_status() ) {
            if ( isset($_SESSION['username']) ) {
                return $_SESSION['username'];
            }
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    protected function findLogin($login) //если есть пользователь с таким логином, то вернёт true
    {
        $sql = 'SELECT login FROM admin WHERE login=:log';
        $ret = [':log' => $login];
        $arr = $this->db->query($sql, $ret);

        if ( is_array($arr) ) {
            if ( isset($arr[0]['login']) ) {
                if ( $login === $arr[0]['login'] ) {
                    return true;
                }
            }
        }
        return false;
    }

    protected function findAdmin($login) //метод для нахождения админа по логину
    {
        $sql = 'SELECT login, hashpass FROM admin WHERE login=:log';
        $ret = [':log' => $login];
        $arr = $this->db->query($sql, $ret);

        if ( is_array($arr) ) {
            if ( isset( $arr[0]['login'], $arr[0]['hashpass'] ) ) {
                if ( $login === $arr[0]['login'] ) {
                    return new Admin( $arr[0]['login'], $arr[0]['hashpass'] );
                }
            }
        }
    }

    public function authorization(string $login, string $password) //метод для авторизации
    {
        $ad = $this->findAdmin($login);
        if (null !== $ad) {
            $us = $ad->getLogin();
            $h = $ad->getHashPass();
            if ($login === $us) {
                if (password_verify($password, $h)) {
                    if (isset($_SESSION)) {
                        $_SESSION['username'] = $login;
                        $this->username = $login;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function out() //выход
    {
        if ( PHP_SESSION_ACTIVE === session_status() ) {
            session_destroy();
        }
        $this->username = null;
    }
}