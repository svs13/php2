<?php

namespace App\Models;

use App\Model;

/**
 * @property Author|null $author
 */
class Article extends Model
{
    protected static $table = 'news';

    public $content;
    protected $author_id; //имя задано в ДЗ


    public function __get($name)
    {
        if ( 'author' === $name ) {
            if ( null !== $this->author_id ) {

                $author = Author::findById($this->author_id);

                if ( is_object($author) ) {

                    return $author;
                }
            }
        }

    }


    public function __isset($name)
    {
        if ('author' === $name) {

            return null !== $this->author_id;
        }

    }

}