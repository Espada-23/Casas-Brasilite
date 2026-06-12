<?php
session_start();

var_dump($_SESSION);

if (isset($_SESSION['login_admin'])) {
    $_SESSION['usuario'] = [
        'id_usuario' => $_SESSION['login_admin']['id'],
        'nome'       => $_SESSION['login_admin']['usuario'],
        'email'      => $_SESSION['login_admin']['email'],
        'perfil'       => $_SESSION['login_admin']['perfil'],
        'cep' => $_SESSION['login_admin']['cep']
    ];
}

header("Location: /Casas-Brasilite/");
exit;
