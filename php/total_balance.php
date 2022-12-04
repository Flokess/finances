<?php
require_once "SQLQuery.php";
require_once "Sort.php";
require_once "TotalBalance.php";
SQLQuery::connect();

$name_month = (Sort::Search($_POST['month'], SQLQuery::paramMonth));

$expensesAdded = TotalBalance::addExpenses();

$sumExpenses = Sort::sum($expensesAdded);

$incomeEdded = TotalBalance::addIncome();

$sumIncome = Sort::sumIncome($incomeEdded);

$economyForMonth = $sumIncome - $sumExpenses;

$finalIncome = TotalBalance::finalIncome();

$finalIncome = Sort::sumIncome($finalIncome);

$finalExpenses = TotalBalance::finalExpenses();

$finalExpenses = Sort::sum($finalExpenses);

$balance = $finalIncome - $finalExpenses;



require_once "../balance.html";
