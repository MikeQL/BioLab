<?php

if (isset($_POST['submit'])) {

    require_once '../database/connection.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    $stmt = $db->prepare("SELECT * FROM users where email = :email LIMIT 1");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $isVerified = password_verify($password, $user['password']);
        if ($isVerified) {
            $_SESSION['user'] = $user;
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['status_error'] = "Incorrect Credentials";
        }
    } else {
        $_SESSION['status_error'] = "Incorrect Credentials";
    }
}

header("Location: ../login.php");