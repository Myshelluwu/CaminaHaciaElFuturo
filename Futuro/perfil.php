<?php
session_start();
include_once('user.php');
$isUserType0 = isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] == 0;
$isUserType1 = isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] == 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">
    <title>Perfil</title>
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
                </ul>

            </div>
        </div>
    </nav>

    <section class="hero section-profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 text-center mx-auto">
                    <div class="section-hero-text">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class=" align-self-center">
                                    <div class="about-thumb bg-white shadow-lg">
                                        <div class="about-info">
                                            <h2 class="mt-5 mb-4 text-center">Perfil</h2>
                                            <?php if ($isUserType0): ?>
                                                <section class="px-4">
                                                    <?php
                                                    echo '<p>Hola <b>' . obtenerCorreoUsuario() . '</b>, bienvenido</p>';

                                                    echo '<p>Correo electrónico: <b>' . obtenerCorreoUsuario() . '</b></p>';

                                                    echo '<p>Contraseña: <b>' . obtenerContrasenaUsuario() . '</b></p>';
                                                    ?>

                                                    <a class="custom-btn2 btn custom-link" data-bs-toggle="modal"
                                                        data-bs-target="#editModal_<?php echo $userData['id']; ?>">Editar</a>
                                                    <div class="modal fade" id="editModal_<?php echo $userData['id']; ?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark"
                                                                        id="exampleModalLabel">Editar perfil
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="./edit_perfil.php?id=<?php echo $userData['id']; ?>">
                                                                        <div class="row form-group">
                                                                            <div class="col-6">
                                                                                <label class="control-label "
                                                                                    style="position: relative; top: 7px;">Correo:
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <input type="email"
                                                                                        class="form-control mb-3"
                                                                                        name="correo"
                                                                                        value= <?php echo obtenerCorreoUsuario();?>></input>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row form-group">
                                                                            <div class="col-6">
                                                                                <label class="control-label "
                                                                                    style="position: relative; top: 7px;">Contraseña:
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group">
                                                                                    <input type="password"
                                                                                        class="form-control mb-3"
                                                                                        name="contrasena" id="contrasena"
                                                                                        value= <?php echo obtenerContrasenaUsuario(); ?> >
                                                                                    <div class="input-group-append">
                                                                                        <button type="button"
                                                                                            id="togglePassword"
                                                                                            class="btn btn-outline-secondary"
                                                                                            onclick="togglePasswordVisibility()">Mostrar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" name="editar"
                                                                                class="btn btn-primary">Guardar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="cerrar_sesion.php" class="custom-btn2 btn custom-link">Cerrar
                                                        sesión</a>
                                                </section>
                                            <?php elseif ($isUserType1): ?>
                                                <section class="px-4">
                                                    <?php
                                                    echo '<p>Hola <b>' . obtenerCorreoUsuario() . '</b>, bienvenido</p>';


                                                    echo '<p>Correo electrónico: <b>' . obtenerCorreoUsuario() . '</b></p>';

                                                    echo '<p>Contraseña: <b>' . obtenerContrasenaUsuario() . '</b></p>';
                                                    ?>
                                                                                                        <a class="custom-btn2 btn custom-link" data-bs-toggle="modal"
                                                        data-bs-target="#editModal_<?php echo $userData['id']; ?>">Editar</a>
                                                    <div class="modal fade" id="editModal_<?php echo $userData['id']; ?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark"
                                                                        id="exampleModalLabel">Editar perfil
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="./edit_perfil.php?id=<?php echo $userData['id']; ?>">
                                                                        <div class="row form-group">
                                                                            <div class="col-6">
                                                                                <label class="control-label "
                                                                                    style="position: relative; top: 7px;">Correo:
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <input type="email"
                                                                                        class="form-control mb-3"
                                                                                        name="correo"
                                                                                        value= <?php echo obtenerCorreoUsuario();?>></input>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row form-group">
                                                                            <div class="col-6">
                                                                                <label class="control-label "
                                                                                    style="position: relative; top: 7px;">Contraseña:
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group">
                                                                                    <input type="password"
                                                                                        class="form-control mb-3"
                                                                                        name="contrasena" id="contrasena"
                                                                                        value= <?php echo obtenerContrasenaUsuario(); ?> >
                                                                                    <div class="input-group-append">
                                                                                        <button type="button"
                                                                                            id="togglePassword"
                                                                                            class="btn btn-outline-secondary"
                                                                                            onclick="togglePasswordVisibility()">Mostrar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" name="editar"
                                                                                class="btn btn-primary">Guardar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="cerrar_sesion.php" class="custom-btn2 btn custom-link">Cerrar
                                                        sesión</a>
                                                </section>


                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script src="./public/js/bootstrap.js"></script>
    <script src="./funciones.js"></script>

</body>

</html>