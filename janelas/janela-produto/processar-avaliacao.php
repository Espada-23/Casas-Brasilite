<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../../Crud/crud.php";
require_once "../../Crud/init.php";
 
$usuario_logado = $_SESSION['usuario'] ?? null;
$id_usuario     = (int)($usuario_logado['id_usuario'] ?? 0);
 
$id_produto = (int)($_POST['id_produto'] ?? 0);
$nota       = (int)($_POST['nota']       ?? 0);
$comentario = trim($_POST['comentario']  ?? '');
$url_origem = $_POST['url_origem']       ?? 'janela-produto.php?id=' . $id_produto;
 
if (!$id_usuario) {
    header("Location: $url_origem&erro=login");
    exit;
}
 
if ($id_produto <= 0 || $nota < 1 || $nota > 5 || $comentario === '') {
    header("Location: $url_origem&erro=invalido");
    exit;
}
 
if (strlen($comentario) > 500) {
    header("Location: $url_origem&erro=invalido");
    exit;
}
 
$check = $pdo->query("SELECT id_feedback FROM feedback WHERE idUsuario = $id_usuario AND idProduto = $id_produto");
if ($check->fetch()) {
    header("Location: $url_origem&erro=duplicado");
    exit;
}
 
$comentario_safe = $pdo->quote($comentario);
 
$pdo->query("INSERT INTO avaliacao (idUsuario, idProduto, nota) VALUES ($id_usuario, $id_produto, $nota)");
$pdo->query("INSERT INTO feedback (idUsuario, idProduto, mensagem) VALUES ($id_usuario, $id_produto, $comentario_safe)");
 
header("Location: $url_origem&sucesso=avaliacao");
exit;