<?php

namespace App\Models;

class Admin
{
    protected $login;
    protected $hashpass;

    public function __construct(string $login, string $hashpass)
    {
        $this->login = $login;
        $this->hashpass = $hashpass;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getHashPass()
    {
        return $this->hashpass;
    }
}