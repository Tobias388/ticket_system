<?php

include('connection.php');

if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['difficulty'])) {
    echo '<script>
        alert("Rellene todos los campos para agregar un ticket");
        window.location = "../pages/add_ticket.php";
    </script>';
} else {

    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $difficulty = $_POST['difficulty'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];

    $query_add_ticket = "INSERT INTO tickets (user_id, title, description, difficulty, date, hour, state)VALUES($user_id,'$title', '$description', '$difficulty', '$date', '$hour', 0)";

    $query_add_ticket_result = mysqli_query($connection, $query_add_ticket);

    if($query_add_ticket_result) {
        echo '<script>
            alert("Ticekt agregado con éxito");
            window.location = "../pages/my_tickets.php";
        </script>';
    } else {
        echo '<script>
            alert("Algo salió mal");
            window.location = "../pages/add_ticket.php";
        </script>';
    }
}

?>