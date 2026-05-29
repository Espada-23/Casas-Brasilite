<?php
    require_once '../../Crud/init.php';
    require_once '../../Crud/crud.php';

echo "<pre>";
var_dump($_SESSION['cadastro']); // Mostra tudo o que está guardado na sessão atual
echo "</pre>";

    if (isset($_SESSION['cadastro'])){
        $_SESSION['cadastrado'] = $_SESSION['cadastro'];
        create($pdo, 'usuario', $_SESSION['cadastrado']);

        header("Location: /Casas-Brasilite/index.php");
        unset($_SESSION['cadastro']);
        exit;
    }
?>