<?php

session_start();

include('../data/connection.php');

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
    <link rel="stylesheet" href="../styles/my_tickets.css">

    <title>TicketApp</title>
</head>

<body>


    <div class="overlay"></div>

    <div class="header_btn_container">
        <img src="../media/icons/menu/menu_icon.png" alt="" class="header_btn_icon">
    </div>

    <header class="header">
        <a href="index.html" class="logo_container">
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
        <div class="filter_btn_container">
            <span class="filter_btn" id="filter_easy">Fácil</span>
            <span class="filter_btn" id="filter_medium">Media</span>
            <span class="filter_btn" id="filter_hard">Difícil</span>
            <span class="filter_btn active" id="filter_all">Todos</span>
        </div>
        <div class="tickets">
            <?php
            if (!isset($_SESSION['user']) && !isset($_SESSION['email'])) {
            ?>
                <h2 class="title" style="display: grid; place-items:center; text-align: center;">INICIE SESIÓN PARA VER SUS TICKETS</h2>
                <a href="login.php" class="btn">Ingresár</a>
                <?php
            } else {

                $user_email = $_SESSION['email'];

                $query_user = "SELECT * FROM users WHERE email = '$user_email'";

                $query_user_result = mysqli_query($connection, $query_user);

                $row = mysqli_fetch_assoc($query_user_result);

                $user_id = $row['id'];

                $query_tickets = "SELECT * FROM tickets WHERE user_id = '$user_id'";

                $query_tickets_result = mysqli_query($connection, $query_tickets);

                if (mysqli_num_rows($query_tickets_result) == 0) {
                    ?>

                    <a href="add_ticket.php" class="btn">AGREGAR TICKET</a>
                    <?php
                } else {

                    while ($row_tickets = mysqli_fetch_assoc($query_tickets_result)) {
                ?>
                        <a href="edit_ticket.php?ticket_id=<?php echo $row_tickets['ticket_id'] ?>" class="ticket">
                            <div class="info_ticket">
                                <h3 class="ticket_title"><?php echo $row_tickets['title']; ?></h3>
                                <p class="ticket_desc"><?php echo $row_tickets['description']; ?>
                                </p>
                                <p class="ticket_difficulty"><?php echo $row_tickets['difficulty']; ?></p>

                                <?php if ($row_tickets['state'] == 0) {
                                ?>
                                    <p class="ticket_date"><?php echo 'Emitido: ' . $row_tickets['date'] . ', ' . $row_tickets['hour']; ?></p>

                                <?php
                                } else {
                                ?>
                                    <p class="ticket_date"><?php echo 'Actualizado: ' . $row_tickets['date'] . ', ' . $row_tickets['hour']; ?></p>

                                <?php
                                }
                                ?>
                            </div>
                            <div class="info_ticket">
                                <img src="" alt="ticket gif" class="ticket_gif">
                            </div>
                            <div class="ticket_overlay"><span class="ticket_overlay_text">EDITAR</span></div>
                        </a>
            <?php
                    }
                }
            }
            ?>


        </div>
    </main>

    <script src="../scripts/ticket.js"></script>
    <script src="../scripts/header.js"></script>
    <script src="../scripts/filter.js"></script>
</body>

</html>