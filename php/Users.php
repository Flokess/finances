<?php

class Users
{
    static function UserLogin($login, $pas){
        $result = R::getAll("SELECT * FROM register WHERE login = '$login' AND pass='$pas'");
        $user = $result;
        return $user;
    }
    static function addRecordRegister($login, $name, $pas, $date)
    {
        $table = R::dispense('register');
        $table->name = $name;
        $table->pass = $pas;
        $table->login = $login;
        $table->date = $date;

        R::store($table);
    }
    static function NewUserLogin()
    {
        return R::getAll("SELECT * FROM register WHERE login='{$_POST['login']}'") == null;
    }

}