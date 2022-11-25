<?php

class SQLQuery
{
    public const paramMonth = ["Январь" => "1", "Февраль" => "2", "Март" => "3", "Апрель" => "4", "Май" => "5", "Июнь" => "6", "Июль" => "7", "Август" => "8", "Сентябрь" => "9", "Октябрь" => "10", "Ноябрь" => "11", "Декабрь" => "12"];

    public const paramCategory = ["Всякие фигульки" => "1", "Детки" => "2", "Забота о себе" => "3", "Здоровье и фитнес" => "4", "Кафе и рестораны" => "5", "Квартира(дом)" => "6", "Машина" => "7", "Образование" => "8", "Шоппинг" => "9", "Отдых и развлечение" => "10", "Подарки" => "11", "Все категории" => "12"];

    public const paramCategoryIncome = ["Заработная плата" => "1", "Пенсия" => "2", "Прочий доход" => "3"];

    static function category()
    {
        $id = R::getAll("SELECT id FROM register WHERE name='{$_COOKIE['userName']}'");
        $category = (Sort::Search($_POST['categoryExpense'], self::paramCategory));

        $year = date('Y');
        $number = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $year);
        $date1 = date("Y-{$_POST['month']}-01");
        $date2 = date("Y-{$_POST['month']}-{$number}");

        $expenses = R::getAll("SELECT * FROM money WHERE date BETWEEN '{$date1}' AND '{$date2}' AND category='{$category}'  AND user__id = '{$id[0]['id']}' ");
        return $expenses;
    }

    static function addRecord($entry, $date, $category)
    {
        $id = R::getAll("SELECT id FROM register WHERE name='{$_COOKIE['userName']}'");
        $table = R::dispense('money');
        $table->sum = $entry;
        $table->date = $date;
        $table->category = $category;
        $table->user__ID = $id[0]['id'];

        R::store($table);
    }

    static function resetTableExpenses()
    {
        R::wipe('money');

        header('Location: /');

        R::close();
    }

    static function connect()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
        class_alias('\RedBeanPHP\R', '\R');
        R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');
    }

    static function addRecordIncome($income, $date, $category)
    {
        $id = R::getAll("SELECT id FROM register WHERE name='{$_COOKIE['userName']}'");
        $table = R::dispense('income');
        $table->quantity = $income;
        $table->date = $date;
        $table->category = $category;
        $table->user__ID = $id[0]['id'];

        R::store($table);
    }

    static function categoryEconomy()
    {
        $year = date('Y');
        $number = cal_days_in_month(CAL_GREGORIAN, $_POST['monthEconomy'], $year);
        $date1 = date("Y-{$_POST['monthEconomy']}-01");
        $date2 = date("Y-{$_POST['monthEconomy']}-{$number}");

        $income = R::getAll("SELECT * FROM income WHERE date BETWEEN '{$date1}' AND '{$date2}'");
        return $income;
    }

    static function categoryExpenses()
    {

        $year = date('Y');
        $number = cal_days_in_month(CAL_GREGORIAN, $_POST['monthEconomy'], $year);
        $date1 = date("Y-{$_POST['monthEconomy']}-01");
        $date2 = date("Y-{$_POST['monthEconomy']}-{$number}");

        $expenses = R::getAll("SELECT * FROM money WHERE date BETWEEN '{$date1}' AND '{$date2}'");
        return $expenses;
    }

    static function resetTableIncome()
    {
        R::wipe('income');

        header('Location: /');

        R::close();
    }

    static function expensesFull()
    {
        $expensesFull = R::getAll("SELECT * FROM money");
        return $expensesFull;
    }

    static function incomeFull()
    {
        $incomeFull = R::getAll("SELECT * FROM income");
        return $incomeFull;
    }

}