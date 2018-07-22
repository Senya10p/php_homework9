<?php

//автозагрузка
function __autoload($class) //   App\Models\DB
{
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    require $path;

}