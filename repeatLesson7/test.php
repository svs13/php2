<?php

/*
$sum = function ($x, $y) {
    return $x + $y;
};

echo $sum(4, 5);
*/

/*
$l = function ($val) {
    return '!' . $val;
};

$r = function ($val) {
    return $val . '!';
};

//echo $l('hello');
echo $r('hello');
*/

/*
function filter($type)
{
    switch ($type) {
        case 'L':
            return function ($val) {
                return '!' . $val;
            };
        case 'R':
            return function ($val) {
                return $val . '!';
            };
    }
}


echo filter('R')('hello');

*/

//Функциональное программирование

//map

$arr = [1, 2, 3, 4];

$res = array_map( //применяет ф-ю к каждому элементу массива
    function ($x) {
        return $x*2;
    },
    $arr
);

var_dump($res);


//фильтр

$res = array_filter($arr, function ($x) {
    return $x % 2 == 0;
});

var_dump($res);

//редьюс

$res = array_reduce(
    $arr,
    function ($acc, $x) {
        return $acc + $x;
    },
    0 //начальное значение аккумулятора
);
//в итоге эта операция посчитает сумму элементов массива

var_dump($res);

//$lang = 'Hello';

$lang = [
    'hello' => 'Hello'
];

//const LANG = [
//    'hello' => 'Hello'
//];



$hello = function ($name) use ($lang) {
    return $lang['hello'] . ', ' . $name . '!';
};

echo $hello('John');

$lang = [
    'hello' => 'Привет'
];
