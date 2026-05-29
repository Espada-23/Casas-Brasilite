<?php

require_once '../Crud/init.php';
require_once '../Crud/data.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['acao']) && $_POST['acao'] === 'entrada') {

        $novo = [
            'id' => !empty($_SESSION['estoque'])
                ? max(array_column($_SESSION['estoque'], 'id')) + 1
                : 1,

            'nome_produto' => trim($_POST['nome'] ?? ''),
            'categoria' => $_POST['categoria'] ?? '',
            'quantidade' => (int)($_POST['entrada'] ?? 0),
            'preco' => (float)($_POST['preco_unitario'] ?? 0),
            'imagem' => trim($_POST['imagem'] ?? '')
        ];

        if (
            !empty($novo['nome_produto']) &&
            in_array($novo['categoria'], ['Bruto', 'Ferramentas', 'Acabamento']) &&
            $novo['quantidade'] >= 0 &&
            $novo['preco'] > 0
        ) {
            $_SESSION['estoque'][] = $novo;
        }
    }
}

if (isset($_POST['acao']) && $_POST['acao'] === 'movimentar') {
    $id = (int)($_POST['id'] ?? 0);
    $quantidade_mov = (int)($_POST['quantidade_mov'] ?? 1);
    $tipo = $_POST['tipo'] ?? '';

    foreach ($_SESSION['estoque'] as &$item) {
        if ($item['id'] === $id) {
            if ($tipo === '+') {
                $item['quantidade'] += $quantidade_mov;
            } elseif ($tipo === '-') {
                $item['quantidade'] = max(0, $item['quantidade'] - $quantidade_mov);
            }
            break;
        }
    }
}

if (isset($_POST['acao']) && $_POST['acao'] === 'excluir') {
    $id = (int)($_POST['id'] ?? 0);
    $_SESSION['estoque'] = array_filter($_SESSION['estoque'], fn($i) => $i['id'] !== $id);
    $_SESSION['estoque'] = array_values($_SESSION['estoque']);
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Estoque</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/estoque.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "estoque";
    require_once("../partials/sidebar.php");
    ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn">
                    <i class="bi bi-list"></i>
                </label>
                <div class="header-left">
                    <h1>Estoque</h1>
                    <p>Visualize e controle o estoque de produtos</p>
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
                        <h1>Estoque</h1>
                        <p>Situação atual dos produtos</p>
                    </div>
                    <a href="#">
                        <i class="bi bi-plus-lg"></i> Nova Entrada
                    </a>
                </div>

                <div class="cards-status">
                    <div class="normal">
                        <i class="bi bi-check-circle-fill"></i>
                        <p>3 Normal</p>
                    </div>
                    <div class="atencao">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <p>1 Atenção</p>
                    </div>
                    <div class="critico">
                        <i class="bi bi-x-circle-fill"></i>
                        <p>2 Críticos</p>
                    </div>
                </div>

                <div class="main-filtro">
                    <div class="barra-pesquisa">
                        <button>
                            <i class="bi bi-search"></i>
                        </button>
                        <input type="text" name="pesquisa" placeholder="Buscar Produto...">
                    </div>
                    <div class="selects">
                        <div class="status">
                            <select>
                                <option>Todos os status</option>
                                <option>Normal</option>
                                <option>Crítico</option>
                                <option>Atenção</option>
                            </select>
                        </div>
                        <div class="categorias">
                            <select>
                                <option>Todas as caetgorias</option>
                                <option>Cimento</option>
                                <option>Areia</option>
                                <option>Tinta</option>
                                <option>Argamassa</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="container-tabela-produto">
                    <div class="tabela-wrapper">
                        <div class="tabela">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>SKU</th>
                                        <th>Localização</th>
                                        <th>Qtd. Atual</th>
                                        <th>Qtd. Pct</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cimento CP II 50kg</td>
                                        <td>CMT001</td>
                                        <td>Corredor A1</td>
                                        <td class="estoque-produtos">20</td>
                                        <td class="embalagens">15</td>
                                        <td><span class="badge badge-ok">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Areia Média 20kg</td>
                                        <td>ARE002</td>
                                        <td>Corredor A1</td>
                                        <td class="estoque-produtos">35</td>
                                        <td class="embalagens">20</td>
                                        <td><span class="badge badge-ok">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tijolo Cerâmico 8 Furos</td>
                                        <td>TJL003</td>
                                        <td>Corredor A1</td>
                                        <td class="estoque-produtos">150</td>
                                        <td class="embalagens">50</td>
                                        <td><span class="badge badge-ok">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tinta Acrílica Branco 18L</td>
                                        <td>TNT004</td>
                                        <td>Corredor A1</td>
                                        <td class="estoque-produtos" style="color:var(--red);">5</td>
                                        <td class="embalagens">10</td>
                                        <td><span class="badge badge-critico">Crítico</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ferro CA-50 10mm</td>
                                        <td>FER005</td>
                                        <td>Corredor A1</td>
                                        <td class="estoque-produtos">40</td>
                                        <td class="embalagens">20</td>
                                        <td><span class="badge badge-ok">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Argamassa AC-II 20kg</td>
                                        <td>ARG006</td>
                                        <td>Corredor A1</td>
                                        <td class="estoque-produtos" style="color:var(--orange);">12</td>
                                        <td class="embalagens">15</td>
                                        <td><span class="badge badge-atencao">Atenção</span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>--</th>
                                        <th>--</th>
                                        <th class="estoque-produtos" style="color: white;">262</th>
                                        <th class="embalagens">115</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>