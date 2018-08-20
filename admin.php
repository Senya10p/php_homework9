<?php

//Админ-панель
require __DIR__ . '/autoload.php';

//Авторизация
$admin = new \App\Authorization();

if ( null === $admin->getUsername() ) { //если пользователь не вошёл
    header('Location: /admin/login.php');
    exit;
}

//Добавление фото
$gal = new \App\Models\Uploader('upl');

$gal->isUploaded();

if (  null !== $admin->getUsername() ) {

    $gal->upload(__DIR__ . '/gallery/images/', ['image/jpg', 'image/png', 'image/jpeg']); //в качестве аргументов передаём путь до файла и тип загружаемого файла
}

$list = scandir(__DIR__ . '/gallery/images');
$list = array_diff($list, ['.', '..']);


//Обо мне текст
$text = new \App\Models\AboutMe(__DIR__ . '/aboutme.txt');

if ( isset( $_POST['text'] ) ) {
    $text->update($_POST['text']);
    $text->save();
}

//Гостевая книга
$gb = new \App\Models\GBMessages();
//var_dump($news->getAll());

if ( isset($_POST['del']) ) {
    $gb->delArticle( $_POST['del'] );
}

$gb->getAll();
$data = $gb->getAll();

//Отображение
$view = new \App\Models\View();


$view->assign('data', $data); //гостевая книга

$view->assign('records', $text->getData() );//текстовка обо мне

$view->assign('list', $list);//фотогаллерея

$view->display(__DIR__ . '/templates/admin.php');
