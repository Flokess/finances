<?php
include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');


function dump($what)
{
    echo '<pre>';print_r($what);echo '</pre>';
}

$expenses = R::loadAll('money', [1,2,3] );





