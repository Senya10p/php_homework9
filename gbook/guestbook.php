<?php       // Страница гостевой книги страница. Выводит все записи гостевой книги

require __DIR__ . '/../autoload.php';


if ( isset( $_POST['text'] ) ) {
    $text = $_POST['text'];
} else {
    $text = '';
}

if ( isset( $_POST['author'] ) ) {
    $author = $_POST['author'];
} else {
    $author = '';
}

if ( 0 === strlen( $text . $author ) ) {
    $add = NULL;
} else {
    $add = ( new \App\Models\GBMessages() )->addArticle( new \App\Models\Article( $text, $author ) );
}

if ( true === $add ) {
    $text = '';
    $author = '';
}


$news = new \App\Models\GBMessages();

//var_dump($news->getAll());

$news->getAll();
$data = $news->getAll();

$view = new \App\Models\View(); //выводим через класс View
$view->assign('data', $data );

$view->assign('text', $text);
$view->assign('author', $author);
$view->assign('msgAdd', $add);

$view->display(__DIR__ . '/../templates/guestbook.php');