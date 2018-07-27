<?php


namespace App\Models;


use App\Db;
use App\Model;


class Article extends Model
{
    protected const TABLE = 'news'; //неизменно

    protected $header;
    protected $content;
    protected $author;


    public static function findLast($count)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $count;

        $ar = $db->query($sql, static::class);

        if ( is_array($ar) ) {

            return $ar;
        }

        return false;
    }


    public function getHeader()
    {
        return $this->header;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function getAuthor()
    {
        return $this->author;
    }


}