<!-- Este script te lleva a la pagina dashboard cuando ya iniciaste sesión -->

<?php
if (!isset($_SESSION)) {
    session_start();
}

// En caso de que ya tengamos una sesión de usuario se redirige al dashboard
if (isset($_SESSION['user'])) {
    header("Location: ../dashboard.php");
}