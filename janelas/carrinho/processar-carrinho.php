<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
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
        // header("Location: carrinho.php");
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;
    } else if ($acao === 'adicionar') {
        // header("Location: " . $url_origem);
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;
    }
}

header("Location: index.php");
exit;
