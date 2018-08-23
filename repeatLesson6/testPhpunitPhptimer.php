<?php

//что такое PHPUnit - это фреймворк для юнит-тестирования в PHP
//echo (int)((0.1 + 0.6) * 10); почему результат 7 ? ответ - внутреннее представление float не может точно задать число.
//в данном случае 0,1+0,6 = 0,799999999999999 , 7,99999999999999 и потом отброс дробной части - результат 7.

//ПОМНИТЬ ВСЕГДА!

require __DIR__ . '/autoload.php';

use SebastianBergmann\Timer\Timer;

Timer::start();

//просто прибавляю единичку 1 миллионн раз
$n = 0;
while ($n < 10**6) {
    ++$n;
}

$time = Timer::stop(); //float
var_dump($time);

print Timer::secondsToTimeString($time); //162 ms
?><br><?php
print Timer::resourceUsage(); //Time: 169 ms, Memory: 2.00MB
