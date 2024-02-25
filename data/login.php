<?php

session_start();

include('connection.php');

if(empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>
            alert('Rellene todos los campos para ingresar')
            window.history.go(-1);
        </script>";
} else {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_login = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    
    $query_login_result = mysqli_query($connection, $query_login);

    if (mysqli_num_rows($query_login_result) == 0) {
        echo '<script>
        alert("Email o contraseña equivocada, intentelo nuevamente");
        window.location = "../pages/login.php";
        </script>';
    } else {
        $login_result = mysqli_query($connection, $query_login);
        
        if($login_result) {
            $user = mysqli_fetch_assoc($login_result);
            $user_name = $user['name'];
            $user_email = $user['email'];
            $_SESSION['user'] = $user_name;
            $_SESSION['email'] = $user_email;
            echo '<script>
            alert("Has iniciado sesión exitosamente");
            window.location = "../pages/my_tickets.php";
            </script>';

        }
    }
}