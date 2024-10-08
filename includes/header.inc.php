<?php require_once 'database/connection.php' ?>
<?php require_once 'helpers.php' ?>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laboratorio de Biotecnología UTN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- links para las fuentes de google  -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
     <!-- estilos -->
     <link rel="stylesheet" href="styles/styles.css">
     <link rel="stylesheet" href="styles/styleslabv.css">

</head>
<body>