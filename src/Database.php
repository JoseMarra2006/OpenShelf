<?php
namespace OpenShelf;

use PDO;
use PDOException;

class Database {
    
    private static $db = null;
    
    public static function init(string $host, string $dbname, string $username, string $password) {
        if (self::$db === null) {
            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                self::$db = new PDO($dsn, $username, $password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
    }

    public static function getConnection() {
        if (self::$db === null) {
            die("A conexão com o banco de dados não foi inicializada. Chame Database::init() primeiro.");
        }
        return self::$db;
    }
}
?>