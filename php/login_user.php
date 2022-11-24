<?php
require_once "SQLQuery.php";
SQLQuery::connect();

$login = filter_var(trim($_POST['logininput']),
    FILTER_SANITIZE_STRING);
$pas = filter_var(trim($_POST['pasinput']),
    FILTER_SANITIZE_STRING);

$pas = md5($pas . "djkfhsdjf");

//$result = R::getAll("SELECT * FROM register WHERE login = '{$login}' AND pass='{$pas}'");

$user = SQLQuery::UserLogin($login, $pas);
if(count($user) == 0){
    echo "Такой пользователь не найден";
    exit();
}

setcookie('userName', $user[0]['name'], time() + 3600);

header('Location: /expenses.html');