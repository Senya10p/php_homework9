<?php //Страница фотогалереи. Выводи все изображения

require __DIR__ . '/../autoload.php';

$list = scandir(__DIR__ . '/images');
$list = array_diff($list, ['.', '..']);

$v = new \App\Models\View();
$v->assign('list', $list);
$v->display( __DIR__ . '/../templates/gallery.php');
?>