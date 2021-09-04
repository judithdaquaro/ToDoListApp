<?php
require_once "./includes/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="css/registro.css">
</head>

<body>
    <header>
        <h1>To Do List</h1>
        <h3>Sign in</h3>
    </header>

    <div id="container" class="content">
        <form action="./backend/signUpUser.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" name="name" required><br><br>

            <label for="lastName">Last name:</label><br>
            <input type="text" name="lastName" required><br><br>

            <label for="ci">C.I:</label><br><br>
            <input type="text" name="ci" required><br>

            <label for="email">Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label for="date">Date of birth:</label>
            <input name="date" type="date" required><br><br>

            <label for="user">User:</label><br>
            <input type="text" name="user" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br>

            <input type="submit"></input>
        </form>
    </div>


</body>

</html>
