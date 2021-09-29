<?php

namespace Core;
use Core\Singleton;

class DBAdapter extends Singleton{

    protected $connect = null;
    protected $user = "root";
    protected $pwd = "root";
    protected $host = "db";
    protected $dbname = "myapp";

    protected function __construct(){

        $this->connect = mysqli_connect($this->host,
        $this->user,
        $this->pwd,
        $this->dbname);
        
    }
  
    function execSQL($query){
        $connect = $this->getConnect();
        $result = mysqli_query($connect,$query);
        return $result;
    }

    function getConnect (){
        return $this->connect;
    }

    



}







?>