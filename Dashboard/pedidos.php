<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pedidos</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/pedidos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php require_once '../partials/sidebar.php' ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn">
                    <i class="bi bi-list"></i>
                </label>
                <div class="header-left">
                    <h1>Pedidos</h1>
                    <p>Gerencie todos os Pedidos</p>
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
                        <p>Gerencie Todos os Pedidos</p>
                    </div>
                    <a href="cadastro_produtos.php">
                        <i class="bi bi-plus-lg"></i> Novo Pedido
                    </a>
                </div>

                <div class="kpi-grid">
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon blue" style="background: var(--title); color: white;">
                                <i class="bi bi-bag-fill"></i>
                            </div>
                            <div class="kpi-label">Total de Pedidos</div>

                        </div>
                        <div class="kpi-valor">324</div>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon yellow" style="background: #F59E0B; color: white;">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                            <div class="kpi-label">Pendentes</div>

                        </div>
                        <div class="kpi-valor">42</div>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon green" style="background: #22C55E; color: white;">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="kpi-label">Pagos</div>

                        </div>
                        <div class="kpi-valor">215</div>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon tell" style="background: #0891B2; color: white;">
                                <i class="bi bi-truck"></i>
                            </div>
                            <div class="kpi-label">Em entrega</div>

                        </div>
                        <div class="kpi-valor">38</div>
                    </div>
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-icon red" style="background: red; color: white;">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <div class="kpi-label">Cancelados</div>

                        </div>
                        <div class="kpi-valor">29</div>
                    </div>
                </div>

                <div class="main-filtro">
                    <div class="barra-pesquisa">
                        <button>
                            <i class="bi bi-search"></i>
                        </button>
                        <input type="text" name="pesquisa" placeholder="Buscar Pedido...">
                    </div>
                    <div class="status">
                        <select>
                            <option>Todos os status</option>
                            <option>Total de Pedidos</option>
                            <option>Pedentes</option>
                            <option>Pagos</option>
                            <option>Em entrega</option>
                            <option>Cancelados</option>
                        </select>
                    </div>
                </div>


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
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#0001</td>
                                        <td>Construtora Alpha</td>
                                        <td>5</td>
                                        <td>R$ 1.000,00</td>
                                        <td>Pago</td>
                                        <td>01/05/2025</td>
                                    </tr>
                                    <tr>
                                        <td>#0001</td>
                                        <td>Construtora Alpha</td>
                                        <td>5</td>
                                        <td>R$ 1.000,00</td>
                                        <td>Pago</td>
                                        <td>01/05/2025</td>
                                    </tr>
                                    <tr>
                                        <td>#0001</td>
                                        <td>Construtora Alpha</td>
                                        <td>5</td>
                                        <td>R$ 1.000,00</td>
                                        <td>Pago</td>
                                        <td>01/05/2025</td>
                                    </tr>
                                    <tr>
                                       <td>#0001</td>
                                        <td>Construtora Alpha</td>
                                        <td>5</td>
                                        <td>R$ 1.000,00</td>
                                        <td>Pago</td>
                                        <td>01/05/2025</td>
                                    </tr>
                                    <tr>
                                       <td>#0001</td>
                                        <td>Construtora Alpha</td>
                                        <td>5</td>
                                        <td>R$ 1.000,00</td>
                                        <td>Pago</td>
                                        <td>01/05/2025</td>
                                    </tr>
                                    <tr>
                                        <td>#0001</td>
                                        <td>Construtora Alpha</td>
                                        <td>5</td>
                                        <td>R$ 1.000,00</td>
                                        <td>Pago</td>
                                        <td>01/05/2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>