<?php
include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');


function dump($what)
{
    echo '<pre>';print_r($what);echo '</pre>';
}

$expenses = R::findAll('money');

$sum = 0;
foreach ($expenses as $expens){
    $sasd = $expens['sum'];
     $sum += (int)$expens['sum'];
}

require_once "../index.html";
