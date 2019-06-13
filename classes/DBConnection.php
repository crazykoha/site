<?php
namespace classes;

class DBConnection
{
    /**
     * @return \mysqli
     */
    public static function getDBConnection(){
        $db_config = require 'DBConfig.php';
        $mysqli = new \mysqli($db_config['host'], $db_config['username'], $db_config['password'], $db_config['db_name']);
        if ($mysqli->connect_errno) {
            echo "Ошибка: Не удалось создать соединение с базой MySQL";
            exit;
        }
        return $mysqli;
    }
}