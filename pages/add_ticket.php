<?php
session_start();

include('../data/connection.php');


if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];
    $query_user = "SELECT * FROM users WHERE email = '$user_email'";

    $query_user_result = mysqli_query($connection, $query_user);

    $row = mysqli_fetch_assoc($query_user_result);
}


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
    <link rel="stylesheet" href="../styles/add_ticket.css">

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

        <?php
        if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
        ?>
            <div class="btns_container">
                <a href="../data/logout.php" class="btn">Cerrar sesión</a>
            </div>
        <?php
        }
        ?>
    </header>

    <main class="main">
        <?php
        if (!isset($_SESSION['user']) && !isset($_SESSION['email'])) {
        ?>
            <h2 class="title" style="display: grid; place-items:center; text-align: center;">INICIE SESIÓN PARA CREAR UN TICKET</h2>
            <a href="login.php" class="btn">Ingresár</a>
        <?php
        } else {
        ?>
            <h1 class="title">AGREGÁR TICKET</h1>
            <form action="../data/add_ticket.php" method="POST" class="ticket_form">
                <div class="form_item">
                    <input type="text" class="input" name="title">
                    <label for="title" class="label">Título</label>
                </div>
                <div class="form_item">
                    <input type="text" class="input" name="description">
                    <label for="description" class="label">Descripción</label>
                </div>
                <div class="form_item">
                    <label for="" class="label loose">Dificultad</label>
                    <div class="radio_container">
                        <label for="difficulty" class="label loose">Fácil</label>
                        <input type="radio" class="radio" value="Fácil" name="difficulty">
                    </div>
                    <div class="radio_container">
                        <label for="difficulty" class="label loose">Medio</label>
                        <input type="radio" class="radio" value="Media" name="difficulty">
                    </div>
                    <div class="radio_container">
                        <label for="difficulty" class="label loose">Difícil</label>
                        <input type="radio" class="radio" value="Difícil" name="difficulty">
                    </div>
                </div>
                <div class="form_item">
                    <input type="text" class="input" name="date" id="input_date" hidden>
                </div>
                <div class="form_item">
                    <input type="text" class="input" name="hour" id="input_hour" hidden>
                </div>
                <div class="form_item">
                    <input type="text" class="input" name="user_id" value="<?php echo $row['id']; ?>" id="input_user_id" hidden>
                </div>
                <div class="form_item">
                    <input type="submit" class="input submit" value="Agregar ticket">
                </div>
            </form>
        <?php
        }

        ?>
    </main>

    <script src="../scripts/input.js"></script>
    <script src="../scripts/header.js"></script>
    <script src="../scripts/add_ticket.js"></script>

</body>

</html>