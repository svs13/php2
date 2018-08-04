<?php

require  __DIR__ . '/autoload.php';

//$data = \App\Models\Person::findAll();
$data = \App\Models\Person::findAll();

var_dump($data);


/*
$obj = new \App\Models\Person();
var_dump($obj);

//object(App\Models\Person)[11]
//  public 'id' => null
//  public 'lastname' => null
//  public 'age' => null

//Статические методы в объекте
echo '====1====';
var_dump( $obj::findAll() ); //работает. показывает всю таблицу
//Статические методы в объекте
echo '====2====';
var_dump( $obj->findAll() ); //работает. показывает всю таблицу
//Статические св-ва в объекте
//var_dump( $obj->table ); //ошибка. $table non static
echo '====3====';
var_dump( $obj::$table ); //работает
*/







/*

$dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');

$sth = $dbh->prepare('');

$sth->execute();

var_dump( $sth->fetchAll() );

fetchAll() ВСЕГДА ВОЗВРАЩАЕТ МАССИВ . в данном случае вернёт [];
*/