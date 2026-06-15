<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';
$busca        = $_GET['busca'] ?? '';
$statusFiltro = $_GET['status'] ?? '';

$id_filtrado  = $_GET['id_filtrado'] ?? null;
$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
$limite      = 10;
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

if ($paginaAtual < 1) {
    $paginaAtual = 1;
}

$offset = ($paginaAtual - 1) * $limite;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['acao_status']) && $_POST['acao_status'] === 'atualizar') {
        $id_pedido_atualizar = $_POST['id_pedido'] ?? 0;
        $novo_status         = $_POST['status_pedido'] ?? '';

        if ($id_pedido_atualizar > 0) {

            $status_antigo = read($pdo, 'pedido', 'status_pedido', 'id_pedido = ' . $id_pedido_atualizar);

            $pdo->query("UPDATE pedido SET status_pedido = '$novo_status' WHERE id_pedido = $id_pedido_atualizar");

            if ($novo_status === 'cancelado' && $status_antigo !== 'cancelado') {

                $itens = $pdo->query("
                    SELECT 
                        ic.idProduto AS id_produto,
                        ip.quantidade
                    FROM item_pedido ip
                    JOIN item_carrinho ic 
                        ON ic.id_item_carrinho = ip.idItem_Carrinho
                    WHERE ip.idPedido = $id_pedido_atualizar
                ")->fetchAll(PDO::FETCH_ASSOC);

                foreach ($itens as $item) {
                    $qtd = $item['quantidade'];
                    $id  = $item['id_produto'];

                    $pdo->query("
                        UPDATE estoque
                        SET quantidade_atual = quantidade_atual + $qtd
                        WHERE idProduto = $id
                    ");
                }
            }
        }

        $queryRedirect = http_build_query([
            'busca'   => $busca,
            'status'  => $statusFiltro,
            'pagina'  => $paginaAtual
        ]);

        header('Location: pedidos.php' . (!empty($queryRedirect) ? '?' . $queryRedirect : ''));
        exit;
    }


        if (isset($_POST['pesquisa'])) {
        if (empty($pesquisa)) {
            $mensagem_erro = "Por favor, digite um nome para realizar a busca.";
        } else {
            $resultados = $pdo->query(
                "SELECT id_produto, nome_produto FROM produto WHERE nome_produto LIKE '%$pesquisa%'"
            )->fetchAll(PDO::FETCH_ASSOC);

            if (count($resultados) === 0) {
                $mensagem_pesquisa = "Nenhum Produto encontrado.";
            }
            $registros_pesquisa = 1;
        }
    }
   
}

$sqlBase = "
FROM pedido ped
INNER JOIN usuario u ON u.id_usuario = ped.idUsuario
LEFT JOIN pagamento pag ON pag.id_pagamento = ped.idPagamento
LEFT JOIN item_pedido ip ON ip.idPedido = ped.id_pedido
LEFT JOIN item_carrinho ic ON ic.id_item_carrinho = ip.idItem_Carrinho
LEFT JOIN produto p ON p.id_produto = ic.idProduto
WHERE 1=1
";

if (!empty($busca)) {
    $sqlBase .= " 
    AND (
        ped.id_pedido LIKE '%$busca%'
        OR u.nome LIKE '%$busca%'
        OR u.cep LIKE '%$busca%'
        OR p.nome_produto LIKE '%$busca%'
        OR p.sku LIKE '%$busca%'
        OR p.marca LIKE '%$busca%'
    )";
}

if (!empty($statusFiltro)) {
    $sqlBase .= " AND ped.status_pedido = '$statusFiltro'";
}

if ($id_filtrado !== null) {
    $sqlBase .= " AND ped.id_pedido = $id_filtrado";
}

$sqlTotal       = "SELECT COUNT(DISTINCT ped.id_pedido) AS total $sqlBase";
$totalRegistros = (int)($pdo->query($sqlTotal)->fetch(PDO::FETCH_ASSOC)['total'] ?? 0);
$totalPaginas   = $totalRegistros > 0 ? ceil($totalRegistros / $limite) : 1;

if ($paginaAtual > $totalPaginas) {
    $paginaAtual = $totalPaginas;
}

$offset = ($paginaAtual - 1) * $limite;

$sql = "
SELECT 
    ped.id_pedido,
    ped.status_pedido,
    ped.data_entrega,
    ped.codigo_rastreio,
    u.nome,
    u.cep,
    pag.valor_total,
    pag.status_pagamento,
    COUNT(DISTINCT ip.id_item_pedido) AS total_itens
$sqlBase
GROUP BY 
    ped.id_pedido,
    ped.status_pedido,
    ped.data_entrega,
    ped.codigo_rastreio,
    u.nome,
    u.cep,
    pag.valor_total,
    pag.status_pagamento
ORDER BY ped.id_pedido DESC
LIMIT $limite OFFSET $offset";

$pedidos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$queryBase = http_build_query([
    'busca'       => $busca,
    'status'      => $statusFiltro,
    'id_filtrado' => $id_filtrado
]);

$sqlKpi = "
SELECT 
    ped.id_pedido,
    ped.status_pedido,
    pag.status_pagamento
FROM pedido ped
LEFT JOIN pagamento pag ON pag.id_pagamento = ped.idPagamento
";

$todosPedidosKpi = $pdo->query($sqlKpi)->fetchAll(PDO::FETCH_ASSOC);

$totalPedidos   = count($todosPedidosKpi);
$totalPendentes = 0;
$totalPagos     = 0;
$totalEntrega   = 0;
$totalCancelados = 0;

foreach ($todosPedidosKpi as $pedidoKpi) {
    if ($pedidoKpi['status_pedido'] == 'processando')  $totalPendentes++;
    if ($pedidoKpi['status_pagamento'] == 'pago')      $totalPagos++;
    if ($pedidoKpi['status_pedido'] == 'enviado')      $totalEntrega++;
    if ($pedidoKpi['status_pedido'] == 'cancelado')    $totalCancelados++;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Pedidos</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/pedidos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "pedidos";
    require_once("../partials/sidebar.php");
    ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn">
                    <i class="bi bi-list"></i>
                </label>
                <div class="header-left">
                    <h1>Pedidos</h1>
                    <p>Gerencie todos os pedidos</p>
                </div>
            </div>
            <div class="topbar-right">
                <div class="user">
                    <i class="bi bi-person-circle"></i>
                    <p>Administrador</p>
                </div>
            </div>
        </header>

        <main>
            <div class="container-pagina">
                <div class="tabela-header">
                    <div>
                        <h1>Pedidos</h1>
                        <p>Gerencie todos os pedidos</p>
                    </div>
                </div>

                <div class="kpi-grid">
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon blue" style="background: var(--title); color: white;">
                                <i class="bi bi-bag-fill"></i>
                            </div>
                            <div class="kpi-label">Total de Pedidos</div>
                        </div>
                        <div class="kpi-valor"><?= $totalPedidos ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon yellow" style="background: #F59E0B; color: white;">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                            <div class="kpi-label">Pendentes</div>
                        </div>
                        <div class="kpi-valor"><?= $totalPendentes ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon green" style="background: #22C55E; color: white;">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="kpi-label">Pagos</div>
                        </div>
                        <div class="kpi-valor"><?= $totalPagos ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon tell" style="background: #0891B2; color: white;">
                                <i class="bi bi-truck"></i>
                            </div>
                            <div class="kpi-label">Em entrega</div>
                        </div>
                        <div class="kpi-valor"><?= $totalEntrega ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon red" style="background: red; color: white;">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <div class="kpi-label">Cancelados</div>
                        </div>
                        <div class="kpi-valor"><?= $totalCancelados ?></div>
                    </div>
                </div>

                <form method="GET" action="pedidos.php" class="main-filtro">
                    <div class="barra-pesquisa">
                        <button type="submit">
                            <i class="bi bi-search"></i>
                        </button>

                        <input class="pesquisa-filtro"
                            type="text"
                            name="busca"
                            value="<?= htmlspecialchars($busca) ?>"
                            placeholder="Buscar pedido, cliente, CEP ou produto...">
                    </div>

                    <div class="status">
                        <select name="status" onchange="this.form.submit()" <?= $pedidos['status_pedido'] === 'cancelado' ? 'disabled' : '' ?>>
                            <option value="">Todos os status</option>
                            <option value="processando" <?= $statusFiltro == 'processando' ? 'selected' : '' ?>>Processando</option>
                            <option value="enviado" <?= $statusFiltro == 'enviado' ? 'selected' : '' ?>>Enviado</option>
                            <option value="entregue" <?= $statusFiltro == 'entregue' ? 'selected' : '' ?>>Entregue</option>
                            <option value="cancelado" <?= $statusFiltro == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                        </select>
                    </div>
                </form>

                    <?php if (empty($pedidos)): ?>
                        <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                            <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                            Nenhum pedido encontrado.
                        </div>
                        


                     <?php elseif (strlen($pesquisa) === 0):?> 
                        <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                            <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                            Por favor, digite um nome para realizar a busca.
                        </div>      <?php endif; ?> 

                <div class="container-tabela-produto">
                    <div class="tabela-wrapper">
                        <div class="tabela">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pedido</th>
                                        <th>Cliente</th>
                                        <th>Itens</th>
                                        <th>Valor Total</th>
                                        <th>Status</th>
                                        <th>CEP</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pedidos as $pedido): ?>
                                        <tr>
                                            <td>#<?= str_pad($pedido['id_pedido'], 4, '0', STR_PAD_LEFT) ?></td>
                                            <td><?= htmlspecialchars($pedido['nome']) ?></td>
                                            <td><?= $pedido['total_itens'] ?></td>
                                            <td>R$ <?= number_format($pedido['valor_total'] ?? 0, 2, ',', '.') ?></td>

                                            <td>
                                                <form method="POST" action="pedidos.php?<?= http_build_query(['busca' => $busca, 'status' => $statusFiltro, 'pagina' => $paginaAtual]) ?>" style="margin: 0;">
                                                    <input type="hidden" name="acao_status" value="atualizar">
                                                    <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>">

                                                    <select name="status_pedido" onchange="this.form.submit()" class="status-pedido-select">
                                                        <option value="processando" <?= $pedido['status_pedido'] === 'processando' ? 'selected' : '' ?>>Processando</option>
                                                        <option value="enviado" <?= $pedido['status_pedido'] === 'enviado' ? 'selected' : '' ?>>Enviado</option>
                                                        <option value="entregue" <?= $pedido['status_pedido'] === 'entregue' ? 'selected' : '' ?>>Entregue</option>
                                                        <option value="cancelado" <?= $pedido['status_pedido'] === 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                                                    </select>
                                                </form>
                                            </td>

                                            <td><?= htmlspecialchars($pedido['cep'] ?? '') ?></td>
                                            <td><?= date('d/m/Y', strtotime($pedido['data_entrega'])) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php if ($totalPaginas > 1): ?>
                                <div class="paginacao">

                                    <div class="seta">
                                        <?php if ($paginaAtual > 1): ?>
                                            <a class="seta" href="?pagina=<?= $paginaAtual - 1 ?>&<?= $queryBase ?>">
                                                <i class="bi bi-arrow-left"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="box-num">
                                        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                            <a href="?pagina=<?= $i ?>&<?= $queryBase ?>" class="<?= $i == $paginaAtual ? 'ativo' : '' ?>">
                                                <?= $i ?>
                                            </a>
                                        <?php endfor; ?>
                                    </div>

                                    <div class="seta">
                                        <?php if ($paginaAtual < $totalPaginas): ?>
                                            <a class="seta" href="?pagina=<?= $paginaAtual + 1 ?>&<?= $queryBase ?>">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>