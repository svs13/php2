<?php

namespace App;


abstract class Model
{

    protected const TABLE = null; //неизменно, должно быть переопределено наследником

    protected $id;


    public function getId()
    {
        return $this->id;
    }


    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::TABLE; // подстановка внешних данных

        $ret = ( new Db() )->query($sql, static::class);

        if ( null !== $ret) {

            return $ret;
        }

        return false;
    }


    public static function findById(string $id)
    {

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';

        $data = ( new Db() )->query($sql, static::class, [':id' => $id]);

        if ( is_array($data) ) {
            if ( isset( $data[0] ) ) {

                return $data[0];
            }
        }

        return false;
    }


    public static function findLastRecords(int $count)
    {
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $count;

        $data = ( new Db() )->query($sql, static::class);

        if ( is_array($data) ) {

            return $data;
        }

        return false;
    }

}