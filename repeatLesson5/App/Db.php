<?php


namespace App;


class Db
{
    protected  $dbh;


    public function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
        } catch (\PDOException $ex) {
            throw new DbException('Ошибка соединения с базой данных');
        }
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

                return $sth->execute($params); //успех - true, иначе false
        }

        return false;
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}