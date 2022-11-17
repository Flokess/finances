<?php
require_once "sort.php";
require_once "SQLQuery.php";
SQLQuery::connect();

$category = (sort::Search($_POST['category'], SQLQuery::paramCategory));

$name_month = (sort::Search($_POST['month'], SQLQuery::paramMonth));

$expenses = SQLQuery::category();

$sum = sort::sum($expenses);

$expenses = R::findAll('money');

$sumALL = sort::sum($expenses);

require_once "../index.html";



