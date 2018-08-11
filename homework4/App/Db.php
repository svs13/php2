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

        $this->dbh = new \PDO( $dsn, $data['login'], $data['password'] );
    }


    public function query(string $sql, array $params = [], string $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($sql);

        if ( false !== $sth ) {
            if ( $sth->execute($params) ) {

                return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            }
        }

    }


    public function execute(string $query, array $params = [])
    {
        $sth = $this->dbh->prepare($query);

        if ( false !== $sth ) {

            return $sth->execute($params); //успех - true, иначе - false
        }

        return false;
    }


    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}