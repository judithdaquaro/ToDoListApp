<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['userData'])) {
    header("Location: login.php");
}
