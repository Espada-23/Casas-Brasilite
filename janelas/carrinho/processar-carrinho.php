<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'remover_item') {
    $id_produto = intval($_POST['id_produto']);
    
    if (isset($_SESSION['carrinho'][$id_produto])) {
        unset($_SESSION['carrinho'][$id_produto]);
    }
    
    header("Location: carrinho.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produto'])) {

    $id_produto = intval($_POST['id_produto']);
    $quantidade = intval($_POST['quantidade']);
    $acao = $_POST['acao'];
    $url_origem = $_POST['url_origem'];

    if (isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto] += $quantidade;
    } else {
        $_SESSION['carrinho'][$id_produto] = $quantidade;
    }

    if ($acao === 'comprar') {
        header("Location: carrinho.php");
        exit;
    } else if ($acao === 'adicionar') {
        header("Location: " . $url_origem);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];

    if ($acao === 'mover_todos_para_carrinho') {
        $favoritos = $_SESSION['favoritos'] ?? [];

        foreach ($favoritos as $id) {
            if (isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id]++; 
            } else {
                $_SESSION['carrinho'][$id] = 1; 
            }
        }

        header("Location: carrinho.php");
        exit;
    }
}

header("Location: index.php");
exit;