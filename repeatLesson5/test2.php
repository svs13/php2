<?php

//проверка тайпхинтинга, если значение по умолчанию, будет ли аргументу заваться тайпхинтинг по типу значения?

function test($a = [])
{
    var_dump($a);
}

test();
test(1);
test(3.45);
test(true);
test(null);

// ответ - НЕТ. Ошибок нет. Тайпхинтинга аргументу не задано


//тоже но с тайпхинтингом

function test1(array $a = [])
{
    var_dump($a);
}

test1();
test1(1); //Fatal error
test1(3.45);
test1(true);
test1(null);




