<?php
include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');

$entry = $_POST['entry'];
$date = $_POST['date'];

if(!R::testConnection())
{
    exit("Нет подключения к бд");
}

if ($entry == 0 | $date == 0)
{
    ?><script> alert("ВВЕДИТЕ СУММУ И ДАТУ");</script>  <?php
}else
{
    $table = R::dispense('money');
    $table -> sum = $entry;
    $table -> date = $date;

    R::store($table);
    header('Location: /');
}

R::close();


