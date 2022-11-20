<?php
require_once "Sort.php";
require_once "SQLQuery.php";
SQLQuery::connect();

$income = SQLQuery::categoryEconomy();

$sumIncome = Sort::sumIncome($income);

$expenses = SQLQuery::categoryExpenses();

$name_monthEconomy = (Sort::Search($_POST['monthEconomy'], SQLQuery::paramMonth));

$sumExpenses = Sort::sum($expenses);

$expensesFull = SQLQuery::expensesFull();

$expensesFullSum = Sort::sum($expensesFull);

$incomeFull = SQLQuery::incomeFull();

$incomeFullSum = Sort::sumIncome($incomeFull);

$economyFull = $incomeFullSum - $expensesFullSum;

$economy = $sumIncome - $sumExpenses;

require_once "../income.html";


