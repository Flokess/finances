<?php
require_once "SQLQuery.php";
SQLQuery::connect();

SQLQuery::resetTableIncome();

header('Location: /income.html');