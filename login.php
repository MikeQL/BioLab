<?php require_once 'includes/header.inc.php' ?>
<?php require_once 'includes/redirect_to_dashboard.inc.php' ?>

<div class="wrapper">
    <div class="container">

        <!-- Ir a Inicio -->
        <a class="back-btn" href="index.php">Ir a Inicio</a>
        <h1>Inicia Sesión</h1>

        <!-- Por si hay errores -->
        <?php if (isset($_SESSION['status_error'])): ?>
            <div class="alert alert-error">
                <?=$_SESSION['status_error']?>
            </div>
        <?php endif;?>

        <!-- Formulario con la acción de login para que ingrese el usuario -->
        <form action="actions/login_user.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>

            <label for="password">Contraseña</label>
            <input name="password" type="password" />
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Login">
        </form>

        <!-- Siempre importante limpiar los errores -->
        <?php clearErrors(); ?>
    </div>
</div>

<?php require_once 'includes/footer.inc.php' ?>