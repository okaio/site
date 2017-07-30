<?php

namespace App;

class Db {

    const HOST = 'mysql:host=localhost;dbname=test;charset=UTF8;';
    const NAME = 'root';
    const PASS = '1613';
    protected $dbh;


    public function __construct () {
        $this->dbh = new \PDO(self::HOST, self::NAME, self::PASS);
    }

    public function execute ($sql) {
        $sth=$this->dbh->prepare($sql);
        $res=$sth->execute();
        return $res;
    }
    public function query ($sql, $class) {
        $sth=$this->dbh->prepare($sql);
        $res=$sth->execute();
        if(false!== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
