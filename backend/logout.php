<?php
session_start();
if (isset($_SESSION['userData'])) {
    session_destroy();
}

header('Location: ../index.php');
