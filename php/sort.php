<?php
class sort
{
    static function Search($value, $array)
    {
        return (array_search($value, $array));
    }

    static function sum($expenses)
    {
        $sum = 0;
        foreach ($expenses as $expens) {
            $sum += (int)$expens['sum'];
        }
        return $sum;
    }
}