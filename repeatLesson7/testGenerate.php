<?php

function data()
{
//    return range(0, 10000);

    //$ret = []; убрали

    $i = 0;

    while ($i <= 10000) {
        //$ret[] = $i; убрали
        yield $i; //генерация очередного значения Функция возвращает значение, но не прекращает работу.
        // она замараживается, она стоит, ждёт.
        $i = $i +1;
    }

    //return $ret; убрали
}

$sum = 0;
foreach (data() as $x) {

    $sum = $sum + $x;
//    echo $x;
//    echo '<br>';
}

echo $sum;

//проверка
function test()
{
    echo '1';
    $i = 1;

    while ($i <= 4) {
        echo '2';
        var_dump(yield $i); // возвр. int. var_dump возвратит null
        echo '3';
        $i = $i + 1;
        yield; // возвр. null
        echo '5';
    }
    echo '6';
}

var_dump(test());//object Generator [5]

foreach (test() as $x) {
    echo '7<br>'; //боль - тег
}


/* Результат
127
37
527
37
527
37
527
37
56
*/
