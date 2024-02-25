<?php

include('connection.php');

if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['difficulty'])) {
    echo '<script>
        alert("Rellene todos los campos para editar el ticket");
        window.history.go(-1);
    </script>';
} else {

    $ticket_id = $_POST['ticket_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $difficulty = $_POST['difficulty'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];

    $query_edit_ticket = "UPDATE tickets SET title = '$title', description = '$description', difficulty = '$difficulty', date = '$date', hour = '$hour', state = 1 WHERE ticket_id = $ticket_id";

    $query_edit_ticket_result = mysqli_query($connection, $query_edit_ticket);

    if($query_edit_ticket_result) {
        echo '<script>
            alert("Ticket editado con éxito");
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