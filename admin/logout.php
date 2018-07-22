<?php

require __DIR__ . '/../autoload.php';


$admin = new \App\Models\Authorization();

$admin->out();

if ( null === $admin->out() ) {

    header('Location: /admin/login.php');

    exit;
}


$v = new View();