<?php

require __DIR__ . '/../autoload.php';

$admin = new \App\Models\Authorization();

$admin->getUsername();

if ( isset( $_POST['login'], $_POST['password'] ) ) {
    if ( $admin->authorization( $_POST['login'], $_POST['password'] ) ) {
        header('Location: /admin.php');
    }
}

if ( null !== $admin->getUsername() ) {
    header('Location: /admin.php');
    exit;
}

//echo password_hash('123', PASSWORD_DEFAULT);//PASSWORD_DEFAULT - берёт наиболее стойкий по умолчанию алгоритм
//  $hash = '$2y$10$FNtUFP7zjSMipaSWYHw9ceRxkYYAAWZOjHKmLVZ5zzIKb5OeygxE6';

$view = new \App\Models\View(); //выводим через класс View

$view->display(__DIR__ . '/../templates/login.php');