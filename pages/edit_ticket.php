<?php

session_start();

include('../data/connection.php');

if (!isset($_SESSION['user']) && !isset($_SESSION['email'])) {
    echo '<script> 
            alert("Inicie sesión");
            window.location = "my_tickets.php";
        </script>';
} else {

    $ticket_id = $_GET['ticket_id'];

    $query_tickets = "SELECT * FROM tickets WHERE ticket_id = '$ticket_id'";

    $query_tickets_result = mysqli_query($connection, $query_tickets);

    $row_tickets = mysqli_fetch_assoc($query_tickets_result);
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
        <link rel="stylesheet" href="../styles/edit_ticket.css">

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
                    <a href="my_tickets.php" class="btn">Volver</a>
                    <a href="../data/logout.php" class="btn">Cerrar sesión</a>
                </div>
            <?php
            }
            ?>
        </header>

        <main class="main">
            <form action="../data/edit_ticket.php" method="POST" class="ticket">
                <div class="info_ticket">
                    <input type="number" hidden value="<?php echo $row_tickets['ticket_id']; ?>" name="ticket_id"></input>
                    <input type="text" class="ticket_title" value="<?php echo $row_tickets['title']; ?>" name="title"></input>
                    <input type="text" class="ticket_desc" name="description" value="<?php echo $row_tickets['description']; ?>">
                    </input>
                    <div class="form_item">
                        <?php if ($row_tickets['difficulty'] == 'Fácil') {
                        ?>
                            <div class="radio_container">
                                <label for="difficulty" class="label loose">Fácil</label>
                                <input type="radio" class="radio" value="Fácil" name="difficulty" checked>
                            </div>
                            <div class="radio_container">
                                <label for="difficulty" class="label loose">Media</label>
                                <input type="radio" class="radio" value="Media" name="difficulty">
                            </div>
                            <div class="radio_container">
                                <label for="difficulty" class="label loose">Difícil</label>
                                <input type="radio" class="radio" value="Difícil" name="difficulty">
                            </div>
                        <?php
                        } ?>
                        <?php if ($row_tickets['difficulty'] == 'Media') {
                        ?>
                            <div class="radio_container">
                                <label for="difficulty" class="label loose">Fácil</label>
                                <input type="radio" class="radio" value="Fácil" name="difficulty">
                            </div>
                            <div class="radio_container">
                                <label for="difficulty" class="label loose">Medio</label>
                                <input type="radio" class="radio" value="Media" name="difficulty" checked>
                            </div>
                            <div class="radio_container">
                                <label for="difficulty" class="label loose">Difícil</label>
                                <input type="radio" class="radio" value="Difícil" name="difficulty">
                            </div>
                        <?php
                        } ?>
                        <?php if ($row_tickets['difficulty'] == 'Difícil') {
                        ?>
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
                                <input type="radio" class="radio" value="Difícil" name="difficulty" checked>
                            </div>
                        <?php
                        } ?>
                    </div>
                    <div class="form_item">
                        <input type="text" class="input" name="date" id="input_date" hidden>
                    </div>
                    <div class="form_item">
                        <input type="text" class="input" name="hour" id="input_hour" hidden>
                    </div>
                    <input type="submit" class="submit" value="EDITAR">
                </div>
                <div class="info_ticket">
                    <img src="" alt="ticket gif" class="ticket_gif">
                </div>
                <p class="ticket_difficulty" hidden><?php echo $row_tickets['difficulty'] ?></p>
            </form>
        </main>

        <script src="../scripts/ticket.js"></script>
        <script src="../scripts/header.js"></script>
        <script src="../scripts/add_ticket.js"></script>
    </body>

    </html>

<?php
}
?>