<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['usuario'], $_SESSION['logado'], $_SESSION['login'], $_SESSION['cep_index']);

header("Location: /Casas-Brasilite/index.php");
exit;
