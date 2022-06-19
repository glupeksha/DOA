<?php

namespace App;

use Exception;
use mysqli;

class Database
{
    protected static $connection;

    /**
     * Method to return the Database instance
     *
     * @return \Database
     */
    static public function getConnection()
    {

        if (!self::$connection || !self::$connection->ping()) {
            Log::debug("There is no existing connections, trying to connect...",['file'=>__FILE__,'method' => __METHOD__]);
            self::connect();
        }

        return self::$connection;
    }

    protected static function connect()
    {
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $pass = DB_PASS;
            $db = DB_NAME;
            $port = DB_PORT;
            $connection = new mysqli($host, $user, $pass, $db);
            if ($connection->connect_errno) {
                throw new Exception($connection->connect_error);
            }

            self::$connection = $connection;
            Log::debug("Connected to the database successfully",['file'=>__FILE__,'method' => __METHOD__]);
        } catch (Exception $e) {
            Log::error("Database connection failed: " . $e,['file'=>__FILE__,'method' => __METHOD__]);
            require_once APP_ROOT . '/views/errors/500.php';
        }
    }


    protected static function close()
    {
        try {
            if (self::$connection) {
                self::$connection->close();
            }
        } catch (Exception $e) {
            Log::error("Database disconnection error" . $e,['file'=>__FILE__,'method' => __METHOD__]);
            require_once APP_ROOT . '/views/errors/500.php';
        }
    }

    public static function prepared_query($sql, $params, $types = "")
    {
        try {
            Log::debug("Preparing query: ".$sql." with values: ".json_encode($params),['file'=>__FILE__,'method' => __METHOD__]);
            $types = $types ?: str_repeat("s", count($params));
            $stmt = self::getConnection()->prepare($sql);
            if($types!=""){
                $stmt->bind_param($types, ...$params);
            }
            $stmt->execute();
            Log::debug("Database operation executed: ".serialize($stmt),['file'=>__FILE__,'method' => __METHOD__]);
            return $stmt;
        } catch (Exception $e) {
            Log::error("Database disconnection error" . $e,['file'=>__FILE__,'method' => __METHOD__]);
            require_once APP_ROOT . '/views/errors/500.php';
        }
    }
    public static function prepared_select($sql, $params = [], $types = "")
    {
        try {
            return self::prepared_query($sql, $params, $types)->get_result();
        } catch (Exception $e) {
            Log::error("Database disconnection error" . $e,['file'=>__FILE__,'method' => __METHOD__]);
            require_once APP_ROOT . '/views/errors/500.php';
        }
    }
}
