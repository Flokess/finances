<?php
require_once "Sort.php";
require_once "SQLQuery.php";
SQLQuery::connect();

$income = SQLQuery::categoryEconomy();

$sumIncome = Sort::sumIncome($income);

$expenses = SQLQuery::categoryExpenses();

$name_month = (Sort::Search($_POST['monthEconomy'], SQLQuery::paramMonth));

$sumExpenses = Sort::sum($expenses);

$economy = $sumIncome - $sumExpenses;

require_once "../index.html";