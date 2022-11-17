<?php

class SQLQuery
{
    public const paramMonth = ["Январь" => "1", "Февраль" => "2", "Март" => "3", "Апрель" => "4", "Май" => "5", "Июнь" => "6", "Июль" => "7", "Август" => "8", "Сентябрь" => "9", "Октябрь" => "10", "Ноябрь" => "11", "Декабрь" => "12"];

    public const paramCategory = ["Всякие фигульки" => "1", "Детки" => "2", "Забота о себе" => "3", "Здоровье и фитнес" => "4", "Кафе и рестораны" => "5", "Квартира(дом)" => "6", "Машина" => "7", "Образование" => "8", "Шоппинг" => "9", "Отдых и развлечение" => "10", "Подарки" => "11", "Все категории" => "12"];

    static function category()
    {
        $category = (sort::Search($_POST['category'], self::paramCategory));

        $year = date('Y');
        $number = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $year);
        $date1 = date("Y-{$_POST['month']}-01");
        $date2 = date("Y-{$_POST['month']}-{$number}");

        $expenses = R::getAll("SELECT * FROM money WHERE date BETWEEN '{$date1}' AND '{$date2}' AND category='{$category}'");
        return $expenses;
    }

    static function addRecord($entry, $date, $category)
    {
        $table = R::dispense('money');
        $table->sum = $entry;
        $table->date = $date;
        $table->category = $category;

        R::store($table);
    }

    static function closeDB()
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
}