<?php
require_once '../../Crud/crud.php';
require_once '../../Crud/init.php';
require_once '../../Crud/sessions.php';

if (isset($_SESSION['cadastro']) && !empty($_SESSION['cadastro'])) {
    $_SESSION['cadastrado'] = $_SESSION['cadastro'];
    
    create($pdo, 'usuario', $_SESSION['cadastrado']);
    $cpf = $_SESSION['cadastro']['cpf'];
    $query = "SELECT * FROM usuario WHERE cpf = '$cpf' LIMIT 1";
    
    $stmt = $pdo->query($query);
    $leitura = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($_SESSION['cadastro']);

    if ($leitura) {
        salvarUsuarioNaSessao($leitura);
        sincronizarCarrinhoSessaoComBanco($pdo, (int) $leitura['id_usuario']);
    }

    header("Location: /Casas-Brasilite/index.php");
    exit;
} else {
    header("Location: /Casas-Brasilite/janelas/cadastro-login/cadastro3.php");
    exit;
}
