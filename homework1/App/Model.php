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
        $params = [
            ':id' => $id
        ];

        $data = $db->query($sql, static::class, $params);

        if ( is_array($data) ) {
            if ( isset( $data[0] ) ) {

                return $data[0];
            }
        }

        return false;
    }


}