<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['checkout'])) {
    header('Location: carrinho.php');
    exit;
}

$idUsuario = (int) idUsuarioLogado();
$checkout = $_SESSION['checkout'];
$idCarrinho = (int) $checkout['id_carrinho'];
$formaPagamento = $checkout['forma_pagamento'];
$valorTotal = (float) $checkout['valor_total'];

$statusPagamento = ($formaPagamento === 'boleto') ? 'pendente' : 'pago';

$sqlItens = "
    SELECT ic.id_item_carrinho, ic.idProduto, ic.quantidade, ic.preco_unitario, ic.subtotal, e.id_estoque, e.quantidade_atual
    FROM item_carrinho ic
    JOIN estoque e ON e.idProduto = ic.idProduto
    WHERE ic.idCarrinho = $idCarrinho
";
$queryItens = $pdo->query($sqlItens);
$itens = $queryItens->fetchAll(PDO::FETCH_ASSOC);

if (empty($itens)) {
    $_SESSION['erro_carrinho'] = 'Seu carrinho está vazio.';
    header('Location: carrinho.php');
    exit;
}

$sqlPagamento = "
    INSERT INTO pagamento (idCarrinho, idUsuario, forma_pagamento, status_pagamento, valor_total)
    VALUES ($idCarrinho, $idUsuario, '$formaPagamento', '$statusPagamento', $valorTotal)
";
$pdo->exec($sqlPagamento);
$idPagamento = (int) $pdo->lastInsertId();

$codigoRastreio = 'BR' . date('YmdHis') . rand(100, 999);
$sqlPedido = "
    INSERT INTO pedido (idPagamento, idUsuario, status_pedido, codigo_rastreio)
    VALUES ($idPagamento, $idUsuario, 'processando', '$codigoRastreio')
";
$pdo->exec($sqlPedido);
$idPedido = (int) $pdo->lastInsertId();

foreach ($itens as $item) {
    $idItemCarrinho = (int) $item['id_item_carrinho'];
    $quantidade = (int) $item['quantidade'];
    $precoVenda = (float) $item['preco_unitario'];
    $subtotal = (float) $item['subtotal'];
    $idEstoque = (int) $item['id_estoque'];

    $sqlItemPedido = "
        INSERT INTO item_pedido (idPedido, idItem_Carrinho, quantidade, preco_venda, subtotal)
        VALUES ($idPedido, $idItemCarrinho, $quantidade, $precoVenda, $subtotal)
    ";
    $pdo->exec($sqlItemPedido);

    $novaQuantidade = (int) $item['quantidade_atual'] - $quantidade;
    $novoStatusEstoque = $novaQuantidade > 0 ? 'disponivel' : 'indisponivel';

    $sqlAtualizaEstoque = "
        UPDATE estoque 
        SET quantidade_atual = $novaQuantidade, status_estoque = '$novoStatusEstoque' 
        WHERE id_estoque = $idEstoque
    ";
    $pdo->exec($sqlAtualizaEstoque);

    $sqlMovimentacao = "
        INSERT INTO movimentacao (idUsuario, idPagamento, idEstoque, tipo_movimentacao, quantidade, status_movimentacao)
        VALUES ($idUsuario, $idPagamento, $idEstoque, 'saida', $quantidade, 'concluido')
    ";
    $pdo->exec($sqlMovimentacao);
}

$sqlFechaCarrinho = "UPDATE carrinho SET status_carrinho = 'fechado' WHERE id_carrinho = $idCarrinho";
$pdo->exec($sqlFechaCarrinho);

unset($_SESSION['checkout']);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="carrinho.css">
</head>

<body>
    <?php include_once "../../partials/header.php" ?>

    <div class="container">
        <div class="sucesso-box">
            <i class="fas fa-check-circle"></i>
            <h2>Compra Finalizada!</h2>
            <p>Seu pedido foi registrado com sucesso no sistema.</p>
            <a href="/Casas-Brasilite/janelas/pedidos/pedidos.php" class="btn btn-laranja" style="display:inline-block; text-decoration:none;">
                Visualizar Meus Pedidos
            </a>
        </div>
    </div>
</body>

</html>