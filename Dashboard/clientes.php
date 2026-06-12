<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$hoje         = date('Y-m-d');
$estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : '';
$busca        = $_GET['busca'] ?? '';
$busca        = trim($busca);
if ($busca === '') {
    unset($_GET['busca']);
}
$id_filtrado = !empty($_GET['id_filtrado']) ? (int)$_GET['id_filtrado'] : null;

$limite      = 6;
$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($paginaAtual < 1) {
    $paginaAtual = 1;
}
$offset = ($paginaAtual - 1) * $limite;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_apagar'])) {
        $id_para_deletar = (int)$_POST['id_apagar'];
        delete($pdo, 'usuario', 'id_usuario="' . $id_para_deletar . '"');
        header("Location: clientes.php");
        exit;
    }
}

$where = "WHERE 1=1";

if (!empty($estadoFiltro)) {
    $where .= " AND estado = '$estadoFiltro'";
}

if (!empty($busca)) {
    $where .= " AND (nome LIKE '%$busca%'
                OR email LIKE '%$busca%'
                OR cpf LIKE '%$busca%'
                OR telefone LIKE '%$busca%'
                OR cep LIKE '%$busca%')";
}

if (!empty($id_filtrado)) {
    $where .= " AND id_usuario = $id_filtrado";
}

$totalRegistros = $pdo->query("
    SELECT COUNT(*) AS total
    FROM usuario
    $where
")->fetch(PDO::FETCH_ASSOC)['total'];

$totalPaginas = max(1, ceil($totalRegistros / $limite));
if ($paginaAtual > $totalPaginas) {
    $paginaAtual = $totalPaginas;
}
$offset = ($paginaAtual - 1) * $limite;

$cadastrados = $pdo->query("
    SELECT *
    FROM usuario
    $where
    ORDER BY id_usuario DESC
    LIMIT $limite OFFSET $offset
")->fetchAll(PDO::FETCH_ASSOC);

$queryBase = http_build_query([
    'busca'       => $busca,
    'id_filtrado' => $id_filtrado
]);

$totalClientes = $pdo->query("SELECT COUNT(*) AS total FROM usuario")->fetch(PDO::FETCH_ASSOC)['total'];

$novos_dia = $pdo->query("
    SELECT COUNT(*) AS total FROM usuario WHERE DATE(data_cadastro) = '$hoje'
")->fetch(PDO::FETCH_ASSOC)['total'];

$novos_mes = $pdo->query("
    SELECT COUNT(*) AS total 
    FROM usuario 
    WHERE data_cadastro >= NOW() - INTERVAL 1 MONTH
")->fetch(PDO::FETCH_ASSOC)['total'];

$estadosDisponiveis = $pdo->query("
    SELECT DISTINCT estado FROM usuario 
    WHERE estado IS NOT NULL AND estado != '' 
    ORDER BY estado ASC
")->fetchAll(PDO::FETCH_COLUMN);

$queryBase = http_build_query([
    'busca'       => $busca,
    'id_filtrado' => $id_filtrado,
    'estado'      => $estadoFiltro
]);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Clientes</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/clientes.css?v=3">
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
                    <form method="GET" action="clientes.php" class="form-filtro-pesquisa">
                        <div class="barra-pesquisa">
                            <i class="bi bi-search"></i>

                            <input
                                type="text"
                                name="busca"
                                value="<?= htmlspecialchars($busca) ?>"
                                placeholder="Buscar Produto...">
                        </div>
                    </form>

                    <?php if (empty($cadastrados)): ?>
                        <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                            <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                            Nenhum cliente encontrado.
                        </div>
                        


                     <?php elseif (empty($pesquisa)):?> 
                        <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                            <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                            Por favor, digite um nome para realizar a busca.
                        </div>      <?php endif; ?> 

                    <form method="GET" action="clientes.php">
                        <?php if (!empty($busca)): ?>
                            <input type="hidden" name="busca" value="<?= htmlspecialchars($busca) ?>">
                        <?php endif; ?>
                        <?php if ($id_filtrado > 0): ?>
                            <input type="hidden" name="id_filtrado" value="<?= htmlspecialchars($id_filtrado) ?>">
                        <?php endif; ?>
                        <select name="estado" onchange="this.form.submit()">
                            <option value="">Todos os Estados</option>

                            <option value="AC" <?= $estadoFiltro == 'AC' ? 'selected' : '' ?>>Acre (AC)</option>
                            <option value="AL" <?= $estadoFiltro == 'AL' ? 'selected' : '' ?>>Alagoas (AL)</option>
                            <option value="AP" <?= $estadoFiltro == 'AP' ? 'selected' : '' ?>>Amapá (AP)</option>
                            <option value="AM" <?= $estadoFiltro == 'AM' ? 'selected' : '' ?>>Amazonas (AM)</option>
                            <option value="BA" <?= $estadoFiltro == 'BA' ? 'selected' : '' ?>>Bahia (BA)</option>
                            <option value="CE" <?= $estadoFiltro == 'CE' ? 'selected' : '' ?>>Ceará (CE)</option>
                            <option value="DF" <?= $estadoFiltro == 'DF' ? 'selected' : '' ?>>Distrito Federal (DF)</option>
                            <option value="ES" <?= $estadoFiltro == 'ES' ? 'selected' : '' ?>>Espírito Santo (ES)</option>
                            <option value="GO" <?= $estadoFiltro == 'GO' ? 'selected' : '' ?>>Goiás (GO)</option>
                            <option value="MA" <?= $estadoFiltro == 'MA' ? 'selected' : '' ?>>Maranhão (MA)</option>
                            <option value="MT" <?= $estadoFiltro == 'MT' ? 'selected' : '' ?>>Mato Grosso (MT)</option>
                            <option value="MS" <?= $estadoFiltro == 'MS' ? 'selected' : '' ?>>Mato Grosso do Sul (MS)</option>
                            <option value="MG" <?= $estadoFiltro == 'MG' ? 'selected' : '' ?>>Minas Gerais (MG)</option>
                            <option value="PA" <?= $estadoFiltro == 'PA' ? 'selected' : '' ?>>Pará (PA)</option>
                            <option value="PB" <?= $estadoFiltro == 'PB' ? 'selected' : '' ?>>Paraíba (PB)</option>
                            <option value="PR" <?= $estadoFiltro == 'PR' ? 'selected' : '' ?>>Paraná (PR)</option>
                            <option value="PE" <?= $estadoFiltro == 'PE' ? 'selected' : '' ?>>Pernambuco (PE)</option>
                            <option value="PI" <?= $estadoFiltro == 'PI' ? 'selected' : '' ?>>Piauí (PI)</option>
                            <option value="RJ" <?= $estadoFiltro == 'RJ' ? 'selected' : '' ?>>Rio de Janeiro (RJ)</option>
                            <option value="RN" <?= $estadoFiltro == 'RN' ? 'selected' : '' ?>>Rio Grande do Norte (RN)</option>
                            <option value="RS" <?= $estadoFiltro == 'RS' ? 'selected' : '' ?>>Rio Grande do Sul (RS)</option>
                            <option value="RO" <?= $estadoFiltro == 'RO' ? 'selected' : '' ?>>Rondônia (RO)</option>
                            <option value="RR" <?= $estadoFiltro == 'RR' ? 'selected' : '' ?>>Roraima (RR)</option>
                            <option value="SC" <?= $estadoFiltro == 'SC' ? 'selected' : '' ?>>Santa Catarina (SC)</option>
                            <option value="SP" <?= $estadoFiltro == 'SP' ? 'selected' : '' ?>>São Paulo (SP)</option>
                            <option value="SE" <?= $estadoFiltro == 'SE' ? 'selected' : '' ?>>Sergipe (SE)</option>
                            <option value="TO" <?= $estadoFiltro == 'TO' ? 'selected' : '' ?>>Tocantins (TO)</option>
                        </select>
                    </form>
                </div>


                <div class="grid-clientes" style="margin-top: 2em;">
                    <?php foreach ($cadastrados as $usuario) {
                        $id_filtrado = isset($_GET['id_filtrado']) ? $_GET['id_filtrado'] : null;
                        if ($id_filtrado !== null) {
                            if ($usuario['id_usuario'] != $id_filtrado) {
                                continue;
                            }
                        }
                    ?>
                        <div class="card-cliente">
                            <div class="perfil">
                                <div class="nome">
                                    <p><?= ($usuario['nome'] != 'NULL') ? htmlspecialchars($usuario['nome']) : 'NULL';  ?></p>
                                    <form method="POST" action="clientes.php" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');" style="display: inline;">
                                        <input type="hidden" name="action" value="deletar_usuario">
                                        <input type="hidden" name="id_apagar" value="<?= $usuario['id_usuario']; ?>">

                                        <button type="submit" style="background-color: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 12px;">
                                            Deletar
                                        </button>
                                    </form>
                                    <span>Pessoa Física</span>
                                </div>
                            </div>

                            <div class="info-geral">
                                <div class="info">
                                    <div class="fone">
                                        <label>Telefone</label>
                                        <p><?= htmlspecialchars($usuario['telefone']); ?></p>
                                    </div>
                                    <div class="cpf">
                                        <label>CPF</label>
                                        <p><?= htmlspecialchars($usuario['cpf']); ?></p>
                                    </div>
                                </div>
                                <div class="cadastrado">
                                    <div class="email">
                                        <label>Email</label>
                                        <p><?= htmlspecialchars($usuario['email']); ?></p>
                                    </div>
                                    <div class="senha">
                                        <label>Senha</label>
                                        <p>Protegida por Hash</p>
                                    </div>
                                </div>
                                <div class="localizacao">
                                    <div class="cep">
                                        <label>CEP</label>
                                        <p><?= htmlspecialchars($usuario['cep']); ?></p>
                                    </div>

                                    <div class="cid-est">
                                        <div class="cidade">
                                            <label>Cidade</label>
                                            <p><?= htmlspecialchars($usuario['cidade']); ?></p>
                                        </div>
                                        <div class="estado">
                                            <label>Estado</label>
                                            <p><?= htmlspecialchars($usuario['estado']); ?></p>
                                        </div>
                                    </div>
                                    <div class="complemento">
                                        <div class="bairro">
                                            <label>Bairro</label>
                                            <p><?php $bairro_limpo = trim($usuario['bairro']);
                                                $bairro_minusculo = strtolower($bairro_limpo);
                                                echo (empty($bairro_limpo) || $bairro_minusculo === 'null' || strlen($bairro_limpo) === 0 ? 'Não informado' : htmlspecialchars($bairro_limpo)); ?></p>
                                        </div>
                                        <div class="numero">
                                            <label>Número</label>
                                            <p><?= htmlspecialchars($usuario['numero']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
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
                            <a href="?pagina=<?= $i ?>&<?= $queryBase ?>" class="<?php echo $i == $paginaAtual ? 'ativo' : ''; ?>">
                                <?php echo $i; ?>
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

            </div>
        </main>
    </div>
</body>

</html>