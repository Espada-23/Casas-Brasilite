<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Produtos</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    $pagina = "produtos";
    require_once("../partials/sidebar.php");
    ?>

    <div class="content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="menu-toggle" class="menu-btn">
                    <i class="bi bi-list"></i>
                </label>
                <div class="header-left">
                    <h1>Produtos</h1>
                    <p>Gerencie e acompanhe os produtos do estoque</p>
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
                        <h1>Produtos</h1>
                        <p>6 produtos cadastrados</p>
                    </div>
                    <a href="cadastro_produtos.php">
                        <i class="bi bi-plus-lg"></i> Novo Produto
                    </a>
                </div>

                <div class="main-filtro">
                    <div class="barra-pesquisa">
                        <button>
                            <i class="bi bi-search"></i>
                        </button>
                        <input type="text" name="pesquisa" placeholder="Buscar Produto...">
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
                    <div class="departamentos">
                        <select>
                            <option>Todos os departamentos</option>
                            <option>Construção</option>
                            <option>Acabamento</option>
                            <option>Estrutura</option>
                        </select>
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
                                        <th>Categoria</th>
                                        <th>Departamento</th>
                                        <th>Marca</th>
                                        <th>Estoque</th>
                                        <th>Preço</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cimento CP II 50kg</td>
                                        <td>CMT001</td>
                                        <td>Cimento</td>
                                        <td>Construção</td>
                                        <td>Votoran</td>
                                        <td class="estoque-produtos">20</td>
                                        <td class="preco-produtos">R$ 35,90</td>
                                        <td class="acao">
                                            <a href="#">Detalhes</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Areia Média 20kg</td>
                                        <td>ARE002</td>
                                        <td>Areia</td>
                                        <td>Construção</td>
                                        <td>Quartzolit</td>
                                        <td class="estoque-produtos">35</td>
                                        <td class="preco-produtos">R$ 18,50</td>
                                        <td class="acao">
                                            <a href="#">Detalhes</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tijolo Cerâmico 8 Furos</td>
                                        <td>TJL003</td>
                                        <td>Tijolos</td>
                                        <td>Construção</td>
                                        <td>Cerâmica União</td>
                                        <td class="estoque-produtos">150</td>
                                        <td class="preco-produtos">R$ 1,29</td>
                                        <td class="acao">
                                            <a href="#">Detalhes</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tinta Acrílica Branco 18L</td>
                                        <td>TNT004</td>
                                        <td>Tinta</td>
                                        <td>Acabamento</td>
                                        <td>Suvinil</td>
                                        <td class="estoque-produtos">12</td>
                                        <td class="preco-produtos">R$ 179,90</td>
                                        <td class="acao">
                                            <a href="#">Detalhes</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ferro CA-50 10mm</td>
                                        <td>FER005</td>
                                        <td>Ferragem</td>
                                        <td>Estrutura</td>
                                        <td>Gerdau</td>
                                        <td class="estoque-produtos">40</td>
                                        <td class="preco-produtos">R$ 54,90</td>
                                        <td class="acao">
                                            <a href="#">Detalhes</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Argamassa AC-II 20kg</td>
                                        <td>ARG006</td>
                                        <td>Argamassa</td>
                                        <td>Acabamento</td>
                                        <td>Quartzolit</td>
                                        <td class="estoque-produtos">28</td>
                                        <td class="preco-produtos">R$ 29,90</td>
                                        <td class="acao">
                                            <a href="#">Detalhes</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>--</th>
                                        <th>--</th>
                                        <th>--</th>
                                        <th>--</th>
                                        <th>285</th>
                                        <th>R$ 319,49</th>
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