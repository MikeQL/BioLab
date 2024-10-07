<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/redirect_to_home.inc.php'; ?>


<div class="dash-container">
    <!-- Si existe la sesión de usuario -->
    <?php if ($_SESSION['user']): ?>  
        
        <!-- Aquí empieza la programación de la pagina web para reservar equipos y materiales -->

        <nav class="navbar">
            <img src="./img/menu-icono.png" alt="menu" class="menu">

            <div class="navbar-iz">
                <img src="https://biotecnologia.utn.edu.ec/wp-content/uploads/2019/01/cropped-biotecnologia.png" alt="logo" class="logo">

                <ul>
                    <li>
                        <a href="/">Equipos</a>
                    </li>

                    <li>
                        <a href="/">Materiales</a>
                    </li>

                    <li>
                        <a href="/">Algo más</a>
                    </li>
                </ul>
            </div>


            <div class="navbar-der">
                <ul>
                    <li class="nav-correo"><?= $_SESSION['user']['email'] ?></li>
                    <li class="navbar-carrito">
                        <a href="/">Mis reservaciones</a>
                    </li>
                </ul>
            </div>
            
        </nav>

        <h2>Hola, <?= $_SESSION['user']['first_name'] ?></h2>

        <a href="actions/logout.php" class="boton boton-rojo">Cerrar sesión</a>
        <!-- Aquí termina el código html para la página de inicio de sesión. -->

           
    <?php endif; ?>
</div>