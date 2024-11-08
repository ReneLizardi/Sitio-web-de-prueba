<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Centro de Copiado y Papeleria Dino's</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" class="logo" href="nombre y logo.svg">
</head>
<body>
    <header>
        <label for="toggle" id="label_toggle"><i class="fa-regular fa-moon"></i></label>
        <input type="checkbox" id="toggle">
        <hr>
        <div class="contenedor">
            <div class="posicionlogo">
                <a href="index.html">
                    <img class="logo" src="nombre y logo.svg" alt="Logo principal del sitio">
                </a>
            </div>
            <div class="titulos1">
                <h1> CENTRO DE COPIADO Y PAPELERIA DINOS </h1>
            </div>   
        </div>
        <br>
    </header>
    <hr>
    <nav>
        <ul class="menu-horizontal">
            <li><a href="index.html">INICIO</a>
                <ul class="menu-vertical">
                    <li><a href="index.html#ACERCA DE NOSOTROS">ACERCA DE NOSOTROS</a></li>
                    <li><a href="index.html#CONTACTO">CONTACTO</a></li>
                </ul>
            </li>
            <li><a href="productos.html">PRODUCTOS</a>
                <ul class="menu-vertical">
                    <li><a href="productos.html#PAPELERIA Y OFICINA">PAPELERIA Y OFICINA</a></li>
                    <li><a href="productos.html#IMPRESORAS">IMPRESORAS</a></li>
                    <li><a href="productos.html#SUMINISTROS TECNOLOGICOS">SUMINISTROS TECNOLOGICOS</a></li>
                </ul>
            </li>
            <li><a href="servicios.html">SERVICIOS</a>
                <ul class="menu-vertical">
                    <li><a href="servicios.html#CENTRO DE COPIADO">CENTRO DE COPIADO</a></li>
                    <li><a href="servicios.html#PAPELERIA">PAPELERIA</a></li>
                    <li><a href="servicios.html#MANTENIMIENTO">MANTENIMIENTO</a></li>
                </ul>
            </li>
            <li><a href="usuario.php">USUARIO</a>
                <ul class="menu-vertical">
                    <li><a href="usuario.php#INGRESAR">INGRESAR</a></li>
                    <li><a href="usuario.php#REGISTRARSE">REGISTRARSE</a></li>
                    <li><a href="usuario.php#PEDIDOS">PEDIDOS</a></li>
                    <li><a href="usuarios.php#CITAS">CITAS</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <hr><br>

    <div class="contenido1">
        <h2 id="USUARIO">USUARIO</h2>
    </div>

    <div class="contenido2">
        <h2 id="INGRESAR">INGRESAR</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>

        <br>
    </div> 

    <div class="contenido3">
        <h2 id="REGISTRARSE">REGISTRARSE</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>

    <hr>

    <div class="contenido4">
        <?php if (isset($_SESSION['user_id'])): ?>
            <h2 id="PEDIDOS">PEDIDOS</h2>
            <p>
                <!-- Contenido de pedidos solo accesible para usuarios registrados -->
                Aquí se mostrarán tus pedidos.
            </p>
            <br>
            <div class="contenido5">
                <h2 id="NUEVO_PEDIDO">Nuevo Pedido</h2>
                <form action="nuevo_pedido.php" method="POST">
                    <label for="producto">Producto:</label>
                    <select name="producto_id" required>
                        <?php
                        include 'db.php'; // Asegúrate de que el archivo db.php está incluido para la conexión
                        // Consultar productos
                        $sql_productos = "SELECT id, nombre FROM productos";
                        $result_productos = $conn->query($sql_productos);
                        while ($row = $result_productos->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                        }
                        ?>
                    </select>
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" min="1" required>
                    <button type="submit">Crear Pedido</button>
                </form>  
                         
            </div>
        <?php else: ?>
            <h2 id="PEDIDOS">PEDIDOS</h2>
            <p>Para ver tus pedidos <a href="usuarios.php#INGRESAR">inicia sesión</a></p>
            <br>
        <?php endif; ?>
    </div>

    <div class="contenido4">
        <?php if (isset($_SESSION['user_id'])): ?>
            <h2 id="CITAS">CITAS</h2>
            <p>
                <!-- Contenido de citas solo accesible para usuarios registrados -->
                Aquí se mostrarán tus citas.
            </p>
            <br>
            <div class="contenido7">
                <h2 id="NUEVA_CITA">Nueva Cita</h2>
                <form action="nueva_cita.php" method="POST">
                    <label for="servicio">Servicio:</label>
                    <select name="servicio_id" required>
                        <?php
                        // Consultar servicios
                        $sql_servicios = "SELECT id, nombre, costo_aproximado, categoria FROM servicios";
                        $result_servicios = $conn->query($sql_servicios);
                        while ($row = $result_servicios->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['nombre']} - {$row['costo_aproximado']} - {$row['categoria']}</option>";
                        }
                        ?>
                    </select>
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" required>
                    <label for="hora">Hora:</label>
                    <input type="time" name="hora" required>
                    <button type="submit">Crear Cita</button>
                </form>
            </div>
        <?php else: ?>
            <h2 id="CITAS">CITAS</h2>
            <p>Para ver tus citas <a href="usuarios.php#INGRESAR">inicia sesión</a></p>
            <br>
        <?php endif; ?>
    </div>
<hr>
    <div class="contenido5">
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>
                Aquí Puedes cerrar sesión.
            </p>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        <?php else: ?>
            <p>En este apartado puedes cerrar sesión una vez hallas terminado </p>
            <br>
        <?php endif; ?>
    </div>


    <br><hr>
    <footer>
        <div class="contenedor">
            <div class="posicionlogo">
                <a href="index.html">
                    <img class="logo" src="nombre y logo.svg" alt="Logo principal del sitio">
                </a>
            </div>
            
            <div class="titulos1">
                <h3>&copy; 2024 CENTRO DE COPIADO Y PAPELERIA DIMI. Todos los derechos reservados.</h3>
            </div>   
        </div>
        <br>
    </footer>

    <script src="modoscuro.js"></script>

</body>
</html>
