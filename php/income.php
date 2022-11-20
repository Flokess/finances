<?php
require_once "SQLQuery.php";
require_once "Sort.php";
SQLQuery::connect();

$quantity = $_POST['incomeEntry'];
$date = $_POST['date'];
$category = $_POST['category'];

$category = (Sort::Search($_POST['categoryIncome'], SQLQuery::paramCategoryIncome));

if ($quantity == 0 | $date == 0) {
    ?>
    <script>
        alert("ВВЕДИТЕ СУММУ И ДАТУ");
    </script> <?php
} else {
    SQLQuery::addRecordIncome($quantity, $date, $category);
    header('Location: /income.html');
}
R::close();