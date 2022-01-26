<?php
namespace Connect;

class Db
{
    public $host = '127.0.0.1';
    public $port = '5432';
    public $dbname = 'test';
    public $user = 'postgres';
    public $password = '1547';

    public function connect(){
        $connect_data = "host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password";
        return pg_connect($connect_data);
    }


}



