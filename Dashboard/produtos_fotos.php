<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$acao = $_GET['acao'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === '=== POST' && ($acao === 'atualizar_fotos')) {
    $_SESSION['dados_salvos'] = $_POST;

    // Processa o upload das imagens
    for ($i = 1; $i <= 4; $i++) {
        $campo = 'foto_produto_' . $i;

        if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] == 0) {
            $_SESSION['nome_imagem_' . $i] = $_FILES[$campo]['name'];
        }
    }

    include 'produtos.php';
    exit;
}

header("Location: produtos.php");
exit;