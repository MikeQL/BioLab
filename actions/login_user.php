<?php

// Comprobando que la petición venga de submit
if (isset($_POST['submit'])) {

    // Conexión con la database
    require_once '../database/connection.php';

    // Iniciar la sesión por si ya no lo está
    if (!isset($_SESSION)) {
        session_start();
    }

     // Ingresamos los valores que el usuario escribió dentro de las variables correspondientes
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Mirar si existe un usuario con ese email
    $stmt = $db->prepare("SELECT * FROM users where email = :email LIMIT 1");

    // asocia la variable $email con el marcador de posición :email en la consulta SQL.
    $stmt->bindParam(":email", $email); 

    // envía la consulta preparada a la base de datos con los valores vinculados.
    $stmt->execute();

    // recupera una fila del conjunto de resultados devueltos por la base de datos.
    $user = $stmt->fetch(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC: Este modo de obtención hace que los resultados se devuelvan como un arreglo asociativo, donde las claves son los nombres de las columnas de la tabla.


    // En caso de que el usuario si exista 
    if ($user) {
        //verificamos si los hash(como especie de encriptación) coinciden para saber que la contraseña es correcta
        $isVerified = password_verify($password, $user['password']); //si es correcto devuelve true

        //Si las contraseñas coinciden
        if ($isVerified) {
            $_SESSION['user'] = $user; //Crea una nueva sesión para el usuario
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['status_error'] = "Credenciales incorrectas";
        }
    } else {
        $_SESSION['status_error'] = "Credenciales incorrectas";
    }
}

header("Location: ../login.php");