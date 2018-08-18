<?php

namespace App;

abstract class Model
{

    protected static $table = null;

    public $id;

    /**
     * @return static[]|bool
     */
    public static function findAll()
    {

        $sql = 'SELECT * FROM ' . static::$table;

        $ret = ( new Db() )->query($sql, static::class);

        if ( null !== $ret) {

            return $ret;
        }

        return false;
    }

    /**
     * @return static|bool
     */
    public static function findById(string $id)
    {

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        $data = ( new Db() )->query($sql, static::class, [':id' => $id]);

        if ( is_array($data) ) {
            if ( isset( $data[0] ) ) {

                return $data[0];
            }
        }

        return false;
    }

    /**
     * @return static[]|bool
     */
    public static function findLastRecords(int $count)
    {

        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count;

        $data = ( new Db() )->query($sql, static::class);

        if ( is_array($data) ) {

            return $data;
        }

        return false;
    }


    public function save()
    {
        if ( $this->isNew() ) {

            $this->insert();

        } else {

            $this->update();

        }
    }


    public function delete()
    {
        if ( !$this->isNew() ) {

            $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

            ( new Db() )->execute($sql, [':id'=>$this->id]);
        }
    }


    public function isNew()
    {
        return null === $this->id;
    }


    protected function update()
    {
        $properties = get_object_vars($this);

        $sets = [];
        $data = [];
        foreach ($properties as $name => $value) {

            $data[':' . $name] = $value;

            if ('id' === $name) {
                continue;
            }

            $sets[] = $name . '=:' . $name;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $sets) . ' WHERE id=:id';

        ( new Db() )->execute($sql, $data);
    }


    protected function insert()
    {
        $properties = get_object_vars($this);

        $cols = [];
        $binds = [];
        $data = [];
        foreach ($properties as $name => $value) {

            if ('id' === $name) {
                continue;
            }

            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $binds) . ')';

        $db = new Db();

        if ( !$db->execute($sql, $data) ) {
            //ошибка
            return;
        }

        $this->id = $db->lastInsertId();
    }

}