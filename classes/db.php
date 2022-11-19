<?php

class Database
{
    static $instance = null;
    private  $connection;

    private function __construct()
    {
        try {
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'frutika';
            $this->connection = new \mysqli($host, $username, $password, $database);
        } catch (\Throwable $e) {
            die("Lỗi: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new Database();
        }

        return static::$instance;
    }

    public static function getConnection()
    {
        return static::getInstance()->connection;
    }

    public static function closeConnect()
    {
        if (static::$instance != null) {
            static::$instance->connection->close();
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function getNumRow($sql)
    {
        $result = $this->connection->query($sql);
        return $result->num_rows;
    }
}
