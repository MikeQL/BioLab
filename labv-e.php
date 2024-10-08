<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/redirect_to_home.inc.php'; ?>

<div class="labv-e-container">
    <!-- Si existe la sesión de usuario -->
    <?php if ($_SESSION['user']): ?> 

        <!-- Aquí empieza la programación de la pag de lab Vegetal -->

        <nav class="navbar">
            <!-- Imagen que activa el menú desplegable -->
            <img  src="./img/menu-icono.png" alt="menu" class="menu-trigger">

            <!-- Menú desplegable -->
            <ul class="menu-desplegable">
                <h3>Lab 1</h3>
                <li><a href="./labv-e.php">Equipos</a></li>
                <li><a href="/">Materiales</a></li>
                <li><a href="/">Insumos</a></li>
                <h3>Lab 2</h3>
                <li><a href="/">Equipos</a></li>
                <li><a href="/">Materiales</a></li>
                <li><a href="/">Insumos</a></li>
                <h3>Usuario</h3>
                <li><a href="/">Mis reservaciones</a></li>
            </ul>

            <ul class="menu-lab1">
                <li><a href="labv-e.php">Equipos</a></li>
                <li><a href="/">Materiales</a></li>
                <li><a href="/">Insumos</a></li>
            </ul>

            <ul class="menu-lab2">
                <li><a href="/">Equipos</a></li>
                <li><a href="/">Materiales</a></li>
                <li><a href="/">Insumos</a></li>
            </ul>

            <div class="navbar-iz">
                <a href="dashboard.php" id="logo-container">
                    <img  src="https://biotecnologia.utn.edu.ec/wp-content/uploads/2019/01/cropped-biotecnologia.png" alt="logo" class="logo">
                </a>

                <ul class="menu-navbar">
                    <!-- Lab 1 -->
                    <li><a href="" class="lab1-trigger">Lab. Vegetal</a></li>
                    <li><a href="" class="lab2-trigger">Lab. Aplicada</a></li>
                    <li><a href="">Mis reservaciones</a></li>
                </ul>
            </div>


            <div class="navbar-der">
                <ul>
                    <li class="nav-correo"><?= $_SESSION['user']['email'] ?></li>
                    <li class="navbar-carrito">
                        <a href="actions/logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            
        </nav>







         <!-- Aquí van los javascript para las funcionalidades de la pagina -->
        <!-- MENÚ DESPLEGABLE DE LA IMAGEN "MENU-TRIGGER" -->
        <script>
            // Seleccionar la imagen y el menú desplegable
            const trigger = document.querySelector('.menu-trigger');
            const menu = document.querySelector('.menu-desplegable');

            // Alternar el menú al hacer clic en la imagen
            trigger.addEventListener('click', () => {
                event.stopPropagation();
                menu.classList.toggle('active'); // Cambia la clase 'active' para mostrar u ocultar el menú
            });

            // Opción adicional para cerrar el menú si haces clic fuera de él
            document.addEventListener('click', (event) => {
                if (!trigger.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.remove('active'); // Oculta el menú si haces clic fuera
                }
            });
        </script>







            <!-- java para el menú desplegable -->
        <script>
            //LAB 1 SUBMENU
            const lab1trigger = document.querySelector('.lab1-trigger');
            const lab1menu = document.querySelector('.menu-lab1');

            // Alternar el menú al hacer clic en el enlace
            lab1trigger.addEventListener('click', () => {
                event.preventDefault(); // Esto previene que el enlace recargue la página
                //event.stopPropagation(); // Esto previene que el clic se propague al documento
                
                // Obtener la posición del enlace "Lab 1"
                const triggerRect = lab1trigger.getBoundingClientRect();

                // Ajustar la posición del submenú basado en la posición del enlace
                lab1menu.style.top = `${triggerRect.bottom + window.scrollY}px`;  // Justo debajo del enlace
                lab1menu.style.left = `${triggerRect.left}px`;  // Alinear con el borde izquierdo del enlace

                
                lab1menu.classList.toggle('active'); // Cambia la clase 'active' para mostrar u ocultar el menú
                //console.log('Submenú LAB 1 activado'); // Aquí agregas el console.log
            });
            // Opción adicional para cerrar el menú si haces clic fuera de él
            document.addEventListener('click', (event) => {
                if (!lab1trigger.contains(event.target) && !lab1menu.contains(event.target)) {
                    lab1menu.classList.remove('active'); // Oculta el menú si haces clic fuera
                }
            });



            // LAB 2 SUBMENU
            const lab2trigger = document.querySelector('.lab2-trigger');
            const lab2menu = document.querySelector('.menu-lab2');

            // Alternar el menú al hacer clic en la opción Lab 2
            lab2trigger.addEventListener('click', (event) => {
                event.preventDefault(); // Esto previene que el enlace recargue la página
                
                // Obtener la posición del enlace "Lab 1"
                const triggerRect1 = lab2trigger.getBoundingClientRect();

                // Ajustar la posición del submenú basado en la posición del enlace
                lab2menu.style.top = `${triggerRect1.bottom + window.scrollY}px`;  // Justo debajo del enlace
                lab2menu.style.left = `${triggerRect1.left}px`;  // Alinear con el borde izquierdo del enlace
                
                //event.stopPropagation(); // Esto previene que el clic se propague al documento
                lab2menu.classList.toggle('active'); // Cambia la clase 'active' para mostrar u ocultar el menú
            });
            // Opción adicional para cerrar el menú si haces clic fuera de él
            document.addEventListener('click', (event) => {
                if (!lab2trigger.contains(event.target) && !lab2menu.contains(event.target)) {
                    lab2menu.classList.remove('active'); // Oculta el menú si haces clic fuera
                }
            });
        </script>


    <?php endif; ?> 

</div>






<?php require_once 'includes/footer.inc.php' ?>