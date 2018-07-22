<?php

require __DIR__ . '/autoload.php';

//страница Обо мне

$text = new \App\Models\AboutMe(__DIR__ . '/aboutme.txt');

$v = new \App\Models\View();
$v->assign('records', $text->getData());
$v->display(__DIR__ . '/templates/aboutme.php');