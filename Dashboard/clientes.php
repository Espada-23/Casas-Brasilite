<?php

require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$cadastrados = readAll($pdo, 'usuario');

$hoje = date('Y-m-d');

$resultados = [];
$registros_pesquisa = 0;

$mensagem_erro = "";

$novos_dia = (read($pdo, 'usuario', '*', 'data_cadastro = '.$hoje) == 0) ? '0' : read($pdo, 'usuario', '*', 'data_cadastro = '.$hoje);

$novos_mes = count(read($pdo, 'usuario', '*', 'data_cadastro >= NOW() - INTERVAL 1 MONTH'));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesquisa = $_POST['pesquisa'];

    if (empty(trim($pesquisa))) {
        $mensagem_erro = "Por favor, digite um nome ou e-mail para realizar a busca."; 
    } else {
        $registros = read($pdo, 'usuario', '*', "nome LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%'");
        
        if (count($registros) > 0) {
            foreach ($registros as $usuario => $value) {
                $resultados[$usuario] = is_array($value) ? $value['nome'] : $registros['nome'];
            }
        } else {
            $mensagem_pesquisa = "Nenhum usuário encontrado.";
        }

        $registros_pesquisa = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Clientes</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/clientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "clientes";
    require_once("../partials/sidebar.php");
    ?>

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
                        </div>
                        <div class="kpi-valor"><?= count($cadastrados) ?></div>
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
                                + <?= $novos_dia; ?> hoje
                            </span>
                        </div>
                        <div class="kpi-valor"><?= $novos_mes; ?></div>
                    </div>
                </div>

                <div class="main-filtro">
                    <div class="barra-pesquisa">
                        <form method="POST"  action="clientes.php">
                            <button type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                            <input type="text" name="pesquisa" placeholder="<?php echo ((isset($mensagem_erro) && $mensagem_erro != '') ? $mensagem_erro : 'Buscar Cliente...'); $mensagem_erro = '';?>">
                        </form>
                    </div>
                    <div>
                        <p>Olá</p>
                    </div>
                </div>

                <div class="grid-clientes">
                    <?php
                    
                    foreach ($cadastrados as $usuario) {
                    ?>
                        <div class="card-cliente">
                            <div class="perfil">
                                <div class="nome">
                                    <p><?=  htmlspecialchars($usuario['nome']);  ?></p>
                                    <span>Pessoa Física</span>
                                </div>
                            </div>

                            <div class="info-geral">
                                <div class="info">
                                    <div class="fone">
                                        <label><?= var_dump($resultados); ?></label>
                                        <p><?= htmlspecialchars($usuario['telefone']); ?></p>
                                    </div>
                                    <div class="cpf">
                                        <label>CPF</label>
                                        <p><?=  htmlspecialchars($usuario['cpf']); ?></p>
                                    </div>
                                </div>
                                <div class="cadastrado">
                                    <div class="email">
                                        <label>Email</label>
                                        <p><?=  htmlspecialchars($usuario['email']); ?></p>
                                    </div>
                                    <div class="senha">
                                        <label>Senha</label>
                                        <p style="font-size: 11px; max-width: 150px; overflow: hidden; text-overflow: ellipsis;"><?= htmlspecialchars(($usuario['senha'])) ?></p>
                                    </div>
                                </div>
                                <div class="localizacao">
                                    <div class="cep">
                                        <label>CEP</label>
                                        <p><?=  htmlspecialchars($usuario['cep']); ?></p>
                                    </div>

                                    <div class="cid-est">
                                        <div class="cidade">
                                            <label>Cidade</label>
                                            <p><?= htmlspecialchars($usuario['cidade']); ?></p>
                                        </div>
                                        <div class="estado">
                                            <label>Estado</label>
                                            <p><?=  htmlspecialchars($usuario['estado']); ?></p>
                                        </div>
                                    </div>
                                    <div class="complemento">
                                        <div class="bairro">
                                            <label>Bairro</label>
                                            <p><?=  htmlspecialchars($usuario['bairro']); ?></p>
                                        </div>
                                        <div class="numero">
                                            <label>Número</label>
                                            <p><?=  htmlspecialchars($usuario['numero']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </main>
    </div>
</body>

</html>