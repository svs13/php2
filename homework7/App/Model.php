<?php

namespace App;

abstract class Model
{
    protected static $table = null;
    public $id;

    /**
     * @return \Generator
     * @throws \App\Exceptions\DbException
     */
    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;

        return (new Db())->queryEach($sql, [], static::class);
    }

    /**
     * @return static
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\E404Exception
     */
    public static function findById(string $id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $data = (new Db())->query($sql, [':id' => $id], static::class);

        if (empty($data)) {
            return false;
        }
        return $data[0];
    }

    /**
     * @return \Generator
     * @throws \App\Exceptions\DbException
     */
    public static function findLastRecords(int $count)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count;
        $data = (new Db())->queryEach($sql, static::class);

        return $data;
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    /**
     * @throws \App\Exceptions\DbException
     */
    public function delete()
    {
        if (!$this->isNew()) {
            $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
            (new Db())->execute($sql, [':id'=>$this->id]);
        }
    }

    public function isNew()
    {
        return null === $this->id;
    }

    /**
     * @throws \App\Exceptions\DbException
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
        (new Db())->execute($sql, $data);
    }

    /**
     * @throws \App\Exceptions\DbException
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
    public function fill(array $data)
    {
        $this->validate($data); //если не валидно - throws MultiExceptions

        foreach ($data as $index => $value) {
            $this->$index = $value;
        }
    }

    abstract protected function validate(array $data);
}

