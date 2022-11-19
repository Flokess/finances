<?php
class Sort
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
    static function sumIncome($income)
    {
        $sum = 0;
        foreach ($income as $incom) {
            $sum += (int)$incom['quantity'];
        }
        return $sum;
    }

}