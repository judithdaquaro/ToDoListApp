<?php
if (isset($_POST)) {
    require_once "../includes/connect.php";

    $user = isset($_POST['user']) ? mysqli_real_escape_string($db, trim($_POST['user'])) : false;
    $pass = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    $sql = "SELECT * FROM persona WHERE usuario = '$user' OR email = '$user'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $userData = mysqli_fetch_assoc($login);

        $checkPass = password_verify($pass, $userData['clave']);

        if ($checkPass == true) {
            $_SESSION['userData'] = $userData;
            if (isset($_SESSION['err_login'])) {
                session_unset($_SESSION['err_login']);
            }
        } else {
            $_SESSION['err_login'] = "Contraseña incorrecta";
        }

    } else {
        $_SESSION['err_login'] = "Login Incorrecto";
    }
}
header('Location: ../index.php');
