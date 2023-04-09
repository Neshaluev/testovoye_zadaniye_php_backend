<?php

namespace app;

use PDO;

class Database{
    
    public \PDO $pdo;

    static public Database $instance;

    public function __construct(){
        $dbDsn = 'testovoye_zadaniye_php_backend';
        $username = 'root';
        $password = '';

        try {
            $this->pdo = new PDO("mysql:server=localhost;dbname={$dbDsn}", $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance = $this;
            echo "db connect.";
        } catch (\PDOException $exception) {
            echo "ERROR: " . $exception->getMessage();
        }
        
    }

    public function prepare($sql){
        return $this->pdo->prepare($sql);
    }

}

return new Database();