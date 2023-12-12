<?php
session_start();
$isUserType1 = isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] == 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">

    <title>Egresados</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <img src="./Public/Images/logo_n.png" alt="logo" width="150" height="40">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#buscador">Buscador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#articulos">Artículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#postulaciones">Postulaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#comentarios">Comentarios</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] == 1) {
                            echo '<li class="nav-item"><a class="custom-btn btn custom-link" href="./cerrar_sesion.php">Cerrar Sesión</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="custom-btn btn custom-link" href="./cerrar_sesion.php">Cerrar Sesión</a></li>';
                            echo '<li class="nav-item"><a class="custom-btn btn custom-link me-3" href="./login.php">Iniciar Sesión</a></li>';
                        }
                        ?>
                    </li>
                    <li class="nav-item m-lg-auto mx-auto">
                        <a class="btn bg-transparent icono" href="./perfil.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero section-hero section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 text-center mx-auto">
                    <div class="section-hero-text">
                        <h1 class="text-white">Universitarios</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if ($isUserType1): ?>
    <section class="section-padding finder finder-bg-img" id="buscador">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ml-auto mr-auto">
                    <br>
                    <br>
                    <form action="./busqueda.php" method="get">
                    <div class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Introduce tu área..."
                            aria-label="Search" name="find" id="find" >
                        <button class="custom-btn btn custom-link" type="submit">Buscar</button>
                    </div> 
                    </form>
                                       
                    <button class="col-12 custom-btn btn custom-link mt-5 " onclick="toggleResul()">Ver ofertas</button>

                    <section id="textoResul" hidden> <!--hidden-->
                        <div class="container mt-5 ">
                            <div data-bs-spy="scroll" data-bs-target="#navbar-example2"
                                data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                                class="scroll4 bg-body-tertiary p-3 rounded-2 resultados " tabindex="0">
                                <div> <!--Ofertas-->
                                    <?php
                                    include_once("include/dbconn.php");
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT * FROM ofertas';

                                        foreach ($db->query($sql) as $row) {

                                            ?>
                                            <article class="offer-thumb bg-white shadow-lg">
                                                <div class="container">
                                                    <div class="row text-center">
                                                        <div class="col-md-4">
                                                            <h3 class="my-2 mx-2">
                                                                <?php echo $row['cargo']; ?>
                                                            </h3>
                                                            <h5 class="my-2 mx-2">
                                                                <?php echo $row['area']; ?>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5 class="my-2 mx-2">
                                                                Empresa:
                                                                <?php echo $row['nombre_empresa']; ?>
                                                            </h5>
                                                            <h5 class="my-2 mx-2">

                                                                <?php echo $row['estado']; ?>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5 class="my-2 mx-2">
                                                                Salario: $
                                                                <?php echo $row['salario']; ?>
                                                            </h5>
                                                            <h5 class="my-2 mx-2">
                                                                Fecha de postulación:
                                                                <?php echo $row['fecha']; ?>
                                                            </h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="offer-btn btn" type="submit" data-bs-toggle="modal"
                                                                data-bs-target="#addModal_<?php echo $row['id_oferta']; ?>">Postularme</a>
                                                            <!-- Modal -->
                                                            <div class="modal fade"
                                                                id="addModal_<?php echo $row['id_oferta']; ?>" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-dark"
                                                                                id="exampleModalLabel">Postularme
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST"
                                                                                action="./add_post.php?id=<?php echo $row['id_oferta']; ?>">
                                                                                <div class="row form-group">

                                                                                    <div class="col-12">
                                                                                        <input type="email"
                                                                                            class="form-control mb-3"
                                                                                            id="correo" name="correo"
                                                                                            placeholder="Correo electrónico"
                                                                                            required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                                    <button type="submit" name="ingresar"
                                                                                        class="btn btn-primary">Guardar</button>
                                                                                </div>
                                                                            </form>
                                                                            <?php
                                                                            session_start();
                                                                            if (isset($_SESSION['message'])) {
                                                                                echo '<div class="mensaje">' . $_SESSION['message'] . '</div>';
                                                                                unset($_SESSION['message']);
                                                                            }
                                                                            ?>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php
                                        }
                                    } catch (PDOException $e) {
                                        echo 'Error en la consulta' . $e->getMessage() . ''; /*Error en la consulta*/
                                    }
                                    $database->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section class="articles section-padding" id="articulos">
        <br>
        <div class="container">
            <div class="row">
                <article class="col-lg-6 col-12 d-flex flex-column articles-thumb bg-white shadow-lg">
                    <h2 class="mb-3 text-center">Empresas</h2>
                    <div class="col-xs-12 ml-auto mr-auto">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Introduce una empresa..."
                                aria-label="Search">
                            <button class="custom-btn btn" type="submit">Buscar</button>
                        </form>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center align-items-center  my-4">
                                    <button class="offer-btn btn">Cerca de mí</button>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center  my-4">
                                    <button class="offer-btn btn">Mi área</button>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center  my-4">
                                    <button class="offer-btn btn">Recientes</button>
                                </div>
                            </div>
                        </div>
                        <div class="container"> <!--Empresas-->
                            <div data-bs-spy="scroll" data-bs-target="#navbar-example2"
                                data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                                class="scrollEmpresas bg-body-tertiary p-3 rounded-2" tabindex="0">
                                <div>
                                    <?php
                                    include_once("include/dbconn.php");
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT * FROM empresas';

                                        foreach ($db->query($sql) as $row) {

                                            ?>
                                            <article class="offer-thumb bg-white shadow-lg">
                                                <div class="container">
                                                    <div class="row text-center">
                                                        <div class="col-md-4 align-self-center">
                                                            <h3 class="my-2 mx-2">
                                                                <?php echo $row['nombre_empresa']; ?>
                                                            </h3>
                                                        </div>
                                                        <div class="col-md-4 align-self-center">
                                                            <h5 class="my-2 mx-2">
                                                                <?php echo $row['sector']; ?>
                                                            </h5>
                                                            <h5 class="my-2 mx-2 align-self-center">
                                                                <?php echo $row['estado']; ?>
                                                            </h5>
                                                        </div>
                                                        <div class="col-md-4 align-self-center">
                                                            <button class="offer-btn btn" type="revisar">Ofertas</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php
                                        }
                                    } catch (PDOException $e) {
                                        echo 'Error en la consulta' . $e->getMessage() . ''; /*Error en la consulta*/
                                    }
                                    $database->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </article>

                <article class="col-lg-6 col-12 d-flex flex-column">
                    <div class="articles-thumb bg-white shadow-lg">
                        <div class="articles-info">
                            <h2 class="mb-3">Artículos</h2>
                            <h5 class="mb-3">¿Qué poner y qué no poner en un currículum?</h5>
                            <p>Encontrarás una gran variedad de artículos y consejos prácticos sobre cómo redactar
                                un currículum efectivo, preparar una carta de presentación convincente y destacar
                                habilidades transferibles. Revisa las plantillas descargables para currículums y cartas
                                de presentación.
                            </p>
                            <button class="custom-btn btn" type="submit">Ver detalles</button>
                        </div>
                    </div>
                    <div class="articles-thumb bg-white shadow-lg">

                        <div class="articles-info">

                            <h2 class="mb-3">Guías de entrevistas</h2>

                            <h5 class="mb-3">¿Cómo sobrevivir a una entrevista sin morir en el intento?</h5>

                            <p>Aquí hallarás guías detalladas sobre cómo prepararse para entrevistas, qué preguntas
                                esperar y cómo responderlas de manera efectiva.
                                Así como videos de simulación de entrevistas para practicar.
                            </p>
                            <button class="custom-btn btn" type="submit">Ver detalles</button>
                        </div>
                    </div>
                    <div class="articles-thumb bg-white shadow-lg">

                        <div class="articles-info">

                            <h2 class="mb-3">Desarrollo de habilidades</h2>

                            <h5 class="mb-3">Un curso nunca cae mal a nadie</h5>

                            <p>Descubre todos los recursos gratuitos y asequibles que te recomendamos para tu desarrollo
                                de habilidades específicas requeridas en diversas industrias. Visita todas estas
                                plataformas de educación en línea.
                            </p>
                            <button class="custom-btn btn" type="submit">Ver detalles</button>
                        </div>
                    </div>
                    <div class="articles-thumb bg-white shadow-lg">

                        <div class="articles-info">

                            <h2 class="mb-3">Foro</h2>

                            <h5 class="mb-3">¿Qué mejor consejo que de los que ya cruzaron esta brecha?</h5>

                            <p>Visita nuestro espacio donde los estudiantes puedan interactuar, compartir experiencias y
                                hacer preguntas sobre la búsqueda de empleo.
                            </p>
                            <button class="custom-btn btn" type="submit">Ver detalles</button>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <section class="container mt-4" id="postulaciones">
        <br><br><br><br>
        <h2 class="mb-3 text-center">Postulaciones</h2>
        <div class="scrolling-container">
            <div class="article-thumb"> <!--Postulaciones-->
                <?php
                include_once("include/dbconn.php");
                $database = new Connection();
                $db = $database->open();
                try {
                    $sql = 'SELECT * FROM postulaciones';

                    foreach ($db->query($sql) as $row) {
                        ?>

                        <div class="card shadow-lg offer-thumb">
                            <div class="card-body post-thumb text-center white-bg">
                                <h6 class="card-text">Te has postulado para</h6>
                                <h5 class="card-title">
                                    <?php echo $row['cargo_oferta']; ?>
                                </h5>
                                <h6 class="card-title">el día
                                    <?php echo $row['fecha']; ?>
                                </h6>
                                <a class="offer-btn btn" data-bs-toggle="modal"
                                    data-bs-target="#borrarModal_<?php echo $row['id'] ?>">Eliminar</a>
                                <!-- Modal -->
                                <div class="modal fade" id="borrarModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 id="exampleModalLabel text-dark">Eliminar postulacion</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="./delete_post.php?id=<?php echo $row['id']; ?>">
                                                    <div class="row form-group">
                                                        <h2 class="text-center text-dark">
                                                            <?php echo $row['cargo_oferta']; ?>
                                                        </h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" name="eliminar"
                                                            class="btn btn-primary">Eliminar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } catch (PDOException $e) {
                    echo 'Error en la consulta' . $e->getMessage() . ''; /*Error en la consulta*/
                }
                $database->close();
                ?>
            </div>
        </div>
    </section>

    <section id="comentarios">
        <br><br><br><br>
        <h2 class="mb-3 text-center">Comentarios</h2>
        <div class="container mt-5">
            <div data-bs-spy="scroll2" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
                data-bs-smooth-scroll="true" class="scrollComentarios bg-body-tertiary p-3 rounded-2" tabindex="0">
                <div> <!--Comentarios-->
                    <?php
                    include_once("include/dbconn.php");
                    $database = new Connection();
                    $db = $database->open();
                    try {
                        $sql = 'SELECT * FROM comentarios';
                        foreach ($db->query($sql) as $row) {
                            ?>
                            <div class="scroll-item">
                                <h5>
                                    <?php echo $row['nombre']; ?>
                                </h5>
                                <h6>
                                    <?php echo $row['mensaje']; ?>
                                </h6>
                                <h6>
                                    <?php echo $row['fecha']; ?>
                                </h6>
                            </div>
                            <?php
                        }
                    } catch (PDOException $e) {
                        echo 'Error en la consulta' . $e->getMessage() . ''; /*Error en la consulta*/
                    }
                    $database->close();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>

    <section>
        <svg viewBox="0 0 1440 320">
            <path fill="#90c4df" fill-opacity="1"
                d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="col-12">
                <div class="site-footer-wrap text-center">
                    <p class="copyright-text mb-0 me-4">Copyright © 2023 Camina hacia el futuro Co.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="./public/js/bootstrap.js"></script>
    <script src="./funciones.js"></script>
</body>

</html>