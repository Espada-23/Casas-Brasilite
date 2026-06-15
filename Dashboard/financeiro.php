<?php
require_once '../Crud/crud.php';
require_once '../Crud/init.php';

$stmt = $pdo->query("
    SELECT SUM(valor_total) AS total
    FROM pagamento
    WHERE status_pagamento = 'pago'
");

$faturamento = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$stmt = $pdo->query("
    SELECT SUM(quantidade) as total 
    FROM item_pedido
");
$itens_vendidos = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$stmt = $pdo->query("
    SELECT SUM(m.quantidade * p.custo_produto) AS total
    FROM movimentacao m
    JOIN estoque e ON m.idEstoque = e.id_estoque
    JOIN produto p ON e.idProduto = p.id_produto
    WHERE m.tipo_movimentacao = 'saida'
      AND m.idPagamento IS NOT NULL
");

$custos = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$lucroLiquido = $faturamento - $custos;

$margin_lucro = $faturamento > 0 ? ($lucroLiquido / $faturamento) * 100 : 0;

$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

if ($paginaAtual < 1) {
    $paginaAtual = 1;
}

$limite = 4;
$offset = ($paginaAtual - 1) * $limite;

$stmt = $pdo->query("
    SELECT 
        p.id_pagamento,
        p.valor_total,
        p.status_pagamento,
        p.data_pagamento,
        u.nome
    FROM pagamento p
    JOIN usuario u ON u.id_usuario = p.idUsuario
    ORDER BY p.data_pagamento DESC
    LIMIT $limite OFFSET $offset
");

$transacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmtTotal = $pdo->query("SELECT COUNT(*) as total FROM pagamento");
$totalRegistros = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

$totalPaginas = ceil($totalRegistros / $limite);

if (isset($_GET['exportar']) && $_GET['exportar'] == 'true') {

    try {

        $sql = "
            SELECT
                pr.nome_produto AS produto,
                SUM(m.quantidade) AS quantidade_vendida,
                pr.preco_unitario AS valor_unitario,
                SUM(m.quantidade * pr.preco_unitario) AS valor_total

            FROM pagamento p

            INNER JOIN movimentacao m
                ON p.id_pagamento = m.idPagamento

            INNER JOIN estoque e
                ON m.idEstoque = e.id_estoque

            INNER JOIN produto pr
                ON e.idProduto = pr.id_produto

            WHERE
                p.status_pagamento = 'pago'
                AND m.tipo_movimentacao = 'saida'

            GROUP BY
                pr.id_produto

            ORDER BY
                quantidade_vendida DESC
        ";

        $stmt = $pdo->query($sql);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="relatorio_produtos_pagos.csv"');

        $output = fopen('php://output', 'w');

        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($output, [
            'Produto',
            'Quantidade Vendida',
            'Valor Unitário',
            'Valor Total'
        ], ';');

        foreach ($dados as $linha) {

            fputcsv($output, [
                $linha['produto'],
                $linha['quantidade_vendida'],
                number_format($linha['valor_unitario'], 2, ',', '.'),
                number_format($linha['valor_total'], 2, ',', '.')
            ], ';');

        }

        fclose($output);
        exit;

    } catch (PDOException $e) {

        die("Erro ao exportar: " . $e->getMessage());

    }
}

?>
<!DOCTYPE html>



<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Financeiro</title>
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/financeiro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "financeiro";
    require_once("../partials/sidebar.php");
    ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn">
                    <i class="bi bi-list"></i>
                </label>
                <div class="header-left">
                    <h1>Financeiro</h1>
                    <p>Visão geral do financiamento da sua loja.</p>
                </div>
            </div>
            <div class="topbar-right">
                <div class="user">
                    <i class="bi bi-person-circle"></i>
                    <p>Administrador</p>
                </div>
            </div>
        </header>

        <main class="main">

            <section class="cards-top">

                <div class="card">
                    <div class="card-top">
                        <div class="icon blue">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div>
                            <h5>Faturamento Total</h5>
                            <h3>R$ <?= number_format($faturamento, 2, ',', '.') ?></h3>
                        </div>
                    </div>
                    <div class="card-bottom">
                        <span class="green">↑ 18,6%</span>
                        <p>vs mês anterior</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-top">
                        <div class="icon green-bg">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div>
                            <h5>Lucro Líquico</h5>
                            <h3>R$ <?= number_format($lucroLiquido, 2, ',', '.') ?></h3>
                        </div>
                    </div>
                    <div class="card-bottom">
                        <span class="green">↑ 14,2%</span>
                        <p>vs mês anterior</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-top">
                        <div class="icon red">
                            <i class="bi bi-arrow-down-circle"></i>
                        </div>
                        <div>
                            <h5>Total de Custos</h5>
                            <h3><?= number_format($custos, 2, ',', '.') ?></h3>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-top">
                        <div class="icon orange">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <div>
                            <h5>Margin de Lucro</h5>
                            <h3><?= number_format($margin_lucro, 1, ',', '.') ?>%</h3>
                        </div>
                    </div>

                    <div class="card-bottom"></div>
                </div>

            </section>


            <div class="charts-row">

                <div class="grafico-card">
                    <div class="grafico-header">
                        <div>
                            <span>Receita x Despesa</span>
                            <div class="legenda">
                                <div class="item-legenda">
                                    <span class="dot azul"></span>
                                    <p>Receita</p>
                                </div>
                                <div class="item-legenda">
                                    <span class="dot laranja"></span>
                                    <p>Despesa</p>
                                </div>
                            </div>
                        </div>
                        <select>
                            <option>Este ano</option>
                        </select>
                    </div>



                    <div class="grafico">
                        <div class="linha-bg l1"></div>
                        <div class="linha-bg l2"></div>
                        <div class="linha-bg l3"></div>
                        <div class="linha-bg l4"></div>
                        <div class="linha-bg l5"></div>

                        <div class="valores-esquerda">
                            <span>16k</span>
                            <span>12k</span>
                            <span>8k</span>
                            <span>4k</span>
                            <span>0</span>
                        </div>

                        <div class="valores-direita">
                            <span>16k</span>
                            <span>12k</span>
                            <span>8k</span>
                            <span>4k</span>
                            <span>0</span>
                        </div>

                        <svg class="svg-linha" viewBox="0 0 800 300">
                            <polyline fill="none" stroke="#1D4ED8" stroke-width="4" points="
                40,220 100,200 160,150 220,160 280,120
                340,90 400,60 460,140 520,120 580,100 640,110 700,95
            " />
                            <circle cx="40" cy="220" r="5" fill="#1D4ED8" />
                            <circle cx="100" cy="200" r="5" fill="#1D4ED8" />
                            <circle cx="160" cy="150" r="5" fill="#1D4ED8" />
                            <circle cx="220" cy="160" r="5" fill="#1D4ED8" />
                            <circle cx="280" cy="120" r="5" fill="#1D4ED8" />
                            <circle cx="340" cy="90" r="5" fill="#1D4ED8" />
                            <circle cx="400" cy="60" r="5" fill="#1D4ED8" />
                            <circle cx="460" cy="140" r="5" fill="#1D4ED8" />
                            <circle cx="520" cy="120" r="5" fill="#1D4ED8" />
                            <circle cx="580" cy="100" r="5" fill="#1D4ED8" />
                            <circle cx="640" cy="110" r="5" fill="#1D4ED8" />
                            <circle cx="700" cy="95" r="5" fill="#1D4ED8" />
                        </svg>

                        <svg class="svg-linha" viewBox="0 0 800 300">
                            <polyline fill="none" stroke="#F97316" stroke-width="4" points="
                40,240 100,220 160,200 220,180 280,160
                340,140 400,120 460,130 520,110 580,95 640,85 700,75
            " />
                            <circle cx="40" cy="240" r="5" fill="#F97316" />
                            <circle cx="100" cy="220" r="5" fill="#F97316" />
                            <circle cx="160" cy="200" r="5" fill="#F97316" />
                            <circle cx="220" cy="180" r="5" fill="#F97316" />
                            <circle cx="280" cy="160" r="5" fill="#F97316" />
                            <circle cx="340" cy="140" r="5" fill="#F97316" />
                            <circle cx="400" cy="120" r="5" fill="#F97316" />
                            <circle cx="460" cy="130" r="5" fill="#F97316" />
                            <circle cx="520" cy="110" r="5" fill="#F97316" />
                            <circle cx="580" cy="95" r="5" fill="#F97316" />
                            <circle cx="640" cy="85" r="5" fill="#F97316" />
                            <circle cx="700" cy="75" r="5" fill="#F97316" />
                        </svg>
                    </div>

                    <div class="meses">
                        <span>Jan</span><span>Fev</span><span>Mar</span><span>Abr</span>
                        <span>Mai</span><span>Jun</span><span>Jul</span><span>Ago</span>
                        <span>Set</span><span>Out</span><span>Nov</span><span>Dez</span>
                    </div>
                </div>


                <div class="r-finan">
                    <div class="top-r-finan">
                        <p>Resumo Financeiro</p>
                    </div>

                    <div class="infos-resumo">
                        <div class="receitas">
                            <p>Faturamento Total</p>
                            <span>R$ <?= number_format($faturamento, 2, ',', '.') ?></span>
                        </div>
                        <div class="custos">
                            <p>Custo Total</p>
                            <span>R$ <?= number_format($custos, 2, ',', '.') ?></span>
                        </div>
                        <div class="lucro">
                            <p>Lucro Total</p>
                            <span>R$ <?= number_format($lucroLiquido, 2, ',', '.') ?></span>
                        </div>
                        <div class="margin">
                            <p>Margem de Lucro</p>
                            <span><?= number_format($margin_lucro, 1, ',', '.') ?>%</span>
                        </div>
                    </div>
                </div>

            </div>

                        <div class="excel">
                            <a href="?exportar=true">
                                <i class="bi bi-file-earmark-excel"></i>
                                Exportar Produtos Pagos
                            </a>
                        </div>
            <div class="bottom-row">

                <div class="card">

                    <div class="top-table">
                        <p>Últimas Transações</p>
                    </div>

                    <div class="tabela">

                        <table>
                            <thead>

                                <tr>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($transacoes as $t) {
                                    echo '<tr>

                                            <td>' . ($t['status_pagamento'] == 'pago' ? 'Pago' : 'Pendente') . '</td>

                                            <td>Venda Pedido - ' . $t['nome'] . '</td>

                                            <td style="color: ' . ($t['status_pagamento'] == 'pago' ? '#22C55E' : '#F97316') . '">
                                                R$ ' . number_format($t['valor_total'], 2, ',', '.') . '
                                            </td>

                                            <td>' . date('d/m', strtotime($t['data_pagamento'])) . '</td>

                                        </tr>';
                                }

                                ?>
                            </tbody>
                        </table>

                        <div class="paginacao">

                            <div class="seta">
                                <?php if ($paginaAtual > 1): ?>
                                    <a class="seta" href="?pagina=<?php echo $paginaAtual - 1; ?>">
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="box-num">
                                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                    <a href="?pagina=<?php echo $i; ?>"
                                        class="<?php echo $i == $paginaAtual ? 'ativo' : ''; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                <?php endfor; ?>
                            </div>

                            <div class="seta">
                                <?php if ($paginaAtual < $totalPaginas): ?>
                                    <a class="seta" href="?pagina=<?php echo $paginaAtual + 1; ?>">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>