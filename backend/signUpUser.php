<?php
if (isset($_POST)) {
    require_once "../includes/connect.php";

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, trim($_POST['name'])) : false;
    $lname = isset($_POST['lastName']) ? mysqli_real_escape_string($db, trim($_POST['lastName'])) : false;
    $ci = isset($_POST['ci']) ? mysqli_real_escape_string($db, trim($_POST['ci'])) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $date = isset($_POST['date']) ? mysqli_real_escape_string($db, $_POST['date']) : false;
    $user = isset($_POST['user']) ? mysqli_real_escape_string($db, trim($_POST['user'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    $err = array();

    if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
        $err['name'] = "Name not valid";
    }

    if (empty($lname) || is_numeric($lname) || preg_match("/[0-9]/", $lname)) {
        $err['lname'] = "Last name not valid";
    }

    if (empty($ci) || !is_numeric($ci) || !preg_match("/[0-9]/", $ci)) {
        $err['ci'] = "CI not valid";
    }

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = "Email not valid";
    }

    if (empty($user)) {
        $err['user'] = "User not valid";
    }

    if (empty($password)) {
        $err['password'] = "Password not valid";
    }

    if (count($err) == 0) {
        $save_pass = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        $sql = "INSERT INTO persona VALUES(null,'$name','$lname','$ci','$email','$date','$user','$save_pass');";
        $query = mysqli_query($db, $sql);

        if ($query == true) {
            $_SESSION['reg_suc'] = "Register successful";
            header('Location: ../login.php');
        } else {
            $_SESSION['reg_err'] = "Failed to register new user";
            var_dump(mysqli_error($db));
            die();
        }
    } else {
        $_SESSION['reg_err'] = $err;
        var_dump($err);
        die();
    }
}
