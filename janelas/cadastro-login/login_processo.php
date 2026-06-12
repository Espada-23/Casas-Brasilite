<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

if (!isset($_SESSION['login'])) {
    header("Location: /Casas-Brasilite/janelas/cadastro-login/login.php");
    exit;
}

$email = $_SESSION['login']['email'] ?? '';
$query = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
$stmt = $pdo->query($query);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

unset($_SESSION['login']);

if (!$usuario) {
    header("Location: /Casas-Brasilite/janelas/cadastro-login/login.php");
    exit;
}

salvarUsuarioNaSessao($usuario);
sincronizarCarrinhoSessaoComBanco($pdo, (int) $usuario['id_usuario']);

header("Location: /Casas-Brasilite/index.php");
exit;