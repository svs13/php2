<?php
require __DIR__ . '/autoload.php';

/*
//основной API
$loader = new Twig_Loader_Array(array(
    'index' => 'Hello {{ name }}!',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index', array('name' => 'Fabien'));
*/



//загрузчик для поиска шаблонов
$pathTemplates = __DIR__ . '/testTwig/Templates';
$pathCache = __DIR__ . '/testTwig/Cache';

$loader = new Twig_Loader_Filesystem($pathTemplates);
$twig = new Twig_Environment($loader, [
    //'cache' => $pathCache,
]);

echo $twig->render('index.php', array('name' => 'Fabien'));
