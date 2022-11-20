<?php
require_once "SQLQuery.php";
SQLQuery::connect();

SQLQuery::resetTableExpenses();

header('Location: /');

