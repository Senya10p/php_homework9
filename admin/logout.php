<?php

require __DIR__ . '/../autoload.php';

$admin = new \App\Authorization();

$admin->out();

if ( null === $admin->out() ) {
    header('Location: /admin/login.php');
    exit;
}

$v = new \App\Models\View();