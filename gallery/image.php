<?php //Страница фотогалереи. Выводит одно изображение на весь экран

//include_once __DIR__ . '/array.php';    //Подключаем массив

require __DIR__ . '/../autoload.php';

$list = scandir(__DIR__ . '/images');
$list = array_diff($list, ['.', '..']);

$v = new \App\Models\View();
$v->assign('list', $list);
$v->display( __DIR__ . '/../templates/image.php')
?>
