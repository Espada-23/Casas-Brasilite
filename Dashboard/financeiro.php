<?php 
    require_once '../Crud/data.php'



?>




<!DOCTYPE html>



<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Financeiro</title>
    <link rel="icon" href="../imagens/logo.png">
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
                        <div class="icon green-bg">
                            <i class="bi bi-cash-stack"></i>
                        </div>

                        <div>
                            <h5>Receita Mensal</h5>
                            <h3>R$ 87.450,00</h3>
                        </div>
                    </div>

                    <div class="card-bottom">
                        <span class="green">↑ 12,3%</span>
                        <p>vs mês anterior</p>
                    </div>
                </div>

                <div class="card">

                    <div class="card-top">
                        <div class="icon red">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div>
                            <h5>Despesas</h5>
                            <h3>R$ 31.420,00</h3>
                        </div>
                    </div>

                    <div class="card-bottom">
                        <span class="red-text">↑ 5,2%</span>
                        <p>vs mês anterior</p>
                    </div>

                </div>

                <div class="card">

                    <div class="card-top">

                        <div class="icon blue">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <div>
                            <h5>Lucro Líquido</h5>
                            <h3>R$ 56.030,00</h3>
                        </div>

                    </div>

                    <div class="card-bottom">
                        <span class="green">↑ 18,7%</span>
                        <p>vs mês anterior</p>
                    </div>

                </div>

                <div class="card">

                    <div class="card-top">

                        <div class="icon orange">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>

                        <div>
                            <h5>Contas a Receber</h5>
                            <h3>R$ 24.870,00</h3>
                        </div>

                    </div>

                    <div class="card-bottom">
                        <span class="green">↑ 8,1%</span>
                        <p>pendente</p>
                    </div>

                </div>

            </section>


            <div class="charts-row">

                <div class="grafico-card">

                    <div class="grafico-header">

                        <div>
                            <span>Receita x Despesas</span>
                        </div>

                        <select>
                            <option>2026</option>
                        </select>

                    </div>

                    <div class="grafico">

                        <div class="linha-bg l1"></div>
                        <div class="linha-bg l2"></div>
                        <div class="linha-bg l3"></div>
                        <div class="linha-bg l4"></div>

                        <svg class="svg-linha" viewBox="0 0 800 300">

                            <polyline
                                fill="none"
                                stroke="#22C55E"
                                stroke-width="4"

                                points="
                                        40,220
                                        100,180
                                        160,170
                                        220,150
                                        280,120
                                        340,100
                                        400,80
                                        460,90
                                        520,70
                                        580,50
                                        640,35
                                        700,20" />

                        </svg>

                        <svg class="svg-linha" viewBox="0 0 800 300">

                            <polyline
                                fill="none"
                                stroke="#EF4444"
                                stroke-width="4"

                                points="
                                    40,250
                                    100,220
                                    160,210
                                    220,180
                                    280,170
                                    340,160
                                    400,130
                                    460,150
                                    520,140
                                    580,120
                                    640,100
                                    700,90" />

                        </svg>

                    </div>

                    <div class="meses">
                        <span>Jan</span>
                        <span>Fev</span>
                        <span>Mar</span>
                        <span>Abr</span>
                        <span>Mai</span>
                        <span>Jun</span>
                        <span>Jul</span>
                        <span>Ago</span>
                        <span>Set</span>
                        <span>Out</span>
                        <span>Nov</span>
                        <span>Dez</span>
                    </div>

                </div>


                <div class="r-finan">
                    <div class="top-r-finan">
                        <p>Resumo Financeiro</p>
                    </div>

                    <div class="infos-resumo">
                        <div class="faturamento">
                            <p>Receita Total</p>
                            <span>R$ 1.254.300</span>
                        </div>

                        <div class="custos">
                            <p>Despesas Totais</p>
                            <span>R$ 845.700</span>
                        </div>

                        <div class="lucro">
                            <p>Lucro Líquido</p>
                            <span>R$ 408.600</span>
                        </div>

                        <div class="margin">
                            <p>Margem</p>
                            <span>32,5%</span>
                        </div>

                    </div>

                </div>

            </div>


            <div class="bottom-row">

                <div class="card">

                    <div class="top-table">

                        <p>Últimas Transações</p>
                        <a href="#">Ver todas</a>

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

                                <tr>
                                    <td>Entrada</td>
                                    <td>Venda Pedido #00024</td>
                                    <td style="color:#22C55E">
                                        R$ 4.500
                                    </td>
                                    <td>08/05</td>
                                </tr>

                                <tr>
                                    <td>Saída</td>
                                    <td>Fornecedor ABC</td>
                                    <td style="color:#EF4444">
                                        R$ 2.000
                                    </td>
                                    <td>08/05</td>
                                </tr>

                                <tr>
                                    <td>Entrada</td>
                                    <td>Pagamento Cliente</td>
                                    <td style="color:#22C55E">
                                        R$ 1.200
                                    </td>
                                    <td>09/05</td>
                                </tr>

                                <tr>
                                    <td>Saída</td>
                                    <td>Frete</td>
                                    <td style="color:#EF4444">
                                        R$ 650
                                    </td>
                                    <td>09/05</td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                <div class="card">

                    <div class="estoque">

                        <div class="top-estoque">

                            <p>Contas Pendentes</p>

                            <a href="#">
                                Ver todas
                            </a>

                        </div>


                        <div class="produtos-critico">

                            <div class="detalhes-produtos">

                                <h4>Fornecedor Concreto Forte</h4>

                                <p>Vencimento:
                                    <span>15/05/2026</span>
                                </p>

                            </div>

                            <p class="condicao critico">
                                R$ 3.200
                            </p>

                        </div>


                        <div class="produtos-critico">

                            <div class="detalhes-produtos">

                                <h4>Energia Elétrica</h4>

                                <p>Vencimento:
                                    <span>18/05/2026</span>
                                </p>

                            </div>

                            <p class="condicao atencao">
                                R$ 860
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </main>
    </div>
</body>

</html>