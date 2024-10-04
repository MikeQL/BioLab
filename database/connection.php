<!-- Archivo que ayuda a la conexión con la base de datos -->

<?php

$user = 'root';
$password = '';
$host = 'localhost';
$dbName = 'php_auth';

$db = null;
try {
    $db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
} catch (PDOException $e) {
    echo "Haz cometido un error Mike no se puede conectar a la base de datos: ". $e->getMessage();
    die();
}

