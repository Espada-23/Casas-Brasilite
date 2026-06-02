<?php
require_once '../../Crud/crud.php';
require_once '../../Crud/init.php';

if (isset($_SESSION['cadastro']) && !empty($_SESSION['cadastro'])) {
    $_SESSION['cadastrado'] = $_SESSION['cadastro'];
    create($pdo, 'usuario', $_SESSION['cadastrado']);

    $leitura = read($pdo, 'usuario', '*', "cpf='".$_SESSION['cadastro']['cpf']."'");

    unset($_SESSION['cadastro']);

    header("Location: /Casas-Brasilite/index.php?a=".$leitura['cep']);
    exit;
} else {
        header("Location: /Casas-Brasilite/janelas/cadastro-login/cadastro3.php");
        exit;
}
