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
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE; // подстановка внешних данных

        $ret = $db->query($sql, static::class);

        if ( null !== $ret) {

            return $ret;
        }

        return false;
    }


    public static function findById(string $id)
    {

        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $ps = [
            ':id' => $id
        ];

        $ar = $db->query($sql, static::class, $ps);

        if ( is_array($ar) ) {
            if ( isset( $ar[0] ) ) {

                return $ar[0];
            }
        }

        return false;
    }


}