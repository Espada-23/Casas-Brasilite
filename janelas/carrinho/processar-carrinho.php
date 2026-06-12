<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /Casas-Brasilite/index.php");
    exit;
}

$acao = $_POST['acao'] ?? '';
$url_origem = $_POST['url_origem'] ?? '/Casas-Brasilite/index.php';

try {
    if ($acao === 'remover_item') {
        $id_produto = (int) ($_POST['id_produto'] ?? 0);

        if (usuarioLogado()) {
            removerProdutoCarrinhoBanco($pdo, idUsuarioLogado(), $id_produto);
        } else {
            unset($_SESSION['carrinho'][$id_produto]);
        }

        header("Location: carrinho.php");
        exit;
    }

    if (($acao === 'comprar' || $acao === 'adicionar') && isset($_POST['id_produto'])) {
        $id_produto = (int) $_POST['id_produto'];
        $quantidade = max(1, (int) ($_POST['quantidade'] ?? 1));

        if (usuarioLogado()) {
            adicionarProdutoCarrinhoBanco($pdo, idUsuarioLogado(), $id_produto, $quantidade);
        } else {
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = [];
            }
            $_SESSION['carrinho'][$id_produto] = ($_SESSION['carrinho'][$id_produto] ?? 0) + $quantidade;
        }

        header("Location: " . ($acao === 'comprar' ? 'carrinho.php' : $url_origem));
        exit;
    }

    if ($acao === 'mover_todos_para_carrinho') {
        $favoritos = $_SESSION['favoritos'] ?? [];

        foreach ($favoritos as $idProduto) {
            if (usuarioLogado()) {
                adicionarProdutoCarrinhoBanco($pdo, idUsuarioLogado(), (int) $idProduto, 1);
            } else {
                $_SESSION['carrinho'][(int) $idProduto] = ($_SESSION['carrinho'][(int) $idProduto] ?? 0) + 1;
            }
        }

        header("Location: carrinho.php");
        exit;
    }
} catch (Exception $e) {
    $_SESSION['erro_carrinho'] = $e->getMessage();
    header("Location: carrinho.php");
    exit;
}

header("Location: /Casas-Brasilite/index.php");
exit;
