<?php
require "message_log.php";

$host = 'localhost';
$dbname = 'todo_app';
$user = 'root';
$password = 'admin03';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    logDebug("DB: Conexión exitosa");
    
} catch (PDOException $e) {
    logError($e->getMessage());
    die("Error de conexión: ". $e->getMessage());
}