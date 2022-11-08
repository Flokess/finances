<?php
include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');

$entry = $_POST['entry'];


if(!R::testConnection())
{
    exit("Нет подключения к бд");
}

if ($entry == 0)
{
    ?><script> alert("ВВЕДИТЕ СУММУ");</script>    <?php
}else
{
    $table = R::dispense('money');
    $table -> sum = $entry;

    R::store($table);
    header('Location: /');
}

R::close();


