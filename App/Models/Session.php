<?php


namespace App\Models;


class Session   //Создаём класс сессии
{
    public function __construct()
    {
        $this->start();
    }


    public function active()
    {
        if ( PHP_SESSION_ACTIVE === session_status() ) {

            return true;
        }

        return false;
    }


    public function start() //начинает сессию
    {
        if ( $this->active() ) {

            return true;
        }

        if ( session_start() ) {

            return true;
        }

        return false;
    }


    public function destroy()   //Уничтожает сессию
    {
        if ( $this->active() ) {

            session_destroy();
        }
    }


    public function getParameter(string $name)
    {
        if ( $this->active() ) {
            if ( isset( $_SESSION ) ) {
                if ( isset( $_SESSION[$name] ) ) {

                    return $_SESSION[$name];
                }
            }
        }
    }


    public function setParameter($name, $value)
    {
        if ( $this->active() ) {
            if ( isset($_SESSION) ) {

                $_SESSION[$name] = $value;

                return true;
            }
        }

        return false;
    }










}