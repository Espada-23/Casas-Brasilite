<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

// total de entradas e saidas
$stmt = $pdo->query("
    SELECT SUN(quantidade) as total
    FROM movimentacao
    WHERE tipo_movimentacao = 'entrada'
");

$entradas = $stmt->fetch(PDO::FETCH_ASSOC) ['total'] ?? 0;

$stmt = $pdo->query("
    SELECT SUN(quantidade) as total
    FROM movimentacao
    WHERE tipo_movimentacao = 'saida'
");

$saidas = $stmt->fetch(PDO::FETCH_ASSOC) ['total'] ?? 0;

$stmt = $pdo->query("
    SELECT COUNT(*) as total
    FROM movimentacao
");
$total_mov = $stmt

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = $_POST['produto_id'];
    $quantidade = (int)
    $_POST['quantidade'];
    $tipo = $_POST['tipo'];
    $responsavel = $_POST['responsavel'];

    $stmt = $pdo->query("
        INSERT INTO movimentacoes
         (prduto_id, quantidade, tipo, responsavel, data_movimentacao) 
         VALUES ($produto_id, $quantidade, '$tipo', '$responsavel', NOW())
    ");

    if ($tipo === 'entrada') {
        $pdo->query("
        UPDATE produto
        SET quantidade_atual = quantidade_atual + $quantidade
        WHERE id = $produto_id
        ");
    } else {
        $pdo->query("
        UPDATE produto
        SET quantidade_atual = quantidade_atual - $quantidade
        WHERE id = $produto_id
        ");
    }
}


$stmt = $pdo->query("
    SELECT
        m.id_movimentacao,
        m.tipo_movimentacao,
        m.quantidade,
        m.data_movimentacao,
        p.nome_produto
    FROM movimentacao m
    JOIN estoque e ON m.idEstoque = e.id_estoque
    JOIN produto p ON e.idProduto = p.id_produto
    ORDER BY m.data_movimentacao DESC
");

$movimentacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Produto</th>
                                        <th>Qnt</th>
                                        <th>Data/Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($movimentacoes as $mov) {

                                        if ($mov['tipo_movimentacao'] === 'entrada') {
                                            $classe = 'tp-entrada';
                                        } else {
                                            $classe = 'tp-saida';
                                        }

                                            echo '
                                                <tr>
                                                    <td>'. $mov['id_movimentacao'] .'</td>

                                                    <td class="tipo '. $classe .'">
                                                        <i class="bi bi-arrow-down-short"></i>
                                                        <p>'. $mov['tipo_movimentacao'] .'</p>
                                                    </td>

                                                    <td>'. $mov['nome_produto'] .'</td>
                                                    <td>'. $mov['quantidade'] .'</td>
                                                    <td class="data">'. $mov['data_movimentacao'] .'</span></td>
                                                </tr>
                                            ';
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