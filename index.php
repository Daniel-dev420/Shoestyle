<?php

// =========================================================
// CONEXIÓN A LA BASE DE DATOS
// =========================================================

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = (int)getenv('DB_PORT');

$conexion = new mysqli(
    $host,
    $user,
    $password,
    $database,
    $port
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");


// =========================================================
// GUARDAR RESEÑA
// =========================================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $conexion->real_escape_string(
        $_POST['nombre'] ?? ''
    );

    $comentario = $conexion->real_escape_string(
        $_POST['comentario'] ?? ''
    );

    $estrellas = (int)($_POST['estrellas'] ?? 5);

    if (
        !empty($nombre) &&
        !empty($comentario) &&
        $estrellas >= 1 &&
        $estrellas <= 5
    ) {

        $sqlInsert = "
            INSERT INTO resenas
            (nombre, comentario, estrellas)
            VALUES
            ('$nombre', '$comentario', '$estrellas')
        ";

        $conexion->query($sqlInsert);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>SHOESTYLE</title>

    <link
        rel="stylesheet"
        href="./CSS/INDEX7.CSS"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Matangi:wght@300..900&family=Michroma&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

</head>

<body>

<div id="contenedor">

<!-- =====================================================
     BANNER
===================================================== -->

<header class="banner-portada">

    <div class="video-container">

        <video
            autoplay
            muted
            loop
            playsinline
            class="video-fondo"
        >

            <source
                src="./Videos/BannerVideo.mp4"
                type="video/mp4"
            >

        </video>

        <div class="capa-oscura"></div>

    </div>


    <!-- =================================================
         HEADER / NAVEGACIÓN
    ================================================== -->

    <div class="top-bar">

        <h1 class="logo">
            <span class="logo-blanco">SHOE</span><span class="logo-rojo">STYLE</span>
        </h1>


        <nav class="navegacion" id="navegacion">

            <ul>

                <li>
                    <a href="./index.php">
                        INICIO
                    </a>
                </li>

                <li>
                    <a href="./paginas/nuestra empresa.html">
                        NUESTRA EMPRESA
                    </a>
                </li>

                <li>
                    <a href="./paginas/productos.php">
                        PRODUCTOS
                    </a>
                </li>

                <li>
                    <a href="./paginas/contactenos.html">
                        CONTACTENOS
                    </a>
                </li>

                <li>
                    <a href="./paginas/inicio de sesion.html">
                        INICIO DE SESIÓN
                    </a>
                </li>

                <li>
                    <a href="./paginas/servicios.html">
                        SERVICIOS
                    </a>
                </li>

                <li>
                    <a href="./paginas/galeria fotografica.html">
                        GALERÍA FOTOGRÁFICA
                    </a>
                </li>

                <li>
                    <a href="./paginas/registrarse.html">
                        REGISTRARSE
                    </a>
                </li>

            </ul>

        </nav>


        <!-- ICONOS ESCRITORIO -->

        <div class="top-icons">

            <a
                href="#"
                class="icon-link"
                aria-label="Carrito"
            >
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

            <a
                href="#"
                class="icon-link"
                aria-label="Visitas"
            >
                <i class="fa-regular fa-eye"></i>
            </a>

        </div>


        <!-- BOTÓN MÓVIL -->

        <button
            class="menu-movil"
            id="menuMovil"
            type="button"
            aria-label="Abrir menú"
            aria-expanded="false"
        >

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>


    <!-- =================================================
         CONTENIDO CENTRAL
    ================================================== -->

    <div class="contenido-centro">

        <h2 class="lema-principal">

            TU ESTILO EMPIEZA
            <br>

            <span class="texto-destacado">
                POR LOS PIES
            </span>

        </h2>


        <p class="subtitulo">

            Descubre la mejor colección de calzado urbano,
            deportivo y casual.
            <br>

            Diseñados para los que marcan tendencia.

        </p>


        <div class="botones-container">

            <a
                href="./paginas/productos.php"
                class="btn-rojo"
            >
                EXPLORAR COLECCIÓN
            </a>

            <a
                href="./paginas/galeria fotografica.html"
                class="btn-linea"
            >
                VER GALERÍA
            </a>

        </div>

    </div>


    <!-- SCROLL -->

    <div class="scroll-indicator">

        <div class="mouse">

            <div class="rueda"></div>

        </div>

    </div>

</header>


<!-- =====================================================
     MAIN
===================================================== -->

<main>

    <!-- =================================================
         BIENVENIDA
    ================================================== -->

    <section class="bienvenida">

        <h2>
            Bienvenido a Shoestyle
        </h2>

        <p>
            En SHOESTYLE te ofrecemos lo mejor en calzado
            para toda ocasión. Encuentra zapatillas, botas,
            tacones y más, con la mejor calidad y al mejor
            precio. Navega por nuestras secciones y encuentra
            tu estilo.
        </p>

    </section>


    <!-- =================================================
         MARCAS
    ================================================== -->

    <section class="seccion-marcas">

        <h2>
            Marcas que ofrecemos
        </h2>

        <article class="marcas">

            <img src="./imagenes/nike.png" alt="Nike">
            <img src="./imagenes/adidas.png" alt="Adidas">
            <img src="./imagenes/puma.png" alt="Puma">
            <img src="./imagenes/vans.png" alt="Vans">
            <img src="./imagenes/converse.png" alt="Converse">
            <img src="./imagenes/reebok.png" alt="Reebok">
            <img src="./imagenes/asics.png" alt="Asics">
            <img src="./imagenes/skechers.png" alt="Skechers">
            <img src="./imagenes/newbalance.png" alt="New Balance">
            <img src="./imagenes/underarmour.png" alt="Under Armour">
            <img src="./imagenes/hoka.png" alt="Hoka">
            <img src="./imagenes/merrel.png" alt="Merrell">
            <img src="./imagenes/brooks.png" alt="Brooks">
            <img src="./imagenes/jordan.png" alt="Jordan">

        </article>

    </section>


    <!-- =================================================
         OFERTAS
    ================================================== -->

    <section>

        <h2>
            Ofertas Especiales
        </h2>


        <article class="productos">

            <div class="producto">

                <img
                    src="./PHP/uploads/freshfoam.jpg"
                    alt="Zapatilla Urbana"
                >

                <h3>
                    Zapatilla Urbana
                </h3>

                <p>
                    <del>$120.000</del>
                    <strong>$95.000</strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./PHP/uploads/stan_smith.jpg"
                    alt="Zapatilla adidas blanca"
                >

                <h3>
                    Zapatilla adidas blanca
                </h3>

                <p>
                    <del>$135.000</del>
                    <strong>$110.000</strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./PHP/uploads/ADIDA FORUM.png"
                    alt="Adidas Forum"
                >

                <h3>
                    Adidas Forum
                </h3>

                <p>
                    <del>$150.000</del>
                    <strong>$120.000</strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/slide-azure3.jpg"
                    alt="Sandalia Azul"
                >

                <h3>
                    Sandalia Azul
                </h3>

                <p>
                    <del>$110.000</del>
                    <strong>$89.000</strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./PHP/uploads/chuck_rojo.jpg"
                    alt="Converse color rojo"
                >

                <h3>
                    Converse color rojo
                </h3>

                <p>
                    <del>$80.000</del>
                    <strong>$59.000</strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>

        </article>

    </section>


    <hr>


    <!-- =================================================
         CARRUSEL
    ================================================== -->

    <section>

        <h2>
            Catálogo de Zapatos
        </h2>

        <article
            class="carrusel"
            id="carrusel-zapatos"
        >

            <button
                class="flecha izq"
                type="button"
                onclick="moverCarrusel('zapatos', -1)"
            >
                &#10094;
            </button>

            <img
                id="zapato-imagen"
                src="./imagenes/negras.webp"
                alt="Zapato catálogo"
            >

            <button
                class="flecha der"
                type="button"
                onclick="moverCarrusel('zapatos', 1)"
            >
                &#10095;
            </button>

        </article>

    </section>


    <hr>


    <!-- =================================================
         PROMOCIONES
    ================================================== -->

    <section>

        <h2>
            Promociones Exclusivas
        </h2>


        <article class="productos">

            <div class="producto">

                <img
                    src="./imagenes/NewBalance.webp"
                    alt="Zapatillas modernas Mujer"
                >

                <h3>
                    Zapatillas modernas Mujer
                </h3>

                <p>
                    <strong>
                        Compra uno y lleva 2
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Ver Detalles!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/zapato5.jpg"
                    alt="Sandalia de Verano"
                >

                <h3>
                    Sandalia de Verano
                </h3>

                <p>
                    <strong>
                        Envío gratis
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Ver Detalles!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/AMIRI-Classic-Low-White-Grey.avif"
                    alt="Amiri Blancos"
                >

                <h3>
                    Amiri Blancos
                </h3>

                <p>
                    <strong>
                        10% de descuento
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Ver Detalles!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/Shoe_for_women.jpg"
                    alt="Tenis negro mujer"
                >

                <h3>
                    Tenis negro mujer
                </h3>

                <p>
                    <strong>
                        2x1 por tiempo limitado
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Ver Detalles!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/Amiri-Brown.jpg"
                    alt="Amiri blanco con café"
                >

                <h3>
                    Amiri blanco con café
                </h3>

                <p>
                    <strong>
                        Hasta 25% de descuento
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Ver Detalles!
                </a>

            </div>

        </article>

    </section>


    <!-- =================================================
         DESTACADOS
    ================================================== -->

    <section>

        <h2>
            Productos Destacados
        </h2>


        <article class="productos">

            <div class="producto">

                <img
                    src="./imagenes/Nike-for-men.jpg"
                    alt="Zapatillas deportivas hombre"
                >

                <h3>
                    Zapatillas deportivas hombre
                </h3>

                <p>
                    <strong>
                        Ideal para correr
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/jordan-orange.webp"
                    alt="Air Jordan 1 Retro High"
                >

                <h3>
                    Air Jordan 1 Retro High
                </h3>

                <p>
                    <strong>
                        Estilo y comodidad en uno
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/Nike-dunk.jpg"
                    alt="Nike dunk low Next Nature"
                >

                <h3>
                    Nike dunk low Next Nature
                </h3>

                <p>
                    <strong>
                        Comodidad y estilo para el día a día
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./imagenes/Converse.jpg"
                    alt="Converse Star Player 76"
                >

                <h3>
                    Converse Star Player 76
                </h3>

                <p>
                    <strong>
                        Perfectos para tu look casual
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>


            <div class="producto">

                <img
                    src="./PHP/uploads/Captura de pantalla 2025-04-30 144904.png"
                    alt="Zapato Clásico Mujer"
                >

                <h3>
                    Zapato Clásico Mujer
                </h3>

                <p>
                    <strong>
                        Diseño atemporal y sofisticado
                    </strong>
                </p>

                <a
                    href="./paginas/registrarse.html"
                    class="btn"
                >
                    ¡Compra Ahora!
                </a>

            </div>

        </article>

    </section>


    <hr>


    <!-- =================================================
         RESEÑAS
    ================================================== -->

    <section class="resenas-contenedor">

        <!-- RESEÑAS -->

        <div class="lista-resenas">

            <h2>
                Reseñas
            </h2>

            <article class="reseñas">

                <?php

                $sql = "
                    SELECT *
                    FROM resenas
                    ORDER BY id DESC
                ";

                $resultado = $conexion->query($sql);

                if (
                    $resultado &&
                    $resultado->num_rows > 0
                ) {

                    while (
                        $row = $resultado->fetch_assoc()
                    ) {

                        echo '<div class="reseña">';

                        echo '<h3>';
                        echo str_repeat(
                            "⭐",
                            (int)$row['estrellas']
                        );
                        echo '</h3>';

                        echo '<p>';
                        echo '"';
                        echo htmlspecialchars(
                            $row['comentario'],
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        echo '"';
                        echo '</p>';

                        echo '<p>';
                        echo '<strong>- ';
                        echo htmlspecialchars(
                            $row['nombre'],
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        echo '</strong>';
                        echo '</p>';

                        echo '</div>';
                    }

                } else {

                    echo '<p class="sin-resenas">';
                    echo 'No hay reseñas todavía.';
                    echo '</p>';

                }

                ?>

            </article>

        </div>


        <!-- FORMULARIO -->

        <div class="formulario-resena">

            <h2>
                Deja tu reseña
            </h2>

            <form
                method="POST"
                action=""
            >

                <label for="nombre">
                    Tu nombre:
                </label>

                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    required
                >


                <label for="comentario">
                    Comentario:
                </label>

                <textarea
                    name="comentario"
                    id="comentario"
                    required
                ></textarea>


                <label for="estrellas">
                    Puntuación:
                </label>

                <select
                    name="estrellas"
                    id="estrellas"
                    required
                >

                    <option value="5">
                        ⭐⭐⭐⭐⭐
                    </option>

                    <option value="4">
                        ⭐⭐⭐⭐
                    </option>

                    <option value="3">
                        ⭐⭐⭐
                    </option>

                    <option value="2">
                        ⭐⭐
                    </option>

                    <option value="1">
                        ⭐
                    </option>

                </select>


                <button type="submit">
                    Enviar Reseña
                </button>

            </form>

        </div>

    </section>

</main>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    <!-- REDES -->

    <section class="redes-sociales">

        <h3>
            Encuéntranos también en:
        </h3>

        <div class="iconos-redes">

            <a
                href="https://www.facebook.com/profile.php?id=61575560894613&locale=es_LA"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Facebook"
            >
                <img
                    src="./imagenes/facebook.png"
                    alt="Facebook"
                >
            </a>


            <a
                href="#"
                aria-label="Instagram"
            >
                <img
                    src="./imagenes/instagram.jpg"
                    alt="Instagram"
                >
            </a>


            <a
                href="https://vm.tiktok.com/ZSHtArvgSS6t6-bfRuv/"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="TikTok"
            >
                <img
                    src="./imagenes/tiktok.png"
                    alt="TikTok"
                >
            </a>


            <a
                href="https://x.com/shoestyle397157"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="X"
            >
                <img
                    src="./imagenes/twitter.png"
                    alt="Twitter"
                >
            </a>


            <a
                href="https://chat.whatsapp.com/EopjMlzLqiFFMkKOCvCasU?mode=ems_copy_c"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="WhatsApp"
            >
                <img
                    src="./imagenes/whatsapp.png"
                    alt="WhatsApp"
                >
            </a>

        </div>

    </section>


    <!-- INFORMACIÓN -->

    <section class="footer-info">


        <!-- AYUDA -->

        <div class="columna">

            <h4>
                AYUDA
            </h4>

            <ul>

                <li>
                    <a href="https://chat.whatsapp.com/EopjMlzLqiFFMkKOCvCasU?mode=ems_copy_c">
                        Asistencia
                    </a>
                </li>

                <li>
                    <a href="https://chat.whatsapp.com/EopjMlzLqiFFMkKOCvCasU?mode=ems_copy_c">
                        Seguimiento de pedidos
                    </a>
                </li>

                <li>
                    <a href="https://chat.whatsapp.com/EopjMlzLqiFFMkKOCvCasU?mode=ems_copy_c">
                        Envíos
                    </a>
                </li>

                <li>
                    <a href="https://chat.whatsapp.com/EopjMlzLqiFFMkKOCvCasU?mode=ems_copy_c">
                        Devoluciones
                    </a>
                </li>

            </ul>

        </div>


        <!-- SHOESTYLE -->

        <div class="columna">

            <h4>
                SHOESTYLE
            </h4>

            <ul>

                <li>
                    <strong>Teléfonos:</strong>
                    +57 310 700 1125 /
                    +57 302 2001695
                </li>

                <li>
                    <strong>Correo:</strong>
                    shoestyle@gmail.com
                </li>

                <li>
                    <strong>Horarios:</strong>
                    8:00 a.m - 7:00 p.m
                </li>

                <li>
                    <strong>Dirección:</strong>
                    Por confirmar
                </li>

            </ul>

        </div>


        <!-- LEGAL -->

        <div class="columna">

            <h4>
                INFORMACIÓN LEGAL
            </h4>

            <ul>

                <li>
                    <a
                        href="./paginas/terminos.pdf"
                        target="_blank"
                    >
                        Términos y Condiciones
                    </a>
                </li>

                <li>
                    <a href="#">
                        Política de Privacidad
                    </a>
                </li>

                <li>
                    <a href="#">
                        Condiciones de Uso
                    </a>
                </li>

            </ul>

        </div>

    </section>


    <!-- COPYRIGHT -->

    <div class="copyright">

        <p>
            &copy; 2025 SHOESTYLE.
            Todos los derechos reservados.
        </p>

    </div>

</footer>

</div>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

const zapatos = [
    "./imagenes/negras.webp",
    "./imagenes/nike-2.webp",
    "./imagenes/nike-4.webp",
    "./imagenes/nike-6.avif"
];

let indexZapato = 0;


function moverCarrusel(tipo, direccion) {

    if (tipo !== "zapatos") {
        return;
    }

    indexZapato =
        (
            indexZapato +
            direccion +
            zapatos.length
        ) % zapatos.length;

    document.getElementById(
        "zapato-imagen"
    ).src = zapatos[indexZapato];
}


/* =====================================================
   MENÚ MÓVIL
===================================================== */

const menuMovil =
    document.getElementById("menuMovil");

const navegacion =
    document.getElementById("navegacion");


menuMovil.addEventListener(
    "click",
    function () {

        navegacion.classList.toggle("activo");

        const abierto =
            navegacion.classList.contains("activo");

        menuMovil.setAttribute(
            "aria-expanded",
            abierto
        );

        const icono =
            menuMovil.querySelector("i");

        if (abierto) {

            icono.classList.remove(
                "fa-bars"
            );

            icono.classList.add(
                "fa-xmark"
            );

        } else {

            icono.classList.remove(
                "fa-xmark"
            );

            icono.classList.add(
                "fa-bars"
            );
        }

    }
);


/* CERRAR MENÚ AL TOCAR UN ENLACE */

document
    .querySelectorAll(".navegacion a")
    .forEach(function(enlace) {

        enlace.addEventListener(
            "click",
            function() {

                navegacion.classList.remove(
                    "activo"
                );

                menuMovil.setAttribute(
                    "aria-expanded",
                    "false"
                );

                const icono =
                    menuMovil.querySelector("i");

                icono.classList.remove(
                    "fa-xmark"
                );

                icono.classList.add(
                    "fa-bars"
                );

            }
        );

    });

</script>

</body>
</html>
