<?php

namespace App;

abstract class Model
{

    protected static $table = null;

    public $id;

    /**
     * @return static
     * @throws \App\Exceptions\Db
     */
    public static function findAll()
    {

        $sql = 'SELECT * FROM ' . static::$table;

        return ( new Db() )->query($sql, [], static::class);
    }

    /**
     * @return static
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
    public static function findById(string $id)
    {

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        $data = ( new Db() )->query($sql, [':id' => $id], static::class);

        if ( empty($data) ) {
            throw new \App\Exceptions\DbNotFoundRecord('Ошибка 404 - не найдена запись в базе данных');
        }

        return $data[0];
    }

    /**
     * @return static[]|bool
     * @throws \App\Exceptions\Db
     */
    public static function findLastRecords(int $count)
    {

        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count;

        $data = ( new Db() )->query($sql, static::class);

        return $data;
    }


    public function save()
    {
        if ( $this->isNew() ) {

            $this->insert();

        } else {

            $this->update();

        }
    }


    /**
     * @throws \App\Exceptions\Db
     */
    public function delete()
    {
        if ( !$this->isNew() ) {

            $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

            ( new Db() )->execute($sql, [':id'=>$this->id]);

            foreach ($this as $name => $value) { //очищаю св-ва объекта
                $this->$name = null;
            }
        }
    }


    public function isNew()
    {
        return null === $this->id;
    }


    /**
     * @throws \App\Exceptions\Db
     */
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


    /**
     * @throws \App\Exceptions\Db
     */
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
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    /**
     * @param array $data
     * @throws \App\Exceptions\Validation
     */
    abstract public function fill(array $data);
}