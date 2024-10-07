<?php

session_start();

//Si es que hay una sesión de usuario la cierra 
if (isset($_SESSION['user'])) {
    session_destroy();
}

//Envía al inicio
header("Location: ../index.php");