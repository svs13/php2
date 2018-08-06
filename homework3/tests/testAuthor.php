<?php
require __DIR__ . '/../autoload.php';

$authors = \App\Models\Author::findAll();

var_dump($authors);

