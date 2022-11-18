<?php
require_once "Sort.php";
require_once "SQLQuery.php";
SQLQuery::connect();

$category = (Sort::Search($_POST['categoryExpense'], SQLQuery::paramCategory));

$name_month = (Sort::Search($_POST['month'], SQLQuery::paramMonth));

$expenses = SQLQuery::category();

$sum = Sort::sum($expenses);

$expenses = R::findAll('money');

$sumALL = Sort::sum($expenses);

require_once "../index.html";



