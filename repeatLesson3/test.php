<?php

class Foo
{

}
$foo = new Foo();
$foo->bar = 42;
var_dump($foo->bar);



$a[0] = null;

//Проверка существования элемента массива
var_dump( isset($a[0]) );

$a=1;
$b=1;

// $a :? $b //(bool)$a
// $bool ? $a : $b

// $a ?? $b //isset($a)

if ( !empty($a) ) { $a; } else { $b; }

if ( true === $a ) { $a } else { $b }