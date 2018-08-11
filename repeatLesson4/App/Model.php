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
        return $db->query($sql, [], static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id], static::class);
        if (empty($res)) {
            return null;
        } else {
            return $res[0];
        }
        //СПОСОБ ПРОЩЕ - С ТЕРНАРНЫМ ОПЕРАТОРОМ (а может и нельзя его тут применить)
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

        $sql = '
INSERT INTO ' . static::$table . ' 
(' . implode(', ', $cols) . ') 
VALUES (' . implode(', ', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();

    }


}