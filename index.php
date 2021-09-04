<?php
require_once "includes/connect.php";
require_once "includes/redirect.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>To Do APP</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <header class="Header">
      <h1>#todo - Bienvenido <?=$_SESSION['userData']['nombre']?></h1><br>
      <nav class="Header__menu">
        <ul id="ul">
          <li id="all" value="1">
            <a href="#">All</a>
          </li>
          <li id="active" value="2">
            <a href="#">Active</a>
          </li>
          <li id="complete" value="3">
            <a href="#">Complete</a>
          </li>
          <li id="logout" value="4">
            <a href="./backend/logout.php">Log Out</a>
          </li>
        </ul>
      </nav>
    </header>
    <main id="main">
      <div class="form" id="formInput">
            <input type="text" name="AggTarea" id="inputAdd" />
            <button type="submit" id="add" onclick="add()">Add</button>
      </div>
      <div class="contaiener" id="content"></div>
    </main>
    <script src="index.js"></script>
  </body>
</html>
