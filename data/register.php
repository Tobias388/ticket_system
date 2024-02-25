<?php

include('connection.php');

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['password']) || empty($_POST['repeat_password'])) {
    echo '<script>
        const form = document.querySelector(".register_form").reset();
        alert("Rellene todos los campos para registrarse")
        window.history.go(-1);
    </script>';
} else {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $reapeat_password = $_POST['repeat_password'];

    if ($password !== $reapeat_password) {
        echo '<script>
            const form = document.querySelector(".register_form").reset();
            alert("Las contraseñas no coinciden")
            window.history.go(-1);
        </script>';
    } else {
        $query_email_validation = "SELECT * FROM users WHERE email = '$email'";

        $query_email_validation_result = mysqli_query($connection, $query_email_validation);

        if (mysqli_num_rows($query_email_validation_result) > 0) {
            echo '<script>
                const form = document.querySelector(".register_form").reset();

                alert("Este email ya existe");
                window.history.go(-1);
            </script>';
        } else {
            $query_register = "INSERT INTO users (name, email, age, password)VALUES('$name', '$email', '$age', '$password')";

            $query_register_result = mysqli_query($connection, $query_register);

            if ($query_register_result) {
                echo '<script>
        const form = document.querySelector(".register_form").reset();

                    alert("Registrado con éxito");
                    window.location = "../index.html";
                </script>';
            }
        }
    }
}
