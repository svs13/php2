<?php


namespace App\Models;


use App\Model;


class Article extends Model
{
    protected const TABLE = 'news'; //неизменно

    public $header;
    public $content;
    public $author;

}