<?php
require_once "Sort.php";
require_once "SQLQuery.php";
SQLQuery::connect();

$entry = $_POST['entry'];
$date = $_POST['date'];
$category = $_POST['category'];

$category = (Sort::Search($_POST['categoryExpense'], SQLQuery::paramCategory));

if ($entry == 0 | $date == 0) {
    ?>
    <script>
        alert("ВВЕДИТЕ СУММУ И ДАТУ");
    </script> <?php
} else {
    SQLQuery::addRecord($entry, $date, $category);
    header('Location: /');
}
R::close();