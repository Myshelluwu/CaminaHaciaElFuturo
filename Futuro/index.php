<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Camina hacia el futuro</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./Public/Images/logo_n.png" alt="logo" width="140" height="40">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#presentacion">Explorar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#acerca">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item"><a class="custom-btn btn custom-link" href="./cerrar_sesion.php">Cerrar Sesión</a></li>';
                            echo '                    <li class="nav-item m-lg-auto mx-auto">
                        <a class="btn bg-transparent icono" href="./perfil.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </a>
                    </li>';
                        } else {
                            echo '<li class="nav-item"><a class="custom-btn btn custom-link me-3" href="./login.php">Iniciar Sesión</a></li>';
                            echo '<li class="nav-item"><a class="custom-btn btn custom-link" href="./registro.php">Registrarse</a></li>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container-fluid h-100 shadow-lg">
            <div class="row h-100">
                <div id="carouselExampleCaptions" class="carousel carousel-fade hero-carousel slide"
                    data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container position-relative h-100">
                                <div class="carousel-caption d-flex flex-column justify-content-center">

                                    <h1>Explora <span>curriculums</span> de recién egresados</h1>

                                    <div class="d-flex align-items-center mt-4">
                                        <a class="custom-btn btn custom-link" href="./empresarios.php">Buscar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-image-wrap">
                                <img src="./Public/Images/portada.jpg" class="img-fluid carousel-image shadow-lg"
                                    alt="">
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="container position-relative h-100">
                                <div class="carousel-caption d-flex flex-column justify-content-center">
                                    <h1>Busca tu <span>empleo</span> ideal sin experiencia laboral</h1>

                                    <div class="d-flex align-items-center mt-4">
                                        <a class="custom-btn btn custom-link" href="./egresados.php">Buscar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-image-wrap">
                                <img src="./Public/Images/portada2.jpg" class="img-fluid carousel-image shadow-lg"
                                    alt="">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="presentation section-padding" id="presentacion">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 mb-5">
                    <h2 class="mb-3">Camina hacia el futuro</h2>
                    <p>Estamos comprometidos a ser tu aliado en el viaje hacia el éxito profesional. Ya sea que estés
                        buscando tu primer empleo, una pasantía emocionante o oportunidades de crecimiento continuo,
                        estamos aquí para apoyarte.</p>
                </div>

                <div class="col-lg-6 col-12 mb-5">
                    <img src="./Public/Images/estudiantes.jpg" class="img-fluid projects-image" alt="">
                    <h2 class="mt-3 mb-1">Universitarios</h2>
                    <p>Entendemos lo desafiante que puede ser encontrar empleo sin experiencia, y estamos aquí para
                        brindarte el apoyo necesario en tu búsqueda laboral. Sabemos que dar el primer paso en el mundo
                        laboral puede ser intimidante, pero estamos comprometidos a ayudarte a superar esos obstáculos.
                    </p>

                    <div class="d-flex align-items-center justify-content-center">
                        <a class="custom-btn btn custom-link" href="./egresados.php">Encuentra trabajo</a>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mb-5">
                    <img src="./Public/Images/empresarios.jpg" class="img-fluid projects-image" alt="">

                    <h2 class="mt-3 mb-1">Empresarios</h2>

                    <p>Sabemos lo importante que es para su empresa encontrar talento fresco y motivado que aporte una
                        perspectiva nueva. En un mercado competitivo, reconocemos que la búsqueda de recién egresados
                        puede ser una estrategia valiosa para mantener la vitalidad y la creatividad en su equipo.</p>

                    <div class="d-flex align-items-center justify-content-center">
                        <a class="custom-btn btn custom-link" href="./empresarios.php">Explora talento</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="about section-padding" id="acerca">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="about-image-wrap h-100">
                        <img src="./Public/Images/acerca.jpg" class="img-fluid about-image" alt="">

                        <div class="about-image-info">
                            <h4 class="text-white">Michelle Sánchez, CEO</h4>

                            <p class="text-white mb-0">En cada desafío, encuentro la oportunidad de inspirar y crear un
                                futuro excepcional para nuestra organización y todos los que forman parte de ella.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 d-flex flex-column align-self-center">
                    <div class="about-thumb bg-white shadow-lg">

                        <div class="about-info">

                            <h2 class="mb-3">Camina hacia el futuro</h2>

                            <h5 class="mb-3">Empresa comprometida por tu futuro</h5>

                            <p>Donde nos dedicamos a impulsar carreras y conectar talento excepcional con oportunidades
                                laborales emocionantes. Nos enorgullece ser una plataforma líder que facilita la
                                conexión entre egresados altamente calificados y empresas innovadoras.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <svg viewBox="0 0 1440 320">
            <path fill="#90c4df" fill-opacity="1"
                d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>

    <section class="contact" id="contacto">
        <div class="contact-container-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="custom-form contact-form" action="./comentario.php" method="post" role="form">
                            <br><br><br><br>
                            <small class="small-title">Contacto</small>

                            <h2 class="mb-5">¡Envíanos tus comentarios!</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 ">
                                    <input type="text" name="nombre" id="nombre" class="btn-dark form-control"
                                        placeholder="Nombre" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <input type="email" name="correo" id="correo" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Correo" required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" rows="4" id="mensaje" name="mensaje"
                                        placeholder="Mensaje"></textarea>

                                    <button name="comentar" type="submit" class="bg-white form-control">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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