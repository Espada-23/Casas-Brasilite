<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$resultados = [];
$registros_pesquisa = 0;
$mensagem_erro = "";
$mensagem_pesquisa = "";

$id_filtrado = isset($_GET['id_filtrado']) ? (int)$_GET['id_filtrado'] : null;

$stmt = $pdo->query("SELECT SUM(quantidade) as total FROM movimentacao WHERE tipo_movimentacao = 'entrada'");
$entradas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$stmt = $pdo->query("SELECT SUM(quantidade) as total FROM movimentacao WHERE tipo_movimentacao = 'saida'");
$saidas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$stmt = $pdo->query("SELECT COUNT(*) as total FROM movimentacao");
$total_mov = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$saldo = $entradas - $saidas;

$tipo     = $_GET['tipo'] ?? '';
$pesquisa = isset($_POST['pesquisa']) ? trim($_POST['pesquisa']) : ($_GET['pesquisa'] ?? '');

$limite      = 10;
$paginaAtual = isset($_GET['pagina']) ? max(1, (int)$_GET['pagina']) : 1;
$offset      = ($paginaAtual - 1) * $limite;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // if (isset($_POST['pesquisa'])) {
    //     if (empty($pesquisa)) {
    //         $mensagem_erro = "Por favor, digite um nome para realizar a busca.";
    //     } else {
    //         $resultados = $pdo->query(
    //             "SELECT id_produto, nome_produto FROM produto WHERE nome_produto LIKE '%$pesquisa%'"
    //         )->fetchAll(PDO::FETCH_ASSOC);

    //         if (count($resultados) === 0) {
    //             $mensagem_pesquisa = "Nenhum Produto encontrado.";
    //         }
    //         $registros_pesquisa = 1;
    //     }
    // }

    $idEstoque  = isset($_POST['id_estoque']) ? (int)$_POST['id_estoque'] : 0;
    $quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 0;
    $tipoPost   = $_POST['tipo'] ?? '';

    if ($idEstoque > 0 && $quantidade > 0 && in_array($tipoPost, ['entrada', 'saida'])) {
        $pdo->query("
            INSERT INTO movimentacao (idUsuario, idPagamento, idEstoque, tipo_movimentacao, quantidade, data_movimentacao, status_movimentacao)
            VALUES (1, NULL, $idEstoque, '$tipoPost', $quantidade, NOW(), 'concluido')
        ");

        if ($tipoPost === 'entrada') {
            $pdo->query("UPDATE estoque SET quantidade_atual = quantidade_atual + $quantidade WHERE id_estoque = $idEstoque");
        } else {
            $pdo->query("UPDATE estoque SET quantidade_atual = GREATEST(quantidade_atual - $quantidade, 0) WHERE id_estoque = $idEstoque");
        }

        header("Location: movimentacao.php");
        exit;
    }
}

$sqlCount = "SELECT COUNT(*) 
             FROM movimentacao m
             JOIN estoque e ON e.id_estoque = m.idEstoque
             JOIN produto p ON p.id_produto = e.idProduto
             WHERE 1=1";

if (!empty($tipo)) {
    $sqlCount .= " AND m.tipo_movimentacao = '$tipo'";
}
if (!empty($pesquisa)) {
    $sqlCount .= " AND p.nome_produto LIKE '%$pesquisa%'";
}

$totalRegistros = $pdo->query($sqlCount)->fetchColumn();
$totalPaginas   = ceil($totalRegistros / $limite);

$sql = "SELECT 
            m.id_movimentacao,
            p.nome_produto,
            p.id_produto,
            m.quantidade,
            m.tipo_movimentacao,
            m.data_movimentacao
        FROM movimentacao m
        JOIN estoque e ON e.id_estoque = m.idEstoque
        JOIN produto p ON p.id_produto = e.idProduto
        WHERE 1=1";

if (!empty($tipo)) {
    $sql .= " AND m.tipo_movimentacao = '$tipo'";
}
if (!empty($pesquisa)) {
    $sql .= " AND p.nome_produto LIKE '%$pesquisa%'";
}

$sql .= " ORDER BY m.data_movimentacao DESC LIMIT $limite OFFSET $offset";

$movimentacoes = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Movimentação de Produtos</title>
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/movimentacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "movimentacao";
    require_once("../partials/sidebar.php");
    ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn"><i class="bi bi-list"></i></label>
                <div class="header-left">
                    <h1>Movimentação</h1>
                    <p>Histórico de entradas e saídas</p>
                </div>
            </div>
            <div class="topbar-right">
                <div class="user"><i class="bi bi-person-circle"></i>
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
                                <div class="kpi-icon entrada"><i class="bi bi-arrow-down-circle-fill"></i></div>
                                <div>
                                    <div class="kpi-label">Total de Entradas</div>
                                    <small>Movimentações</small>
                                </div>
                            </div>
                        </div>
                        <div class="kpi-valor"><?= $entradas ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon saida"><i class="bi bi-arrow-up-circle-fill"></i></div>
                                <div>
                                    <div class="kpi-label">Total de Saídas</div>
                                    <small>Movimentações</small>
                                </div>
                            </div>
                        </div>
                        <div class="kpi-valor"><?= $saidas ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon saldo"><i class="bi bi-arrow-left-right"></i></div>
                                <div>
                                    <div class="kpi-label">Movimentações</div>
                                    <small>Total geral</small>
                                </div>
                            </div>
                        </div>
                        <div class="kpi-valor"><?= $total_mov ?></div>
                    </div>
                </div>

                <div class="main-filtro">
                    <form method="POST" action="movimentacao.php" autocomplete="off" style="width: 100%;">
                        <div class="barra-pesquisa">
                            <button type="submit"><i class="bi bi-search"></i></button>
                            <input type="text" name="pesquisa" placeholder="Digite o Nome do Produto que deseja verificar ..." value="<?= htmlspecialchars($pesquisa) ?>">
                        </div>
                    </form>

                    <form method="GET" action="movimentacao.php">
                        <input type="hidden" name="pesquisa" value="<?= htmlspecialchars($pesquisa) ?>">
                        <div class="status">
                            <select name="tipo" onchange="this.form.submit()">
                                <option value="">Todos os Tipos</option>
                                <option value="entrada" <?= $tipo == 'entrada' ? 'selected' : '' ?>>Entrada</option>
                                <option value="saida" <?= $tipo == 'saida' ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </form>
                </div>
                <?php if (empty($movimentacoes)): ?>
                                <div class="item-resultado sem-resultado">
                                    <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                                    Nenhum resultado encontrado.
                                </div>
                            <?php elseif (strlen($pesquisa) === 0): ?>
                                <div class="item-resultado sem-resultado">
                                    <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                                    Por favor, digite um nome para realizar a busca.
                                </div> 
                            <?php endif; ?>

                <?php if (!empty($mensagem_erro)): ?>
                    <div style="color: #ef4444; padding: 10px 0; font-size: 14px;"><i class="bi bi-exclamation-triangle"></i> <?= $mensagem_erro ?></div>
                <?php endif; ?>

                <?php if ($registros_pesquisa == 1): ?>
                    <div class="main-resultados">
                        <div class="resultados-busca">
                            <?php if (!empty($resultados)):
                                foreach ($resultados as $res): ?>
                                    <div class="item-resultado">
                                        <div class="info-resultado">
                                            <a href="movimentacao.php?id_filtrado=<?= $res['id_produto']; ?>&pesquisa=<?= urlencode($res['nome_produto']) ?>" class="link-resultado">
                                                <span class="resultado">
                                                    <i class="bi bi-box-seam"></i>
                                                    <span class="nome-resultado"><?= htmlspecialchars($res['nome_produto']); ?></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                                    <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                                    <?= htmlspecialchars($mensagem_pesquisa); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="container-tabela-produto">
                    <div class="tabela-wrapper">
                        <div class="tabela">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Produto</th>
                                        <th>Qnt</th>
                                        <th>Data/Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $linhasExibidas = 0;
                                    if (count($movimentacoes) > 0) {
                                        foreach ($movimentacoes as $mov) {
                                            if ($id_filtrado !== null && $mov['id_produto'] != $id_filtrado) {
                                                continue;
                                            }
                                            $linhasExibidas++;

                                            $classe = ($mov['tipo_movimentacao'] === 'entrada') ? 'tp-entrada' : 'tp-saida';
                                            $icone = ($mov['tipo_movimentacao'] === 'entrada') ? 'bi-arrow-down-short' : 'bi-arrow-up-short';

                                            echo '
                                            <tr>
                                                <td>' . $mov['id_movimentacao'] . '</td>
                                                <td class="tipo ' . $classe . '">
                                                    <i class="bi ' . $icone . '"></i>
                                                    <p>' . ucfirst($mov['tipo_movimentacao']) . '</p>
                                                </td>
                                                <td>' . htmlspecialchars($mov['nome_produto']) . '</td>
                                                <td>' . $mov['quantidade'] . '</td>
                                                <td class="data">' . $mov['data_movimentacao'] . '</td>
                                            </tr>';
                                        }
                                    }

                                    if ($linhasExibidas === 0) {
                                        echo '<tr><td colspan="5" style="text-align:center;">Nenhum resultado encontrado para este filtro.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="paginacao">
                                <div class="seta">
                                    <?php if ($paginaAtual > 1): ?>
                                        <a class="seta" href="?pagina=<?= $paginaAtual - 1 ?>&tipo=<?= urlencode($tipo) ?>&pesquisa=<?= urlencode($pesquisa) ?><?= $id_filtrado ? '&id_filtrado=' . $id_filtrado : '' ?>">
                                            <i class="bi bi-arrow-left"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <div class="box-num">
                                    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                        <a href="?pagina=<?= $i ?>&tipo=<?= urlencode($tipo) ?>&pesquisa=<?= urlencode($pesquisa) ?><?= $id_filtrado ? '&id_filtrado=' . $id_filtrado : '' ?>" class="<?= $i == $paginaAtual ? 'ativo' : ''; ?>">
                                            <?= $i; ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>

                                <div class="seta">
                                    <?php if ($paginaAtual < $totalPaginas): ?>
                                        <a class="seta" href="?pagina=<?= $paginaAtual + 1 ?>&tipo=<?= urlencode($tipo) ?>&pesquisa=<?= urlencode($pesquisa) ?><?= $id_filtrado ? '&id_filtrado=' . $id_filtrado : '' ?>">
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>
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