<?php
include $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class_alias('\RedBeanPHP\R', '\R');
R::setup('mysql:host=127.0.0.1;dbname=expenses', 'root', 'root');

R::wipe('money');

header('Location: /');

R::close();

