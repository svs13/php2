<?php

$data = [
    ['name' => 'Петя', 'age' => 33],
    ['name' => 'Вася', 'age' => 42],
    ['name' => 'Лена', 'age' => 18],
];

//функция сравнения
/*
$compare = function ($person1, $person2) {
    if ($person1['age'] < $person2['age']) {
        return -1;
    }
    if ($person1['age'] > $person2['age']) {
        return 1;
    }
    return 0; //когда сравнение не возможно или они равно
};

usort($data, $compare); // спец ф-я быстрой сортировки

*/

//или ТОЖЕ САМОЕ

$compare = function ($person1, $person2) {
    return $person1['age'] <=> $person2['age'];
};

usort($data, $compare); // спец ф-я быстрой сортировки


