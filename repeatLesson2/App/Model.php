<?php

namespace App;


abstract class Model
{

    protected static $table = null;

    public $id;

    abstract public function getModelName();

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, static::class);
    }

    public function isNew()
    {
        return null === $this->id;
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return false;
        }

        $properties = get_object_vars($this);

        var_dump($properties);

        $cols = [];
        $binds = [];
        $data = [];
        foreach ($properties as $name => $value) {
            if ('id' === $name) {
                continue; //оператор перехода к след. шагу.
            }
            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        var_dump($cols);

        $sql = '
INSERT INTO ' . static::$table . ' 
(' . implode(', ', $cols) . ') 
VALUE (' . implode(', ', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();

    }


}