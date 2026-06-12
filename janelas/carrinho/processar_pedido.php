<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: carrinho.php');
    exit;
}

if (!usuarioLogado()) {
    $_SESSION['erro_carrinho'] = 'Você precisa fazer login para finalizar a compra.';
    header('Location: /Casas-Brasilite/janelas/cadastro-login/login.php');
    exit;
}

$idUsuario = (int) idUsuarioLogado();
$formaPagamento = $_POST['pagamento'] ?? 'pix';
$formasPermitidas = ['pix', 'cartao', 'boleto'];

if (!in_array($formaPagamento, $formasPermitidas, true)) {
    $formaPagamento = 'pix';
}

$idCarrinho = (int) buscarOuCriarCarrinhoAberto($pdo, $idUsuario);

$sqlItens = "
    SELECT ic.id_item_carrinho, ic.idProduto, ic.quantidade, ic.subtotal, 
    p.nome_produto, p.frete,
    e.quantidade_atual
    FROM item_carrinho ic
    JOIN produto p ON p.id_produto = ic.idProduto
    JOIN estoque e ON e.idProduto = p.id_produto
    WHERE ic.idCarrinho = $idCarrinho
";

$queryItens = $pdo->query($sqlItens);
$itens = $queryItens->fetchAll(PDO::FETCH_ASSOC);

if (empty($itens)) {
    $_SESSION['erro_carrinho'] = 'Seu carrinho está vazio.';
    header('Location: carrinho.php');
    exit;
}

foreach ($itens as $item) {
    if ((int) $item['quantidade_atual'] < (int) $item['quantidade']) {
        $_SESSION['erro_carrinho'] = 'Estoque insuficiente para o produto: ' . $item['nome_produto'];
        header('Location: carrinho.php');
        exit;
    }
}

$subtotal = 0;
$frete = 0;
foreach ($itens as $item) {
    $subtotal += (float) $item['subtotal'];
    $frete += (float) $item['frete'] * (int) $item['quantidade'];
}
$valorTotal = $subtotal + $frete;

$_SESSION['checkout'] = [
    'id_carrinho' => $idCarrinho,
    'forma_pagamento' => $formaPagamento,
    'valor_total' => $valorTotal
];

header('Location: pagamento.php');
exit;
