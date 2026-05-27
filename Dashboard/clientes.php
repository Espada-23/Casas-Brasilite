<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Clientes</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/clientes.css">
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
                    <h1>Clientes</h1>
                    <p>Gerencie e acompanhe os clientes</p>
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
                        <h1>Clientes</h1>
                        <p>Gerencie e acompanhe os clientes</p>
                    </div>
                </div>

                <div class="kpi-grid">
                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon entrada">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Total de Clientes</div>
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
                                    <i class="bi bi-person-fill-add"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Novos Clientes</div>
                                    <small>Movimentações do mês</small>
                                </div>
                            </div>
                            <span class="kpi-extra negativo">
                                +15 hoje
                            </span>
                        </div>
                        <div class="kpi-valor">186</div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon saldo">
                                    <i class="bi bi-arrow-up-circle-fill"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Clientes Ativos</div>
                                    <small>Total</small>
                                </div>
                            </div>
                            <span class="kpi-extra positivo">
                                78% Total
                            </span>
                        </div>
                        <div class="kpi-valor">62</div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon desativo">
                                    <i class="bi bi-arrow-down-circle-fill"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Clientes Desativados</div>
                                    <small>Total</small>
                                </div>
                            </div>
                            <span class="kpi-extra p-des">
                                20% Total
                            </span>
                        </div>
                        <div class="kpi-valor">22</div>
                    </div>
                </div>

                <div class="main-filtro">
                    <div class="barra-pesquisa">
                        <button>
                            <i class="bi bi-search"></i>
                        </button>
                        <input type="text" name="pesquisa" placeholder="Buscar Pedido...">
                    </div>
                </div>

                <div class="grid-clientes">

                    <div class="card-cliente">
                        <div class="perfil">
                            <h1>JS</h1>

                            <div class="nome">
                                <p>João Silva</p>
                                <span>Pessoa Física</span>
                            </div>
                        </div>

                        <div class="info-geral">
                            <div class="info">
                                <div class="fone">
                                    <label>Telefone</label>
                                    <p>(11) 99999-9999</p>
                                </div>
                                <div class="cpf">
                                    <label>CPF</label>
                                    <p>111.111.111-11</p>
                                </div>
                            </div>
                            <div class="cadastrado">
                                <div class="email">
                                    <label>Email</label>
                                    <p>joaosilva@gmail.com</p>
                                </div>
                                <div class="senha">
                                    <label>Senha</label>
                                    <p>joao123</p>
                                </div>
                            </div>
                            <div class="localizacao">
                                <div class="cep">
                                    <label>CEP</label>
                                    <p>11111-111</p>
                                </div>

                                <div class="cid-est">
                                    <div class="cidade">
                                        <label>Cidade</label>
                                        <p>São Caetano do Sul</p>
                                    </div>
                                    <div class="estado">
                                        <label>Estado</label>
                                        <p>SP</p>
                                    </div>
                                </div>
                                <div class="complemento">
                                    <div class="bairro">
                                        <label>Bairro</label>
                                        <p>Santa Maria</p>
                                    </div>
                                    <div class="numero">
                                        <label>Número</label>
                                        <p>45</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>