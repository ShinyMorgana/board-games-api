<?php
namespace App\Repositories;

use PDO;
use PDOException;

class Repository {

    protected $connection;

    public function __construct() {
        $host = 'c2dr1dq7r4d57i.cluster-czz5s0kz4scl.eu-west-1.rds.amazonaws.com';
        $port = '5432';
        $database = 'd1ibk4kjlqm11v';
        $username = 'u5oth74biskiq2';
        $password = 'p09878b58c4e53d31096e4e663f6a60b6bd5a73a32fbc41571f017ad6086b984a';
        

        $dsn = "pgsql:host=$host;port=$port;dbname=$database";
        
        try {
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }       
}
