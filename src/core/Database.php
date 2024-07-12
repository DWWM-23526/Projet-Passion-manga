<?php

namespace core;

use PDO;
use PDOException;

class Database
{
    private static Database | null $instance = null;
    private PDO $connexion;
    private mixed $statement;


    private function __construct(array $config)
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

        if (!$result) {
            // HTTPResponse::abort(404);
        }

        HTTPResponse::setStatusCode(200);
        return $result;
    }

    public function fetchAll()
    {
        $result = $this->statement->fetchAll();

        if (!$result) {
            HTTPResponse::abort(404);
        }

        HTTPResponse::setStatusCode(200);
        return $result;
    }


    public static function getInstance(array $config)
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function query(string $query, array $params = [])
    {
        $this->statement = $this->connexion->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    private function connexion(string $dsn, string $user, string $pass, array $option)
    {

        try {
            $pdo = new PDO($dsn, $user, $pass, $option);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }
}
