<?php
require_once "SQLQuery.php";

class TotalBalance
{
    static function addExpenses()
    {
        return SQLQuery::category(1);
    }

    static function addIncome()
    {
        return SQLQuery::categoryEconomy(0);
    }

    static function finalIncome()
    {
        $id = R::getAll("SELECT id FROM register WHERE name='{$_COOKIE['userName']}'");
      return R::getAll("SELECT * FROM income WHERE user__id = '{$id[0]['id']}' ");

    }

    static function finalExpenses()
    {
        return SQLQuery::expensesFull();
    }
}
