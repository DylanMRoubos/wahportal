<?php
class wah_db  {
    public $connectie = null  ;

    private function __construct() {
        $config = json_decode(file_get_contents("conf/db.json"));

        $host = $config->waingoengahorde->host;
        $user = $config->waingoengahorde->user;
        $pass = $config->waingoengahorde->pass;
        $dbName = $config->waingoengahorde->dbname;

        $this->connectie =  mysqli_connect ( $host, $user , $pass , $dbName);

        if (mysqli_connect_errno()) {
            echo "Error: Unable to connect to the database." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        return $this;   

    }

    public static function connect (){
        return new wah_db();
    }

    function __destruct(){
        mysqli_close($this->connectie);
    }
}

