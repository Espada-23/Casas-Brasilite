<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['usuario'], $_SESSION['login_admin'], $_SESSION['cep_index']);

header("Location: /Casas-Brasilite/Dashboard/index.php");
exit;
