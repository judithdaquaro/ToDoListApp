<?php
// Muestra mensajes de éxito o error guardados en la variable de sesión
function showAlert($success_field, $error_field)
{
    $alert = '';
    if (isset($_SESSION[$success_field])) {
        $alert = $_SESSION[$success_field] . "<br>";
    } else if (isset($_SESSION[$error_field])) {
        $alert = $_SESSION[$error_field] . "<br>";
    }
    return $alert;
}

function clearErr()
{
    if (isset($_SESSION['reg_err'])) {
        $_SESSION['reg_err'] = null;
        session_unset($_SESSION['reg_err']);
    }
    if (isset($_SESSION['reg_suc'])) {
        $_SESSION['reg_suc'] = null;
        session_unset($_SESSION['reg_suc']);
    }

    if (isset($_SESSION['err_login'])) {
        $_SESSION['err_login'] = null;
        session_unset($_SESSION['err_login']);
    }

}
