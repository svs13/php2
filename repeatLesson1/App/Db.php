<?php


namespace App;


use App\Models\Person;

class Db
{

    protected  $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
    }

    public function query($sql, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);


/*
        $data = $sth->fetchAll();

        $ret = [];
        foreach ($data as $row) {
            $ret[] = new $class($row);
        }
        return $ret;
*/

    }

}