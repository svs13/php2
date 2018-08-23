<?php

/*
 *
 */

/*
function some()
{
    echo func_num_args(); //кол-во аргументов
    var_dump(func_get_args()); //массив ключ-значение аргументов ЭТО ЧАСТЬ РЕФЛЕКСИИ!
}

some(2, 3, 4);

*/

/*
function some()
{
    $args = func_get_args();
    return array_sum($args);
}

echo some(2, 3, 4);
*/

/*
function some($str, ...$args)
{
    return $str . array_sum($args);
}

echo some('Сумма ', 2, 3, 4);
*/

function some($x, $y)
{
    return $x + $y;
}

$data = [2, 3];

echo some($data[0], $data[1]);
//или что ТОЖЕ САМОЕ
echo some(...$data);
