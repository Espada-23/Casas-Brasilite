<?php 
require_once '../Crud/crud.php';

$acao = $_GET['acao'] ?? 'listar';
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados_produto = [
        'idCategoria'       => $_POST['idCategoria'],
        'sku'               => $_POST['sku'],
        'nome_produto'      => $_POST['nome_produto'],
        'preco_unitario'    => $_POST['preco_unitario'],
        'marca'             => $_POST['marca'] ?? null,
        'descricao_produto' => $_POST['descricao_produto'] ?? null
    ];

    if ($acao === 'salvar_novo') {
        $id_produto_novo = create($pdo, 'produto', $dados_produto);

        $quantidade_inicial = $_POST['quantidade'] ?? 1;
        $dados_estoque = [
            'idProduto' => $id_produto_novo,
            'quantidade_atual' => $quantidade_inicial,
            'estoque_minimo' => 1,
            'status_estoque' => 'disponivel'
        ];
        create($pdo, 'estoque', $dados_estoque);

        header('Location: produtos.php?mensagem=Criado e adicionado ao estoque com sucesso');
        exit;
    }

    if ($acao === 'salvar_edicao' && $id) {
        update($pdo, 'produto', $dados_produto, "id_produto = " . (int)$id);
        
        $nova_quantidade = $_POST['quantidade'] ?? 0;
        $dados_estoque = [
            'quantidade_atual' => $nova_quantidade
        ];
        update($pdo, 'estoque', $dados_estoque, "idProduto = " . (int)$id);
        
        header('Location: produtos.php?mensagem=Editado com sucesso');
        exit;
    }
}

if ($acao === 'excluir' && $id) {
    delete($pdo, 'produto', "id_produto = " . (int)$id);
    header('Location: produtos.php?mensagem=Excluido com sucesso');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Produtos - Casas Brasilite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
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

    <?php if (isset($_GET['mensagem'])): ?>
        <p style="color: green; font-weight: bold; padding: 10px; border: 1px solid green; background: #e8f5e9;"> 
            <?= htmlspecialchars($_GET['mensagem']) ?> 
        </p>
    <?php endif; ?>z

    <hr>

    <?php
    if ($acao === 'listar'):
        $sql = "SELECT p.*, e.quantidade_atual 
                FROM produto p 
                LEFT JOIN estoque e ON p.id_produto = e.idProduto";
        $stmt = $pdo->query($sql);
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <a href="?acao=novo" class="btn">Adicionar Novo Produto <i class="bi bi-plus-lg"></i></a>
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
                            <option>Todas as categorias</option>
                            <option>Cimento</option>
                            <option>Areia</option>
                            <option>Tinta</option>
                            <option>Argamassa</option>
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
                                        <th>SKU</th>
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th class="preco-produtos">Preço</th>
                                        <th>Descrição</th>
                                        <th class="estoque-produtos">Quantidade em estoque</th>
                                        <th class="acao">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produtos as $p): ?>
                                    <tr>
                                        <td><?= $p['id_produto'] ?></td>
                                        <td><?= htmlspecialchars($p['sku']) ?></td>
                                        <td><?= htmlspecialchars($p['nome_produto']) ?></td>
                                        <td><?= htmlspecialchars($p['marca']) ?></td>
                                        <td><?= number_format($p['preco_unitario'], 2, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($p['descricao_produto']) ?></td>
                                        <td><?= number_format($p['quantidade_atual']) ?></td>
                                        <td>
                                            <a href="?acao=editar&id=<?= $p['id_produto'] ?>" class="btn">Editar</a>
                                            <a href="?acao=excluir&id=<?= $p['id_produto'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php
    elseif ($acao === 'novo' || $acao === 'editar'):
        $produto = null;
        $url_post = "?acao=salvar_novo";
        
        if ($acao === 'editar' && $id) {
            $produto = read($pdo, 'produto', '*', "id_produto = " . (int)$id);
            
            $estoque_atual = read($pdo, 'estoque', 'quantidade_atual', "idProduto = " . (int)$id);
            $produto['quantidade'] = $estoque_atual ? $estoque_atual['quantidade_atual'] : 0;
            
            $url_post = "?acao=salvar_edicao&id=" . (int)$id;
        }
    ?>
        <a href="?acao=listar" class="btn">Voltar para a Lista</a>
        
        <h2><?= $acao === 'novo' ? 'Cadastrar Novo Produto' : 'Editar Produto' ?></h2>

        <form action="<?= $url_post ?>" method="POST">
            <div class="form-group">
                <label>ID Categoria (Ex: 1 para Construção):</label>
                <input type="number" name="idCategoria" value="<?= $produto['idCategoria'] ?? '1' ?>" required>
            </div>

            <div class="form-group">
                <label>SKU (Código Único):</label>
                <input type="text" name="sku" value="<?= $produto['sku'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="nome_produto" value="<?= $produto['nome_produto'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label>Marca:</label>
                <input type="text" name="marca" value="<?= $produto['marca'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label>Preço Unitário (R$):</label>
                <input type="number" step="0.01" name="preco_unitario" value="<?= $produto['preco_unitario'] ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label>Quantidade em Estoque (Quantas unidades?):</label>
                <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?? '1' ?>" min="0" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="descricao_produto" value="<?= $produto['descricao_produto'] ?? '' ?>">
            </div>

            <button type="submit" class="btn" style="background: #28A745; font-size: 16px; padding: 10px 20px;">
                <?= $acao === 'novo' ? 'Salvar Novo Produto' : 'Atualizar Produto e Estoque' ?>
            </button>
        </form>

    <?php endif; ?>

</body>
</html>