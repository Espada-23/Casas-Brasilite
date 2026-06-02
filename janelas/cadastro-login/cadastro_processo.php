<?php
    require_once '../../Crud/init.php';
    require_once '../../Crud/crud.php';

    if (isset($_SESSION['cadastro'])){
        $_SESSION['cadastrado'] = $_SESSION['cadastro'];
        create($pdo, 'usuario', $_SESSION['cadastrado']);

        header("Location: /Casas-Brasilite/index.php?#=1");
        unset($_SESSION['cadastro']);
        exit;
    }
?>