<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::instance();

        $data = $config->data['db'];
        $dsn = 'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'];

        try {
            $this->dbh = new \PDO($dsn, $data['login'], $data['password']);
        } catch (\PDOException $exception) {
            throw new \App\Exceptions\Db('Ошибка соединения с базой данных',42);
        }
    }

    public function query(string $sql, array $params = [], string $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($sql);

        if (false === $sth) {
            throw new \App\Exceptions\Db('Ошибка подготовки запроса базы данных');
        }

        if (!$sth->execute($params)) {
            throw new \App\Exceptions\Db('Ошибка выполнения запроса базы данных');
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $query, array $params = [])
    {
        $sth = $this->dbh->prepare($query);

        if (false === $sth) {
            throw new \App\Exceptions\Db('Ошибка подготовки запроса базы данных');
        }

        if (!$sth->execute($params)) {
            throw new \App\Exceptions\Db('Ошибка выполнения запроса базы данных');
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

