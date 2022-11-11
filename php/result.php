<?php
include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');



function Search($value, $array)
{
    return (array_search($value, $array));
}
$param = ["Январь"=>"1", "Февраль"=>"2", "Март"=>"3", "Апрель"=>"4", "Май"=>"5", "Июнь"=>"6", "Июль"=>"7", "Август"=>"8", "Сентябрь"=>"9", "Октябрь"=>"10", "Ноябрь"=>"11", "Декабрь"=>"12"];
$name_month = (Search($_POST['month'], $param));



$year = date('Y');
$number = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $year); // 31
$date1 = date("Y-{$_POST['month']}-01");
$date2 = date("Y-{$_POST['month']}-{$number}");



$expenses = R::getAll("SELECT * FROM money WHERE date BETWEEN '{$date1}' AND '{$date2}'");
$sum = 0;
foreach ($expenses as $expens)
{
    $sum += (int)$expens['sum'];
}



$expenses = R::findAll('money');
$sumALL = 0;
foreach ($expenses as $expens)
{
    $sumALL += (int)$expens['sum'];
}


require_once "../index.html";


