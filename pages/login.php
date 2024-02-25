<?php

session_start();

include('../data/connection.php');

if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
    echo '<script> 
            alert("Su sesión permanece abierta");
            window.location = "my_tickets.php";
        </script>';
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="../media/icons/logo/logo.png" type="image/x-icon">

        <!-- Fuentes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Overlock+SC&display=swap" rel="stylesheet">


        <!-- Estilos -->
        <link rel="stylesheet" href="../styles/config.css">
        <link rel="stylesheet" href="../styles/templates/header.css">
        <link rel="stylesheet" href="../styles/login.css">

        <title>TicketApp</title>
    </head>

    <body>

        <div class="overlay"></div>


        <div class="header_btn_container">
            <img src="../media/icons/menu/menu_icon.png" alt="" class="header_btn_icon">
        </div>
        <header class="header">
            <a href="../index.html" class="logo_container">
                <img src="../media/icons/logo/logo.png" alt="" class="logo_icon">
            </a>

            <nav class="menu_container">
                <ul class="menu">
                    <li class="menu_item">
                        <a href="../index.html" class="menu_a">Inicio</a>
                    </li>
                    <li class="menu_item">
                        <a href="my_tickets.php" class="menu_a">Mis tickets</a>
                    </li>
                    <li class="menu_item">
                        <a href="add_ticket.php" class="menu_a">Agregar ticket</a>
                    </li>
                </ul>
            </nav>

            <div class="btns_container">
                <a href="register.php" class="btn">Registrarse</a>
            </div>
        </header>

        <main class="main">
            <h1 class="title">INGRESAR</h1>
            <form action="../data/login.php" method="POST" class="login_form">
                <div class="form_item">
                    <input type="email" class="input" name="email">
                    <label for="email" class="label">Email</label>
                </div>
                <div class="form_item">
                    <input type="password" class="input" name="password">
                    <label for="password" class="label">Contraseña</label>
                </div>
                <div class="form_item">
                    <input type="submit" class="input submit" value="Ingresár">
                </div>
                <div class="form_item">
                    <a href="register.php" class="form_a">¿No tenés cuenta?</a>
                </div>
            </form>
        </main>

        <script src="../scripts/header.js"></script>
        <script src="../scripts/input.js"></script>
    </body>

    </html>
<?php
}
?>