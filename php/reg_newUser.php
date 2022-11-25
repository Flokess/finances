<?php
require_once "SQLQuery.php";
require_once "Users.php";
SQLQuery::connect();

$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
$pas = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$date = date('Y-m-d');


if (!Users::NewUserLogin()) {
    ?>
    <script>
        alert("ТАКОЙ ПОЛЬЗОВАТЕЛЬ УЖЕ ЗАРЕГЕСТРИРОВАН");
    </script> <?php
    exit();
}else if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    ?>
        <script>
            alert("НЕДОПУСТИМАЯ ДЛИНА ЛОГИНА");
        </script> <?php
    exit();
}else if (mb_strlen($name) < 2 || mb_strlen($name) > 60) {
    ?>
        <script>
            alert("ТАКОГО ИМЕНИ НЕ СУЩЕСТВУЕТ");
        </script> <?php
    exit();
}else if (mb_strlen($pas) < 3 ){
    ?>
        <script>
            alert("СЛИШКОМ КОРОТКИЙ ПАРОЛЬ");
        </script> <?php
    exit();
}


$pas = md5($pas . "djkfhsdjf");


Users::addRecordRegister($login, $name, $pas, $date);

header('Location: /index.html');