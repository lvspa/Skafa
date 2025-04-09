<?php
class Database {
    private static $conn;
    public static function connect() {
        if (self::$conn === null) {
            $config= require 'config.php';
            try {
                self::$conn = new PDO(
                    "mysql:host={$config['host']};dbname= {$config['dbname']} ;charset-utf8,"
                    ,$config['username'],
                    $config['password']

                );
                echo "Conected :D ";
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro de conexão: ' . $e->getMessage());
                echo "Error connecting :(";
            }
        }
        return self::$conn;
    }

    public  function disconnect() {
        self::$conn = null;
    }
}
require_once 'ConexaoBD.php';
$conectar=Database::connect();
$desconectar=Database::disconnect();