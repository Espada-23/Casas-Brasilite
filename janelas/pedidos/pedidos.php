<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!usuarioLogado()) {
    header("Location: /Casas-Brasilite/janelas/cadastro-login/login.php");
    exit;
}

$id_usuario_logado = idUsuarioLogado();

$queryPedidos = "
    SELECT 
        p.id_pedido, 
        p.status_pedido, 
        pag.valor_total, 
        pag.forma_pagamento, 
        pag.data_pagamento
    FROM pedido p
    LEFT JOIN pagamento pag ON p.idPagamento = pag.id_pagamento
    WHERE p.idUsuario = :id_usuario
    ORDER BY p.id_pedido DESC
";

$stmtPedidos = $pdo->prepare($queryPedidos);
$stmtPedidos->execute(['id_usuario' => $id_usuario_logado]);
$pedidos = $stmtPedidos->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="pedidos.css">
</head>

<body>

    <?php include_once "../../partials/header.php" ?>

    <section class="secao-pedidos">
        <div class="container main-pedidos-container">

            <?php if (count($pedidos) === 0): ?>
                <p>Você ainda não possui nenhum pedido.</p>
            <?php else: ?>

                <?php foreach ($pedidos as $pedido):
                    $dataFormatada = date('d/m/Y', strtotime($pedido['data_pagamento']));
                    $valorFormatado = number_format($pedido['valor_total'], 2, ',', '.');
                    $formaPagamento = ucfirst($pedido['forma_pagamento']);

                    $status = $pedido['status_pedido'];

                    $passo1 = 'concluido';
                    $passo2 = '';
                    $passo3 = '';
                    $passo4 = '';

                    $tagClasse = '';
                    $tagTexto = '';

                    if ($status === 'processando') {
                        $passo2 = 'ativo';
                        $tagClasse = 'status-transito';
                        $tagTexto = 'Processando';
                    } elseif ($status === 'enviado') {
                        $passo2 = 'concluido';
                        $passo3 = 'ativo';
                        $tagClasse = 'status-transito';
                        $tagTexto = 'Em Transporte';
                    } elseif ($status === 'entregue') {
                        $passo2 = 'concluido';
                        $passo3 = 'concluido';
                        $passo4 = 'concluido';
                        $tagClasse = 'status-entregue';
                        $tagTexto = 'Entregue';
                    } elseif ($status === 'cancelado') {
                        $tagClasse = 'status-cancelado';
                        $tagTexto = 'Cancelado';
                    }
                ?>

                    <div class="card-pedido">
                        <div class="topo-card-pedido">
                            <div class="info-geral-pedido">
                                <div>
                                    <span class="label-pedido">Pedido</span>
                                    <strong>#<?= htmlspecialchars($pedido['id_pedido']) ?></strong>
                                </div>
                                <div>
                                    <span class="label-pedido">Data</span>
                                    <strong><?= $dataFormatada ?></strong>
                                </div>
                                <div>
                                    <span class="label-pedido">Total</span>
                                    <strong>R$ <?= $valorFormatado ?></strong>
                                </div>
                                <div>
                                    <span class="label-pedido">Pagamento</span>
                                    <strong><?= htmlspecialchars($formaPagamento) ?></strong>
                                </div>
                            </div>
                            <span class="status-tag <?= $tagClasse ?>"><?= $tagTexto ?></span>
                        </div>

                        <?php if ($status !== 'cancelado'): ?>
                            <div class="linha-tempo">
                                <div class="passo <?= $passo1 ?>">
                                    <div class="circulo-passo"><i class="fas fa-check"></i></div>
                                    <span class="texto-passo">Pedido Recebido</span>
                                </div>
                                <div class="passo <?= $passo2 ?>">
                                    <div class="circulo-passo"><i class="fas fa-money-bill-wave"></i></div>
                                    <span class="texto-passo">Pagamento</span>
                                </div>
                                <div class="passo <?= $passo3 ?>">
                                    <div class="circulo-passo"><i class="fas fa-truck"></i></div>
                                    <span class="texto-passo">Em Transporte</span>
                                </div>
                                <div class="passo <?= $passo4 ?>">
                                    <div class="circulo-passo"><i class="fas fa-home"></i></div>
                                    <span class="texto-passo">Entregue</span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <details class="detalhes-pedido-dropdown">
                            <summary class="btn-ver-detalhes">
                                Exibir itens do pedido <i class="fas fa-chevron-down"></i>
                            </summary>
                            <div class="conteudo-detalhes">

                                <?php
                                $queryItens = "
                                SELECT 
                                    ip.quantidade, 
                                    ip.subtotal, 
                                    prod.nome_produto
                                FROM item_pedido ip
                                JOIN item_carrinho ic ON ip.idItem_Carrinho = ic.id_item_carrinho
                                JOIN produto prod ON ic.idProduto = prod.id_produto
                                WHERE ip.idPedido = :id_pedido
                            ";
                                $stmtItens = $pdo->prepare($queryItens);
                                $stmtItens->execute(['id_pedido' => $pedido['id_pedido']]);
                                $itens = $stmtItens->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($itens as $item):
                                    $subtotalItem = number_format($item['subtotal'], 2, ',', '.');
                                ?>
                                    <div class="produto-pedido-mini">
                                        <div class="img-mini-placeholder"><i class="fas fa-box"></i></div>
                                        <div class="nome-mini">
                                            <h5><?= htmlspecialchars($item['nome_produto']) ?></h5>
                                            <span>Qtd: <?= htmlspecialchars($item['quantidade']) ?></span>
                                        </div>
                                        <div class="preco-mini">R$ <?= $subtotalItem ?></div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </details>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </section>

</body>

</html>