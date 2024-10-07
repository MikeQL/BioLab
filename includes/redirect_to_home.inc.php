<!-- Este script te lleva a la pagina HOME cuando ya iniciaste sesión -->
<?php

if (!isset($_SESSION)) {
    session_start();
}


//En caso de que no haya una sesion de usuario
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
}