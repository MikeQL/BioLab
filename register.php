<?php require_once 'includes/header.inc.php' ?>
<?php require_once 'includes/redirect_to_dashboard.inc.php' ?>

<div class="wrapper">
    <div class="container">
        <a class="back-btn" href="index.php">Ir a Incio</a>
        <h1>Registro</h1>

        <!-- Caso1: Exito al registrarse -->
        <?php if (isset($_SESSION['status_success'])): ?>
            <div class="alert alert-success">
                <?=$_SESSION['status_success']?>
            </div>
        <?php endif;?>

        <!-- Caso2: Error al registrarse -->
        <?php if (isset($_SESSION['status_error'])): ?>
            <div class="alert alert-error">
                <?=$_SESSION['status_error']?>
            </div>
        <?php endif;?>


        <form action="actions/register_user.php" method="POST">  <!-- Archivo donde se va a enviar el formulario con la información -->
            
            <!-- Nombre -->
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'first_name') : ''; ?>

            <!-- Apellido -->
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'last_name') : ''; ?>

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>

            <!-- Contraseña -->
            <label for="password">Contraseña</label>
            <input name="password" type="password" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : ''; ?>

            <!-- Botón enviar -->
            <input type="submit" name="submit" value="Registrarse">
        </form>
        <?php clearErrors(); ?>
    </div>
</div>

<?php require_once 'includes/footer.inc.php' ?>