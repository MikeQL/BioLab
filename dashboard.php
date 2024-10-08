<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/redirect_to_home.inc.php'; ?>


<div class="dash-container">
    <!-- Si existe la sesión de usuario -->
    <?php if ($_SESSION['user']): ?>  
        
        <!-- Aquí empieza la programación de la pagina web para reservar equipos y materiales -->

        <nav class="navbar">
            <!-- Imagen que activa el menú desplegable -->
            <img src="./img/menu-icono.png" alt="menu" class="menu-trigger">

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
                <li><a href="./labv-e.php">Equipos</a></li>
                <li><a href="/">Materiales</a></li>
                <li><a href="/">Insumos</a></li>
            </ul>

            <ul class="menu-lab2">
                <li><a href="/">Equipos</a></li>
                <li><a href="/">Materiales</a></li>
                <li><a href="/">Insumos</a></li>
            </ul>

            <div class="navbar-iz">
                <img src="https://biotecnologia.utn.edu.ec/wp-content/uploads/2019/01/cropped-biotecnologia.png" alt="logo" class="logo">

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

        <h2 style="padding-left: 1%; margin:12px 0 0 0;">Hola, <?= $_SESSION['user']['first_name'] ?></h2>

        <div class="introduction">
            <p class="int-txt">
            Bienvenido a la plataforma virtual del laboratorio de la carrera de Ingeniería en Biotecnología de la Universidad Técnica del Norte. <br>

            Nos complace darles la bienvenida a esta plataforma diseñada específicamente para apoyar su formación académica y profesional. El propósito de esta página es proporcionarles una herramienta eficiente para llevar un mejor control y gestión del uso de los equipos, materiales e insumos del laboratorio. Sabemos que la correcta utilización y seguimiento de estos recursos es fundamental para garantizar la calidad de sus prácticas, así como la seguridad de todos los usuarios.

            A través de esta plataforma, podrán consultar en tiempo real la disponibilidad de los recursos del laboratorio y registrar sus actividades y solicitudes. Además, se crea un historial detallado del uso de cada equipo y material, facilitando así el monitoreo y control. Este registro también será de gran utilidad en caso de que ocurra algún inconveniente o se necesite revisar información pasada, permitiendo un seguimiento transparente y eficiente.

            Esperamos que este sistema contribuya a un entorno de aprendizaje más organizado y seguro, ayudándoles a optimizar sus proyectos y a desarrollar una cultura de responsabilidad y profesionalismo en el uso de los recursos de laboratorio.

            ¡Les deseamos muchos éxitos en sus prácticas y experimentos!
            </p>

        </div>

        <div class="carrera">
            <p>Nuestros Laboratorios</p>
        </div>

        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <img src="https://biotecnologia.utn.edu.ec/wp-content/uploads/2016/07/Area-cultivo-in-vitro-327x270.jpg" alt="Laboratorio Biotecnología Vegetal">
                <h2>Laboratorio de Biotecnología Vegetal</h2>
                <p>El laboratorio de Biotecnología Vegetal desarrolla proyectos de Investigación orientados tanto a la introducción de especies vegetales promisorias, como la expresión de metabolitos secundarios con potencial comercial en áreas de la salud, el ambiente y la nutrición.
                   El laboratorio también desarrolla investigaciones al descubrimiento, caracterización integral y aprovechamiento de organismos fotosintéticos como las microalgas.
                   El laboratorio cuenta con áreas de Biologia Molecular, Cultivo in vitro de Tejidos Vegetales, Área de climatización, Área de microscopia y preparación de corte de tejidos, Áreas comunes de siembra, esterilización y docencia.</p>
            </div>
            
            <!-- Card 2 -->
            <div class="card">
                <img src="https://biotecnologia.utn.edu.ec/wp-content/uploads/2016/07/Area-de-docencia-1-360x270.jpg" alt="Laboratorio Biotecnología Aplicada">
                <h2>Laboratorio Biotecnología Aplicada</h2>
                <p>Es un laboratorio nuevo que desarrolla investigaciones orientadas con la búsqueda del potencial biotecnológico de microorganismos o sus componentes.
                    El laboratorio también se enfoca en el estudio de bioactividades a diferentes escalas a partir de extractos vegetales de plantas promisorias.
                    El laboratorio cuenta con áreas de bioprocesos, cultivo celular, biología molecular, cepario de microorganismos, esterilización y docencia.</p>
            </div>
        </div>
        
        <!-- Aquí termina el código html para la página de inicio de sesión. -->

           


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