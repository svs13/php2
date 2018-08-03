<?php

require  __DIR__ . '/../autoload.php';

$cfg1 = \App\Config::instance();

$cfg2 =\App\Config::instance();

$cfg1->data = 'Hello';

$cfg2->data = 'world';

echo $cfg1->data . ' ' . $cfg2->data; // world world