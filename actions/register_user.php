<?php
// si el boton fue pulsado
if (isset($_POST['submit'])) {

    // nos conectamos a la base de datos mediante el connection.php
    require_once '../database/connection.php'; 

    // iniciamos sesion
    if (!isset($_SESSION)) {
        session_start();
    }

    // Ingresamos los valores que el usuario escribió dentro de las variables correspondientes
    $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : null;
    $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Variable para errores
    $errors = [];


    // Comprobando cada error

    // En caso de que esté vacío o haya números     
    if (empty($first_name) || is_numeric($first_name) || preg_match("/[0-9]/", $first_name)) {
        $errors['first_name'] = "El nombre no es válido";
    }

    // En caso de que esté vacío o haya números
    if (empty($last_name) || is_numeric($first_name) || preg_match("/[0-9]/", $last_name)) {
        $errors['last_name'] = "El apellido no es válido";
    }

    // En caso de que esté vacío, no sea un email y no contenga @utn.edu.ec
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@utn.edu.ec') === false) {
        $errors['email'] = "Ingrese un correo institucional (ejemplo@utn.edu.ec)";
    }

    // En caso de que esté vacío
    if (empty($password)) {
        $errors['password'] = "Contraseña inválida";
    }

    // Si existen errores
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
    } else {
        // TODO: check if user already registered with same address

        // Busqueda SQL
        $stmtUserFound = $db->prepare("SELECT * FROM users where email = :email");
        $stmtUserFound->bindParam(":email", $email);
        $stmtUserFound->execute();

        // Recupera el resultado y lo almacena
        $userFound = $stmtUserFound->fetch(PDO::FETCH_ASSOC);

        //Si el correo ya pertenece a otro usuario salta este error y se redirige al regitro nuevamente
        if ($userFound) {
            $_SESSION['status_error'] = "Este correo ya ha sido registrado con otro usuario";
            header("Location: ../register.php");
            exit();
        }

        // Si llega aquí el email es nuevo entonces toca guardar el usuario, para la contraseña no usamos lo que ingresa el usuario si no que hacemos un hash para guardarlo, una especie de encriptación para que no se roben la info de las contraseñas
        $password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]); //creamos el hash

        $stmt = $db->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
       
        // Vincula esos valores a la variables 
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);

        $success = $stmt->execute();

        if ($success) $_SESSION['status_success'] = 'Usuario registrado correctamente :D';
        else $_SESSION['status_error'] = 'Ocurrió un error al registrar usuario, intente nuevamente D:';
    }
}

header("Location: ../register.php");
exit();