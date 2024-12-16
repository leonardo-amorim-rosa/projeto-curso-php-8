<?php

namespace sistema\Core;

use PDO;
use PDOException;

/**
 * DBConnection
 * Database connection class 
 * Using Singleton Pattern 
 * @author leoam
 */
class DBConnection
{

    private static $instance;

    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . ";port=" . DB_PORT . "",
                        DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]);
            } catch (PDOException $ex) {
                die("Connection error: {$ex->getMessage()}");
            }
        }

        return self::$instance;
    }

    // protect class to instantiate
    protected function __construct()
    {
        
    }

    // protect class to clone
    private function __clone(): void
    {
        
    }
}
