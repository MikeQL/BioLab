<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/redirect_to_home.inc.php'; ?>


<div class="dash-container">
    <?php if ($_SESSION['user']): ?>
        <h2>Hola, <?= $_SESSION['user']['first_name'] ?></h2>
        <a href="actions/logout.php" class="boton boton-rojo">Cerrar sesión</a>
    <?php endif; ?>
</div>