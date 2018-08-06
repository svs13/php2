<?php
require __DIR__ . '/../autoload.php';

$articles = \App\Models\Article::findAll();

var_dump($articles);

$name = $articles[1]->author->name;

var_dump($name);

