<?php
include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');


function dump($what)
{
    echo '<pre>';print_r($what);echo '</pre>';
}

if($_POST['month'] == 1){
    $name_month = "Январь";
}else if($_POST['month'] == 2){
    $name_month = "Февраль";
}else if($_POST['month'] == 3){
    $name_month = "Март";
}else if($_POST['month'] == 4){
    $name_month = "Апрель";
}else if($_POST['month'] == 5){
    $name_month = "Май";
}else if($_POST['month'] == 6){
    $name_month = "Июнь";
}else if($_POST['month'] == 7){
    $name_month = "Июль";
}else if($_POST['month'] == 8){
    $name_month = "Август";
}else if($_POST['month'] == 9){
    $name_month = "Сентябрь";
}else if($_POST['month'] == 10){
    $name_month = "Октябрь";
}else if($_POST['month'] == 11){
    $name_month = "Ноябрь";
}else if($_POST['month'] == 12){
    $name_month = "Декабрь";
}



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

