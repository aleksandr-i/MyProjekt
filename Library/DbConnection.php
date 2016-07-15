<?php

// Singleton

class DbConnection
{
    private static $instance = null;

    /**
     * @var PDO
     */
    private $pdo;

    private function __construct()
    {
        $this->pdo = New PDO('mysql: host=localhost; dbname=myproject_db', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = New DbConnection;
        }

        return self::$instance;
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }
    
    
}