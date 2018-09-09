<?php

namespace App;

/**
 * Class Db
 * @package App
 */
class Db
{
    protected $dbh;

    /**
     * Db constructor.
     * @throws Exceptions\DbException
     */
    public function __construct()
    {
        $config = Config::instance();

        $data = $config->data['db'];
        $dsn = 'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'];

        try {
            $this->dbh = new \PDO($dsn, $data['login'], $data['password']);
        } catch (\PDOException $exception) {
            throw new \App\Exceptions\DbException('Ошибка соединения с базой данных',42);
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string $class
     * @return array
     * @throws Exceptions\DbException
     */
    public function query(string $sql, array $params = [], string $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($sql);

        if (false === $sth) {
            throw new \App\Exceptions\DbException('Ошибка подготовки запроса базы данных');
        }

        if (!$sth->execute($params)) {
            throw new \App\Exceptions\DbException('Ошибка выполнения запроса базы данных');
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string $class
     * @return \Generator
     * @throws Exceptions\DbException
     */
    public function queryEach(string $sql, array $params = [], string $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($sql);

        if (false === $sth) {
            throw new \App\Exceptions\DbException('Ошибка подготовки запроса базы данных');
        }

        if (!$sth->execute($params)) {
            throw new \App\Exceptions\DbException('Ошибка выполнения запроса базы данных');
        }

        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);

        while (false !== ($obj = $sth->fetch())) { //fetch: false(при ошибке) или значение
            yield $obj;
        }
    }

    /**
     * @param string $query
     * @param array $params
     * @throws Exceptions\DbException
     */
    public function execute(string $query, array $params = [])
    {
        $sth = $this->dbh->prepare($query);

        if (false === $sth) {
            throw new \App\Exceptions\DbException('Ошибка подготовки запроса базы данных');
        }

        if (!$sth->execute($params)) {
            throw new \App\Exceptions\DbException('Ошибка выполнения запроса базы данных');
        }
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

