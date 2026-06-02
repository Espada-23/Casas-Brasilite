<?php
    require_once '../../Crud/init.php';
    require_once '../../Crud/crud.php';

    if (isset($_SESSION['login'])){
        $_SESSION['logado'] = $_SESSION['login'];
        
        $leitura = read($pdo, 'usuario', '*', "email='".$_SESSION['logado']['email']."'");

        unset($_SESSION['login']);

        header ("Location: ../../index.php?a=".$leitura['cep']);
        exit;
    }
?>