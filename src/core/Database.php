<?php

namespace core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connexion;
    private $statement;
 

    private function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['db']};charset={$config['charset']}";

        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $this->connexion = $this->connexion($dsn, $config['user'], $config['pass'], $option);

    }

    private function fetch() 
    {
        return $this->statement->fetch();
    }

    public function fetchOrFail()
    {
        $result = $this->fetch();

        if (!$result) 
        {
            // abort
        }
        return $result;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }


    public static function getInstance($config)
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function query( $query, $params = []) {
        $this->statement = $this->connexion->prepare($query);
        $this->statement->execute($params);
        return $this;

    }


    private function connexion($dsn, $user, $pass, $option)
    {

        try {
            $pdo = new PDO($dsn, $user, $pass, $option);

        } catch (PDOException $e)  {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }


}
