<?php

/*
//анонимная ф-я
function ($x, $y) {
    return $x + $y;
}
*/

/*
//одноразовая ф-я
echo (function ($x, $y) {
    return $x + $y;
})(2, 3);
*/

//создать имя (переменную)
$sum = function ($x, $y) {
    return $x + $y;
};

//echo $sum(2, 3);

$dif = function ($x, $y) {
    return $x + $y;
};


function calc($x, $y, $op)
{
    return $op($x, $y);
}

echo calc(3, 4, $sum);
