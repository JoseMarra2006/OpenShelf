<?php
require_once __DIR__ . '/vendor/autoload.php';

$host = 'localhost'; 
$dbname = 'openshelf';
$username = 'root'; 
$password = ''; 

try {
    OpenShelf\Database::init($host, $dbname, $username, $password);
} catch (Exception $e) {
    die("Falha na inicialização do banco de dados: " . $e->getMessage());
}
?>