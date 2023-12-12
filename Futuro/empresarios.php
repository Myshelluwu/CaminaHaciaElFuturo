<?php
session_start();
$isUserType0 = isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] == 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Empresarios</title>
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
                        <a class="nav-link active" href="#oferta">Oferta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#universitarios">Universitarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#postulaciones">Postulaciones</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] == 0) {
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

    <section class="hero section2-hero section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 text-center mx-auto">
                    <div class="section-hero-text">
                        <h1 class="text-white">Empresas</h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php if ($isUserType0): ?>

        <section class="section-padding finder finder-bg-img" id="oferta">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 mx-auto text-center">
                        <br><br>
                        <button class="custom-btn btn custom-link mb-3" id="oferta" onclick="oferta()">Crear
                            oferta</button>

                        <form action="./add_offer.php" method="POST">
                            <section id="textoOferta">
                                <div class="col-lg-6 col-12 text-center mx-auto">
                                    <div class="section-hero-text">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="align-self-center">
                                                    <div class="about-thumb bg-white shadow-lg">
                                                        <div class="about-info">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control mb-3" name="empresa"
                                                                    placeholder="Empresa" required utofocus>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control mb-3" name="cargo"
                                                                    placeholder="Cargo" required utofocus>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control mb-3" name="salario"
                                                                    placeholder="Salario" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control mb-3" name="area"
                                                                    placeholder="Área" required>
                                                            </div>

                                                            <select class="form-select mb-3" name="estado" required
                                                                onchange="actualizarValor()">
                                                                <option value="" disabled selected>Estado</option>
                                                                <option value="Aguascalientes">Aguascalientes</option>
                                                                <option value="Baja California">Baja California</option>
                                                                <option value="Baja California Sur">Baja California Sur
                                                                </option>
                                                                <option value="Campeche">Campeche</option>
                                                                <option value="Chiapas">Chiapas</option>
                                                                <option value="Chihuahua">Chihuahua</option>
                                                                <option value="Coahuila">Coahuila</option>
                                                                <option value="Colima">Colima</option>
                                                                <option value="Durango">Durango</option>
                                                                <option value="Estado de México">Estado de México</option>
                                                                <option value="Guanajuato">Guanajuato</option>
                                                                <option value="Guerrero">Guerrero</option>
                                                                <option value="Hidalgo">Hidalgo</option>
                                                                <option value="Jalisco">Jalisco</option>
                                                                <option value="Michoacán">Michoacán</option>
                                                                <option value="Morelos">Morelos</option>
                                                                <option value="Nayarit">Nayarit</option>
                                                                <option value="Nuevo León">Nuevo León</option>
                                                                <option value="Oaxaca">Oaxaca</option>
                                                                <option value="Puebla">Puebla</option>
                                                                <option value="Querétaro">Querétaro</option>
                                                                <option value="Quintana Roo">Quintana Roo</option>
                                                                <option value="San Luis Potosí">San Luis Potosí</option>
                                                                <option value="Sinaloa">Sinaloa</option>
                                                                <option value="Sonora">Sonora</option>
                                                                <option value="Tabasco">Tabasco</option>
                                                                <option value="Tamaulipas">Tamaulipas</option>
                                                                <option value="Tlaxcala">Tlaxcala</option>
                                                                <option value="Veracruz">Veracruz</option>
                                                                <option value="Yucatán">Yucatán</option>
                                                                <option value="Zacatecas">Zacatecas</option>
                                                            </select>

                                                            <button type="submit" class="btn btn-dark"
                                                                name="agregar">Agregar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        <section class="presentation section-padding" id="universitarios">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-flex flex-column articles-thumb bg-white shadow-lg"> <!--Universitarios-->
                        <h2 class="mb-3 text-center">Universitarios</h2>
                        <div class="col-xs-12 ml-auto mr-auto">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search"
                                    placeholder="Introduce una carrera, universidad..." aria-label="Search">
                                <button class="custom-btn btn custom-link" type="submit">Buscar</button>
                            </form>

                            <div class="container">
                                <div data-bs-spy="scroll" data-bs-target="#navbar-example2"
                                    data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                                    class="scrollEmpresas bg-body-tertiary p-3 rounded-2 mt-2" tabindex="0">
                                    <div> <!--universitarios-->
                                        <?php
                                        include_once("include/dbconn.php");
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = 'SELECT * FROM universitarios';

                                            foreach ($db->query($sql) as $row) {

                                                ?>
                                                <article class="offer-thumb bg-white shadow-lg">
                                                    <div class="container">
                                                        <div class="row text-center">
                                                            <div class="col-md-4 align-self-center">
                                                                <h4 class="my-2 mx-2">
                                                                    <?php echo $row['nombre']; ?>
                                                                </h4>
                                                                <h4 class="my-2 mx-2">
                                                                    <?php echo $row['apellido']; ?>
                                                                </h4>
                                                            </div>
                                                            <div class="col-md-4 align-self-center">
                                                                <h5 class="my-2 mx-2">
                                                                    <?php echo $row['carrera']; ?>
                                                                </h5>
                                                                <h6 class="my-2 mx-2 align-self-center">
                                                                    <?php echo $row['estado']; ?>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 align-self-center">
                                                                <h6 class="my-2 mx-2">
                                                                    <?php echo $row['universidad']; ?>
                                                                </h6>
                                                                <button class="offer-btn btn" type="revisar">Ver</button>
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
                    </div>

                    <div class="col-lg-6 col-12 d-flex flex-column articles-thumb bg-white shadow-lg"> <!--Ofertas-->
                        <article>
                            <h2 class="mb-3 text-center">Mis ofertas</h2>
                            <div class="col-xs-12 ml-auto mr-auto">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Introduce una oferta..."
                                        aria-label="Search">
                                    <button class="custom-btn btn custom-link" type="submit">Buscar</button>
                                </form>
                                <div class="container">
                                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2"
                                        data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
                                        class="scrollEmpresas bg-body-tertiary p-3 rounded-2 mt-1" tabindex="0">
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
                                                                <div class="col-md-4 align-self-center">
                                                                    <h5 class="my-2 mx-2">
                                                                        <?php echo $row['cargo']; ?>
                                                                    </h5>
                                                                    <h5 class="my-2 mx-2">
                                                                        <?php echo $row['area']; ?>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-md-4 align-self-center">
                                                                    <h5 class="my-2 mx-2">

                                                                        <?php echo $row['salario']; ?>
                                                                    </h5>
                                                                    <h6 class="my-2 mx-2 align-self-center">
                                                                        <?php echo $row['estado']; ?>
                                                                    </h6>
                                                                    <h6 class="my-2 mx-2">
                                                                        <?php echo $row['fecha']; ?>
                                                                    </h6>
                                                                </div>

                                                                <div class="col-md-4 align-self-center">
                                                                    <button class="offer-btn btn mb-1"
                                                                        type="revisar">Editar</button>
                                                                    <div> <!--Boton eliminar-->
                                                                        <a class="offer-btn btn" data-bs-toggle="modal"
                                                                            data-bs-target="#borrarModal_<?php echo $row['id_oferta'] ?>">Eliminar</a>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="borrarModal_<?php echo $row['id_oferta']; ?>" tabindex="-1"
                                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 id="exampleModalLabel text-dark">
                                                                                            Eliminar
                                                                                            oferta</h5>
                                                                                        <button type="button" class="close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form method="POST"
                                                                                            action="./delete_offer.php?id=<?php echo $row['id_oferta']; ?>">
                                                                                            <div class="row form-group">
                                                                                                <h2 class="text-center text-dark">
                                                                                                    <?php echo $row['cargo']; ?>
                                                                                                    <?php echo $row['area']; ?>
                                                                                                    <?php echo $row['fecha']; ?>
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                                                                <button type="submit"
                                                                                                    name="eliminar"
                                                                                                    class="btn btn-primary">Eliminar</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

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
                    </div>
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
                                    <h5 class="card-title">
                                        <?php echo $row['nombre_universitario']; ?>
                                    </h5>
                                    <h6 class="card-text">se ha postulado para</h6>
                                    <h5 class="card-title">
                                        <?php echo $row['cargo_oferta']; ?>
                                    </h5>
                                    <h6 class="card-title">el día
                                        <?php echo $row['fecha']; ?>
                                    </h6>
                                    <button class="offer-btn btn" type="revisar">Revisar</button>
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