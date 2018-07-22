<?php       //Главная страница

require __DIR__ . '/autoload.php';

//['login' => 'sergey', 'password' => '$2y$10$FNtUFP7zjSMipaSWYHw9ceRxkYYAAWZOjHKmLVZ5zzIKb5OeygxE6'],//123 - пароль и хэш

$v = new \App\Models\View;

$v->display( __DIR__ . '/templates/index.php');

?>