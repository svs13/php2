<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

//Запрос с подстановкой параметров
echo '1. Запрос с подстановкой параметров';

$q = 'INSERT INTO persons (lastname, age) VALUES (:ln, :age)';
$ps = [
    ':ln' => 'Потеряшкин',
    ':age' => 42
];

var_dump( $db->execute($q, $ps) ); //true


//Запрос с подстановкой параметров
echo '2. Запрос с подстановкой параметров';

$q = 'DELETE FROM persons WHERE lastname=:ln';
$ps = [
    ':ln' => 'Потеряшкин',
];

var_dump( $db->execute($q, $ps) ); //true


//Запрос без подстановки параметров
echo '3. Запрос без подстановки параметров';

$q = 'CREATE TABLE temp (id SERIAL, num INT)';

var_dump( $db->execute($q) ); //true


//Запрос без подстановки параметров
echo '4. Запрос без подстановки параметров';

$q = 'DROP TABLE temp';

var_dump( $db->execute($q) ); //true


//Запрос с ошибкой в подстановке
echo '5. Запрос с ошибкой в подстановке';

$q = 'INSERT INTO persons (lastname, age) VALUES (:ln, :age)';
$ps = [
    ':ln111' => 'Потеряшкин',
    ':age' => 42
];

var_dump( $db->execute($q, $ps) ); //false и предупреждение


//Запрос с ошибкой в запросе
echo '6. Запрос с ошибкой в запросе';

$q = 'DROP TABLE temp111';

var_dump( $db->execute($q) ); //false


//В запросе пустая строка
echo '7. В запросе пустая строка';

$q = '';

var_dump( $db->execute($q) ); //false


//В аргументе запроса тип отличный от строки
echo '8. В запросе тип отличный от строки (int)';

$q = 123;

var_dump( $db->execute($q) ); //false, без предупреждений (кастинг, не строгая типизация)


//В аргументе запроса тип отличный от строки
echo '9. В запросе тип отличный от строки (object) - Фатальная ошибка несоотвествия типов аргумента';

$q = new \App\Db();

//var_dump( $db->execute($q) ); //фатал ошибка

?> <br> <?php

//В аргументе params тип отличный от массива
echo '10. В аргументе params тип отличный от массива (string) - Фатальная ошибка несоотвествия типов аргумента';

$q = 'INSERT INTO persons (lastname, age) VALUES (:ln, :age)';
$ps = 'crazy test';

//var_dump( $db->execute($q, $ps) ); //фатал ошибка

?> <br> <?php


//В аргументе params тип отличный от массива
echo '11. В аргументе params тип отличный от массива (int) - Фатальная ошибка несоотвествия типов аргумента';

$q = 'INSERT INTO persons (lastname, age) VALUES (:ln, :age)';
$ps = 42;

//var_dump( $db->execute($q, $ps) ); //фатал ошибка

?> <br> <?php


//В аргументе params тип отличный от массива
echo '12. В аргументе params - []';

$q = 'INSERT INTO persons (lastname, age) VALUES (:ln, :age)';
$ps = [];

var_dump( $db->execute($q, $ps) ); //false, предупреждение - отсутствие аргументов

?> <br> <?php






