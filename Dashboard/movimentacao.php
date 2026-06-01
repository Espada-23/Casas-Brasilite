<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$stmt = $pdo->query("
    SELECT SUM(quantidade) as total 
    FROM movimentacao 
    WHERE tipo_movimentacao = 'entrada'
");
$entradas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$stmt = $pdo->query("
    SELECT SUM(quantidade) as total 
    FROM movimentacao 
    WHERE tipo_movimentacao = 'saida'
");
$saidas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$stmt = $pdo->query("
    SELECT COUNT(*) as total 
    FROM movimentacao
");
$total_mov = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

$saldo = $entradas - $saidas;

$tipo = $_GET['tipo'] ?? '';
$pesquisa = $_GET['pesquisa'] ?? '';

$sql = "SELECT 
            m.id_movimentacao,
            p.nome_produto,
            m.quantidade,
            m.tipo_movimentacao,
            m.data_movimentacao
        FROM movimentacao m
        JOIN estoque e ON e.id_estoque = m.idEstoque
        JOIN produto p ON p.id_produto = e.idProduto
        WHERE 1=1";

$params = [];

if (!empty($tipo)) {
    $sql .= " AND m.tipo_movimentacao = :tipo";
    $params[':tipo'] = $tipo;
}

if (!empty($pesquisa)) {
    $sql .= " AND p.nome_produto LIKE :pesquisa";
    $params[':pesquisa'] = "%$pesquisa%";
}

$sql .= " ORDER BY m.data_movimentacao DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$movimentacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $produto_id = $_POST['produto_id'];
    $quantidade = (int) $_POST['quantidade'];
    $tipoPost = $_POST['tipo'];
    $responsavel = $_POST['responsavel'];

    $pdo->query("
        INSERT INTO movimentacao
        (idProduto, quantidade, tipo_movimentacao, responsavel, data_movimentacao)
        VALUES ($produto_id, $quantidade, '$tipoPost', '$responsavel', NOW())
    ");

    if ($tipoPost === 'entrada') {
        $pdo->query("
            UPDATE produto
            SET quantidade_atual = quantidade_atual + $quantidade
            WHERE id_produto = $produto_id
        ");
    } else {
        $pdo->query("
            UPDATE produto
            SET quantidade_atual = quantidade_atual - $quantidade
            WHERE id_produto = $produto_id
        ");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Movimentação de Produtos</title>
    <link rel="icon" href="../imagens/logo.png">
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
                        </div>
                        <div class="kpi-valor"><?= $entradas ?></div>
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
                        </div>
                        <div class="kpi-valor"><?= $saidas ?></div>
                    </div>

                    <div class="kpi-card">
                        <div class="kpi-header">
                            <div class="kpi-left">
                                <div class="kpi-icon saldo">
                                    <i class="bi bi-arrow-left-right"></i>
                                </div>
                                <div>
                                    <div class="kpi-label">Movimentações</div>
                                    <small>Entradas - saídas</small>
                                </div>
                            </div>
                        </div>
                        <div class="kpi-valor"><?= $total_mov ?></div>
                    </div>
                </div>

                <div class="main-filtro">
                    <form method="GET" autocomplete="off">
                        <div class="barra-pesquisa">
                            <button type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                            <input type="text" name="pesquisa" placeholder="Digite o Nome do Produto que deseja verificar ..." value="<?= htmlspecialchars($pesquisa) ?>">
                        </div>

                        <div class="status">
                            <select name="tipo" onchange="this.form.submit()">
                                <option value="">Todos os Tipos</option>
                                <option value="entrada" <?= $tipo == 'entrada' ? 'selected' : '' ?>>Entrada</option>
                                <option value="saida" <?= $tipo == 'saida' ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </form>
                </div>

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
                                    if (count($movimentacoes) > 0) {
                                        foreach ($movimentacoes as $mov) {

                                            if ($mov['tipo_movimentacao'] === 'entrada') {
                                                $classe = 'tp-entrada';
                                                $icone = 'bi-arrow-down-short';
                                            } else {
                                                $classe = 'tp-saida';
                                                $icone = 'bi-arrow-up-short';
                                            }

                                            echo '
                                            <tr>
                                                <td>' . $mov['id_movimentacao'] . '</td>

                                                <td class="tipo ' . $classe . '">
                                                    <i class="bi ' . $icone . '"></i>
                                                    <p>' . $mov['tipo_movimentacao'] . '</p>
                                                </td>

                                                <td>' . $mov['nome_produto'] . '</td>
                                                <td>' . $mov['quantidade'] . '</td>
                                                <td class="data">' . $mov['data_movimentacao'] . '</td>
                                            </tr>
                                            ';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5">Nenhum resultado encontrado</td></tr>';
                                    }
                                    ?>
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