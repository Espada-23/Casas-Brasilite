<?php
    require_once '../../Crud/init.php';
    require_once '../../Crud/crud.php';

    if (isset($_SESSION['login'])){
        $_SESSION['logado'] = $_SESSION['login'];
        unset($_SESSION['login']);

        header ("../../index.php?#=1");
        exit;
    }
?>