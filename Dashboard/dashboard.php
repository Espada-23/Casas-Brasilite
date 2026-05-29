<?php

require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$clientes = read($pdo, 'usuario');
$pedidos = read($pdo, 'pedido');

$total_clientes = count($clientes);
$total_pedidos = count($pedidos);

$stmt = $pdo->query("
    SELECT SUM(valor_total) as total 
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
    SELECT SUM(frete) as total 
    FROM produto
");
$custos = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$lucro = $faturamento - $custos;

$margem = $faturamento > 0 ? ($lucro / $faturamento) * 100 : 0;

// Estoque Crítico

$stmt = $pdo->query("
    SELECT
        produto.nome_produto,
        estoque.quantidade_atual,
        estoque.estoque_minimo
    FROM estoque
    JOIN produto ON produto.id_produto = estoque.idProduto
    ORDER BY estoque.quantidade_atual ASC
    LIMIT 5
");

$estoques = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pedidos

$stmt = $pdo->query("
    SELECT
        p.id_pedido,
        u.nome as cliente,
        pg.valor_total,
        pg.status_pagamento,
        pg.data_pagamento
    FROM pedido p 
    JOIN usuario u ON p.idUsuario = u.id_usuario
    JOIN pagamento pg ON p.idPagamento = pg.id_pagamento
    ORDER BY p.id_pedido ASC
    LIMIT 5
");

$pedidos_recentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "dashboard";
    require_once '../partials/sidebar.php'
    ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn">
                    <i class="bi bi-list"></i>
                </label>
                <div class="header-left">
                    <h1>Dashboard</h1>
                    <p>Visão geral do desempenho da sua loja.</p>
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

            <!-- KPIs -->
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
                            <h5>Lucro Total</h5>
                            <h3>R$ <?= number_format($lucro, 2, ',', '.') ?></h3>
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
                            <i class="bi bi-cart-fill"></i>
                        </div>
                        <div>
                            <h5>Número de Pedidos</h5>
                            <h3><?= $total_pedidos ?></h3>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-top">
                        <div class="icon orange">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                            <h5>Itens Vendidos</h5>
                            <h3><?= $itens_vendidos ?></h3>
                        </div>
                    </div>
                    <div class="card-bottom">
                        <span class="green">↑ 12,7%</span>
                        <p>vs mês anterior</p>
                    </div>
                </div>

            </section>

            <!-- CHARTS ROW -->
            <div class="charts-row">

                <!-- Evolução do Faturamento + Entrada x Saída -->
                <div class="grid-grafico">

                    <div class="grafico-card">
                        <div class="grafico-header">
                            <div>
                                <span>Evolução do Faturamento</span>
                                <div class="legenda">
                                    <div class="item-legenda">
                                        <span class="dot azul"></span>
                                        <p>Mensal</p>
                                    </div>
                                    <div class="item-legenda">
                                        <span class="dot laranja"></span>
                                        <p>Anual</p>
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
                                <span>1.8M</span>
                                <span>1.4M</span>
                                <span>1.2M</span>
                                <span>800k</span>
                                <span>400k</span>
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
                                    40,240 100,220 160,180 220,170 280,140
                                    340,100 400,70 460,90 520,70 580,55 640,40 700,20
                                " />
                                <circle cx="40" cy="240" r="5" fill="#F97316" />
                                <circle cx="100" cy="220" r="5" fill="#F97316" />
                                <circle cx="160" cy="180" r="5" fill="#F97316" />
                                <circle cx="220" cy="170" r="5" fill="#F97316" />
                                <circle cx="280" cy="140" r="5" fill="#F97316" />
                                <circle cx="340" cy="100" r="5" fill="#F97316" />
                                <circle cx="400" cy="70" r="5" fill="#F97316" />
                                <circle cx="460" cy="90" r="5" fill="#F97316" />
                                <circle cx="520" cy="70" r="5" fill="#F97316" />
                                <circle cx="580" cy="55" r="5" fill="#F97316" />
                                <circle cx="640" cy="40" r="5" fill="#F97316" />
                                <circle cx="700" cy="20" r="5" fill="#F97316" />
                            </svg>
                        </div>

                        <div class="meses">
                            <span>Jan</span><span>Fev</span><span>Mar</span><span>Abr</span>
                            <span>Mai</span><span>Jun</span><span>Jul</span><span>Ago</span>
                            <span>Set</span><span>Out</span><span>Nov</span><span>Dez</span>
                        </div>
                    </div>

                    <div class="grafico-barra-card">
                        <div class="topo-barra">
                            <p>Entrada x Saída</p>
                            <select>
                                <option>1 Mês</option>
                                <option>3 Meses</option>
                                <option>6 Meses</option>
                                <option>1 Ano</option>
                            </select>
                        </div>

                        <div class="legenda-barra">
                            <div class="item-legenda">
                                <span class="cor azul"></span>
                                <p>Entrada</p>
                            </div>
                            <div class="item-legenda">
                                <span class="cor laranja"></span>
                                <p>Saída</p>
                            </div>
                        </div>

                        <div class="grafico-barra">
                            <div class="valores-esquerda">
                                <span>16k</span>
                                <span>12k</span>
                                <span>8k</span>
                                <span>4k</span>
                                <span>0</span>
                            </div>
                            <div class="linha-bg b1"></div>
                            <div class="linha-bg b2"></div>
                            <div class="linha-bg b3"></div>
                            <div class="linha-bg b4"></div>
                            <div class="linha-bg b5"></div>

                            <div class="grupo">
                                <div class="barra azul-barra" style="height:180px;"></div>
                                <div class="barra laranja-barra" style="height:120px;"></div>
                            </div>
                            <div class="grupo">
                                <div class="barra azul-barra" style="height:240px;"></div>
                                <div class="barra laranja-barra" style="height:170px;"></div>
                            </div>
                            <div class="grupo">
                                <div class="barra azul-barra" style="height:200px;"></div>
                                <div class="barra laranja-barra" style="height:140px;"></div>
                            </div>
                            <div class="grupo">
                                <div class="barra azul-barra" style="height:280px;"></div>
                                <div class="barra laranja-barra" style="height:190px;"></div>
                            </div>
                            <div class="grupo">
                                <div class="barra azul-barra" style="height:260px;"></div>
                                <div class="barra laranja-barra" style="height:180px;"></div>
                            </div>
                            <div class="grupo">
                                <div class="barra azul-barra" style="height:220px;"></div>
                                <div class="barra laranja-barra" style="height:150px;"></div>
                            </div>
                            <div class="grupo">
                                <div class="barra azul-barra" style="height:150px;"></div>
                                <div class="barra laranja-barra" style="height:100px;"></div>
                            </div>
                        </div>

                        <div class="dias-barra">
                            <span>Seg</span><span>Ter</span><span>Qua</span><span>Qui</span>
                            <span>Sex</span><span>Sáb</span><span>Dom</span>
                        </div>
                    </div>

                </div>

                <!-- Resumo Financeiro -->
                <div class="r-finan">
                    <div class="top-r-finan">
                        <p>Resumo Financeiro</p>
                        <select>
                            <option>Este Mês</option>
                            <option>Mês Passado</option>
                            <option>3 Meses</option>
                            <option>9 Meses</option>
                            <option>1 Ano</option>
                        </select>
                    </div>

                    <?php

                    $margin_lucro = ($lucro / $faturamento) * 100;

                    ?>

                    <div class="infos-resumo">
                        <div class="faturamento">
                            <p>Faturamento Total</p>
                            <span>R$ <?= number_format($faturamento, 2, ',', '.') ?></span>
                        </div>
                        <div class="custos">
                            <p>Total de Custos</p>
                            <span>R$ <?= number_format($custos, 2, ',', '.') ?></span>
                        </div>
                        <div class="lucro">
                            <p>Lucro Total</p>
                            <span>R$ <?= number_format($lucro, 2, ',', '.') ?></span>
                        </div>
                        <div class="margin">
                            <p>Margem de Lucro</p>
                            <span><?= number_format($margin_lucro, 1, ',', '.') ?>%</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- BOTTOM ROW -->
            <div class="bottom-row">

                <!-- Produtos mais vendidos -->
                <div class="card">
                    <div class="card-head">
                        <p class="card-title">Produtos mais vendidos</p>
                    </div>
                    <div class="donut-area">
                        <div class="donut-svg-wrap">
                            <svg width="100" height="100" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="35" fill="none" stroke="#eee" stroke-width="18" />
                                <circle cx="50" cy="50" r="35" fill="none" stroke="#22C55E" stroke-width="25"
                                    stroke-dasharray="80.4 139.5" stroke-dashoffset="0" transform="rotate(-90 50 50)" />
                                <circle cx="50" cy="50" r="35" fill="none" stroke="var(--blue-grafico)"
                                    stroke-width="25" stroke-dasharray="59.9 160" stroke-dashoffset="-80.4"
                                    transform="rotate(-90 50 50)" />
                                <circle cx="50" cy="50" r="35" fill="none" stroke="var(--orange-grafico)"
                                    stroke-width="25" stroke-dasharray="47.1 172.8" stroke-dashoffset="-140.3"
                                    transform="rotate(-90 50 50)" />
                                <circle cx="50" cy="50" r="35" fill="none" stroke="var(--primary)" stroke-width="25"
                                    stroke-dasharray="29.7 190.2" stroke-dashoffset="-187.4"
                                    transform="rotate(-90 50 50)" />
                                <circle cx="50" cy="50" r="35" fill="none" stroke="var(--secondary-color)"
                                    stroke-width="25" stroke-dasharray="5.7 214.2" stroke-dashoffset="-217.1"
                                    transform="rotate(-90 50 50)" />
                            </svg>
                        </div>
                        <div class="donut-leg">
                            <div class="donut-leg-item">
                                <div class="donut-dot" style="background:#22C55E;"></div>
                                <span class="donut-leg-name">Areia Média</span>
                                <span class="donut-leg-val">1.675</span>
                            </div>
                            <div class="donut-leg-item">
                                <div class="donut-dot" style="background:var(--blue-grafico);"></div>
                                <span class="donut-leg-name">Cimento CP II</span>
                                <span class="donut-leg-val">1.250</span>
                            </div>
                            <div class="donut-leg-item">
                                <div class="donut-dot" style="background:var(--orange-grafico);"></div>
                                <span class="donut-leg-name">Vergalhão CA50</span>
                                <span class="donut-leg-val">980</span>
                            </div>
                            <div class="donut-leg-item">
                                <div class="donut-dot" style="background:var(--primary);"></div>
                                <span class="donut-leg-name">Bloco Estrutural</span>
                                <span class="donut-leg-val">620</span>
                            </div>
                            <div class="donut-leg-item">
                                <div class="donut-dot" style="background:var(--secondary-color);"></div>
                                <span class="donut-leg-name">Brita 1</span>
                                <span class="donut-leg-val">117</span>
                            </div>
                        </div>
                    </div>
                    <table class="prod-table">
                        <thead>
                            <tr>
                                <th style="text-align:left;">Produto</th>
                                <th style="text-align:center;">Vendidos</th>
                                <th style="text-align:center;">Faturamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="pdot" style="background:#22C55E;"></span>Cimento CP II 50kg</td>
                                <td style="text-align:center;">1.250</td>
                                <td style="text-align:center;">R$ 37.500</td>
                            </tr>
                            <tr>
                                <td><span class="pdot" style="background:var(--blue-grafico);"></span>Vergalhão CA50
                                    10mm</td>
                                <td style="text-align:center;">980</td>
                                <td style="text-align:center;">R$ 29.400</td>
                            </tr>
                            <tr>
                                <td><span class="pdot" style="background:var(--orange-grafico);"></span>Areia Média</td>
                                <td style="text-align:center;">1.675</td>
                                <td style="text-align:center;">R$ 12.375</td>
                            </tr>
                            <tr>
                                <td><span class="pdot" style="background:var(--primary);"></span>Bloco 14x19x39</td>
                                <td style="text-align:center;">620</td>
                                <td style="text-align:center;">R$ 12.400</td>
                            </tr>
                            <tr>
                                <td><span class="pdot" style="background:var(--secondary-color);"></span>Brita 1</td>
                                <td style="text-align:center;">117</td>
                                <td style="text-align:center;">R$ 5.280</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pedidos Recentes -->
                <div class="card">
                    <div class="tabela-wrapper">
                        <div class="top-table">
                            <p>Pedidos Recentes</p>
                            <a href="#">Ver Todos</a>
                        </div>
                        <div class="tabela">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pedido</th>
                                        <th>Cliente</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($pedidos_recentes as $pedido) {

                                        $valor = number_format($pedido['valor_total'], 2, ',', '.');

                                        echo '
                                            <tr>
                                                <td>#' . $pedido['id_pedido'] . '</td>
                                                <td style="white-space: nowrap;">' . $pedido['cliente'] . '</td>
                                                <td style="white-space:nowrap;">R$ ' . $valor . '</td>
                                                <td>' . $pedido['status_pagamento'] . '</td>
                                                <td style="white-space:nowrap;">' . $pedido['data_pagamento'] . '</td>
                                            </tr>
                                        ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="ver-pedidos">
                            <a href="#">Ver Todos os Pedidos</a>
                        </div>
                    </div>
                </div>

                <!-- Estoque Crítico -->
                <div class="card">
                    <div class="estoque">
                        <div class="top-estoque">
                            <p>Status Estoque</p>
                            <a href="estoque.html">Ver Todos</a>
                        </div>

                        <?php

                        foreach ($estoques as $item) {

                            $qtd = $item['quantidade_atual'];
                            $min = $item['estoque_minimo'];

                            if ($qtd <= $min) {
                                $status = "Crítico";
                                $classe = "critico";
                            } elseif ($qtd <= $min * 2) {
                                $status = "Atenção";
                                $classe = "atencao";
                            } else {
                                $status = "Ok";
                                $classe = "ok";
                            }

                            echo '
                            <div class="produtos-critico">
                            <div class="info-produto">
                                <img src="#" alt="produto">
                                <div class="detalhes-produtos">
                                    <h4>' . $item['nome_produto'] . '</h4>
                                    <p>Estoque: <span>' . $item['quantidade_atual'] . ' unidades</span></p>
                                </div>
                            </div>
                            <p class="condicao ' . $classe . '">' . $status . '</p>
                        </div>
                            ';
                        }

                        ?>

                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>