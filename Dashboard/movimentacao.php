<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Movimentação de Produtos</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/movimentacao.css">
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
                    <h1>Movimentação</h1>
                    <p>Histórico de entradas e saídas</p>
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
                        <h1>Movimentações</h1>
                        <p>Histórico de entradas e saídas de estoque</p>
                    </div>
                </div>

                <div class="kpi-grid">
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon entrada">
                                    <i class="bi bi-arrow-down-circle-fill"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Total de Entradas</div>
                                    <small>Movimentações do mês</small>
                                </div>
                            </div>
                            <span class="kpi-extra positivo">
                                +32 hoje
                            </span>
                        </div>
                        <div class="kpi-valor">324</div>
                    </div>


                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon saida">
                                    <i class="bi bi-arrow-up-circle-fill"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Total de Saídas</div>
                                    <small>Movimentações do mês</small>
                                </div>
                            </div>
                            <span class="kpi-extra negativo">
                                -15 hoje
                            </span>
                        </div>
                        <div class="kpi-valor">186</div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon saldo">
                                    <i class="bi bi-arrow-left-right"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Saldo do Período</div>
                                    <small>Entradas - saídas</small>
                                </div>
                            </div>
                        </div>
                        <div class="kpi-valor">+62</div>
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
                            <option>Todos os Tipos</option>
                            <option>Entrada</option>
                            <option>Saída</option>
                        </select>
                    </div>
                </div>

                <div class="container-tabela-produto">
                    <div class="tabela-wrapper">
                        <div class="tabela">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Produto</th>
                                        <th>SKU</th>
                                        <th>Qnt</th>
                                        <th>Responsável</th>
                                        <th>Data/Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tipo tp-entrada">
                                            <i class="bi bi-arrow-down-short"></i>
                                            <p>Entrada</p>
                                        </td>
                                        <td>Cimento CP II 50kg</td>
                                        <td>CMT001</td>
                                        <td>+50</td>
                                        <td>Votoran</td>
                                        <td class="data">22/05/2025<span>09:15</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tipo tp-saida">
                                            <i class="bi bi-arrow-up-short"></i>
                                            <p>Saída</p>
                                        </td>
                                        <td>Areia Média 20kg</td>
                                        <td>ARE002</td>
                                        <td>-20</td>
                                        <td>Quartzolit</td>
                                        <td class="data">22/05/2025<span>09:15</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tipo tp-entrada">
                                            <i class="bi bi-arrow-down-short"></i>
                                            <p>Entrada</p>
                                        </td>
                                        <td>Tijolo Cerâmico 8 Furos</td>
                                        <td>TJL003</td>
                                        <td>+30</td>
                                        <td>Cerâmica União</td>
                                        <td class="data">22/05/2025<span>09:15</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tipo tp-saida">
                                            <i class="bi bi-arrow-up-short"></i>
                                            <p>Saída</p>
                                        </td>
                                        <td>Tinta Acrílica Branco 18L</td>
                                        <td>TNT004</td>
                                        <td>-100</td>
                                        <td>Suvinil</td>
                                        <td class="data">22/05/2025<span>09:15</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tipo tp-entrada">
                                            <i class="bi bi-arrow-down-short"></i>
                                            <p>Entrada</p>
                                        </td>
                                        <td>Ferro CA-50 10mm</td>
                                        <td>FER005</td>
                                        <td>+25</td>
                                        <td>Gerdau</td>
                                        <td class="data">22/05/2025<span>09:15</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tipo tp-saida">
                                            <i class="bi bi-arrow-up-short"></i>
                                            <p>Saída</p>
                                        </td>
                                        <td>Argamassa AC-II 20kg</td>
                                        <td>ARG006</td>
                                        <td>-8</td>
                                        <td>Quartzolit</td>
                                        <td class="data">22/05/2025<span>09:15</span></td>
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