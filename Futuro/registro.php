<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles.css">
    <title>Registro</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <img src="./Public/Images/logo_n.png" alt="logo" width="150" height="40" > 
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

    <section class="hero section-regis">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 text-center mx-auto">
                    <div class="section-hero-text">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class=" align-self-center">
                                    <div class="about-thumb bg-white shadow-lg">
                                        <div class="about-info">
                                            <h2 class="mt-5 mb-4">Registro</h2>

                                            <input type="checkbox" id="checkbox1" onchange="checkboxChanged(1)">
                                            <label for="checkbox1">Estudiante</label>

                                            <input type="checkbox" id="checkbox2" onchange="checkboxChanged(2)">
                                            <label for="checkbox2">Empresa</label>

                                            <form action="./add_student.php" method="POST">
                                                <section id="info1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3" name="nombre"
                                                            placeholder="Nombre" required utofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3" name="apellido"
                                                            placeholder="Apellido" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3"
                                                            name="telefono" placeholder="Teléfono" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control mb-3" name="correo"
                                                            placeholder="Correo electrónico" required>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control mb-3"
                                                            name="contrasena" id="contrasena" placeholder="Contraseña"
                                                            required>
                                                        <div class="input-group-append">
                                                            <button type="button" id="togglePassword"
                                                                class="btn btn-outline-secondary"
                                                                onclick="togglePasswordVisibility()">Mostrar</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3" name="universidad"
                                                            placeholder="Universidad" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3"  name="carrera"
                                                            placeholder="Carrera" required>
                                                    </div>

                                                    <select class="form-select mb-3" name="estado"
                                                        required onchange="actualizarValor()">
                                                        <option value="" disabled selected>Estado</option>
                                                        <option value="Aguascalientes">Aguascalientes</option>
                                                        <option value="Baja California">Baja California</option>
                                                        <option value="Baja California Sur">Baja California Sur</option>
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
                                                        name="ingresar">Registrarse</button>
                                                </section>
                                            </form>

                                            <form action="./add_business.php" method="POST">
                                                <section id="info2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3" name="nombre"
                                                            placeholder="Nombre" required utofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3"  name="apellido"
                                                            placeholder="Apellido" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3"
                                                            name="telefono" placeholder="Teléfono" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control mb-3" name="correo"
                                                            placeholder="Correo electrónico" required>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control mb-3"
                                                            id="contrasena2" name="contrasena" placeholder="Contraseña"
                                                            required>
                                                        <div class="input-group-append">
                                                            <button type="button"
                                                                class="btn btn-outline-secondary"
                                                                onclick="togglePasswordVisibility2()">Mostrar</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3"  name="nombre_empresa"
                                                            placeholder="Nombre de Empresa" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3"  name="sector"
                                                            placeholder="Sector" required>
                                                    </div>

                                                    <select class="form-select mb-3"  name="estado"
                                                        required onchange="actualizarValor()">
                                                        <option value="" disabled selected>Estado</option>
                                                        <option value="Aguascalientes">Aguascalientes</option>
                                                        <option value="Baja California">Baja California</option>
                                                        <option value="Baja California Sur">Baja California Sur</option>
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
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mb-3" name="rfc"
                                                            placeholder="RFC" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark"
                                                        name="agregar">Registrarse</button>
                                                </section>
                                            </form>

                                            <p class="mt-3">¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a>
                                            </p>
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

    <script src="./funciones.js"></script>

</body>

</html>