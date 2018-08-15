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

    /**
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
    public function __get($name)
    {
        if ( 'author' === $name ) {
            if ( null !== $this->author_id ) {

                return Author::findById($this->author_id);
            }
        }

    }


    public function __isset($name)
    {
        if ('author' === $name) {

            return null !== $this->author_id;
        }

    }


    public function fill(array $data)
    {
        $this->validate($data); //если не валидно - throws MultiExceptions

        $this->content = $data['content'];
    }


    protected function validate(array $data)
    {
        $errors = new \App\Exceptions\Validation();

        if ( !isset( $data['content'] ) ) {

            $errors->add( new \Exception('Отсутствует содержимое статьи') );

        } elseif ( !is_string($data['content']) ) {

            $errors->add( new \Exception('Статья не содержит текста') );

        } else {

            $value = $data['content'];

            if ( strlen($value) < 20 ) {
                $errors->add( new \Exception('Содержимое статьи слишком мало') );
            }

            if ( strlen($value) > 10000 ) {
                $errors->add( new \Exception('Содержимое статьи слишком велико') );
            }

            if ( false !== strpos($value, ',,') ) {
                $errors->add( new \Exception('Статья содержит ",,"') );
            }

            if ( false !== strpos($value, '??') ) {
                $errors->add( new \Exception('Статья содержит "??"') );
            }
        }

        if ( !$errors->empty() ) {
            throw $errors;
        }
    }

}