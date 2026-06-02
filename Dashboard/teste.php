<?php
require_once '../Crud/crud.php';

$acao = $_GET['acao'] ?? 'listar';
$id = $_GET['id'] ?? null;

$resultados = [];
$registros_pesquisa = 0;

$mensagem_erro = "";

$id_filtrado = isset($_GET['id_filtrado']) ? (int)$_GET['id_filtrado'] : null;
$marca_filtrado = isset($_GET['marca_filtrado']) ? trim($_GET['marca_filtrado']) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pesquisa = isset($_POST['pesquisa']) ? trim($_POST['pesquisa']) : '';

    $id_categoria_selecionada = (isset($_POST['id_categoria']) && $_POST['id_categoria'] !== '') ? $_POST['id_categoria'] : '';

    if (empty($pesquisa)) {
        $mensagem_erro = "Por favor, digite um nome ou e-mail para realizar a busca.";
    } else {
        $registros = readAll($pdo, 'produto', "nome_produto LIKE '%$pesquisa%' OR sku LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%'");

        if (count($registros) > 0) {
            foreach ($registros as $usuario => $value) {
                $resultados[$usuario] = is_array($value) ? $value : $usuario;
            }
        } else {
            $mensagem_pesquisa = "Nenhum Produto encontrado.";
        }

        $registros_pesquisa = 1;
    }

    $dados_produto = [
        'idCategoria'       => $_POST['id_categoria'] ?? '',
        'sku'               => $_POST['sku'] ?? '',
        'nome_produto'      => $_POST['nome_produto'] ?? '',
        'preco_unitario'    => $_POST['preco_unitario'] ?? '',
        'marca'             => $_POST['marca'] ?? null,
        'unidade_medida'    => $_POST['unidade_medida'] ?? 'UN',
        'desconto'          => $_POST['desconto'] ?? 0.00,
        'frete'             => $_POST['frete'] ?? 0.00,
        'status_produto'    => $_POST['status_produto'] ?? 'ativo',
        'descricao_produto' => $_POST['descricao_produto'] ?? null
    ];

    if ($acao === 'salvar_novo') {
        $id_produto_novo = create($pdo, 'produto', $dados_produto);

        $dados_estoque = [
            'idProduto'           => $id_produto_novo,
            'quantidade_atual'    => $_POST['quantidade'] ?? 1,
            'estoque_minimo'      => $_POST['estoque_minimo'] ?? 1,
            'local_armazenamento' => $_POST['local_armazenamento'] ?? null,
            'status_estoque'      => 'disponivel'
        ];
        create($pdo, 'estoque', $dados_estoque);

        if (isset($_FILES['foto_produto']) && $_FILES['foto_produto']['error'] === UPLOAD_ERR_OK) {
            $diretorio_destino = '../uploads/';

            if (!is_dir($diretorio_destino)) {
                mkdir($diretorio_destino, 0777, true);
            }

            $nome_arquivo = time() . '_' . basename($_FILES['foto_produto']['name']);
            $caminho_upload = $diretorio_destino . $nome_arquivo;

            if (move_uploaded_file($_FILES['foto_produto']['tmp_name'], $caminho_upload)) {
                $dados_foto = [
                    'idProduto'        => $id_produto_novo,
                    'caminho_imagem'   => 'uploads/' . $nome_arquivo,
                    'descricao_imagem' => $_POST['descricao_imagem'] ?? null
                ];
                create($pdo, 'foto_produto', $dados_foto);
            }
        }

        header('Location: produtos.php?mensagem=Criado, estocado e imagem adicionada com sucesso');
        exit;
    }

    if ($acao === 'salvar_edicao' && $id) {
        update($pdo, 'produto', $dados_produto, "id_produto = " . (int)$id);

        $dados_estoque = [
            'quantidade_atual'    => $_POST['quantidade'] ?? 0,
            'estoque_minimo'      => $_POST['estoque_minimo'] ?? 1,
            'local_armazenamento' => $_POST['local_armazenamento'] ?? null
        ];
        update($pdo, 'estoque', $dados_estoque, "idProduto = " . (int)$id);

        if (isset($_FILES['foto_produto']) && $_FILES['foto_produto']['error'] === UPLOAD_ERR_OK) {
            $diretorio_destino = '../uploads/';
            if (!is_dir($diretorio_destino)) mkdir($diretorio_destino, 0777, true);

            $nome_arquivo = time() . '_' . basename($_FILES['foto_produto']['name']);
            $caminho_upload = $diretorio_destino . $nome_arquivo;

            if (move_uploaded_file($_FILES['foto_produto']['tmp_name'], $caminho_upload)) {

                $dados_foto = [
                    'idProduto'        => (int)$id,
                    'caminho_imagem'   => 'uploads/' . $nome_arquivo,
                    'descricao_imagem' => $_POST['descricao_imagem'] ?? null
                ];
                create($pdo, 'foto_produto', $dados_foto);
            }
        }

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
    <link rel="stylesheet" href="css/produtos.css?v=1">
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
    <?php endif; ?>

    <hr>

    <?php
    if ($acao === 'listar'):
        $sql = "SELECT p.*, e.quantidade_atual, f.caminho_imagem 
                FROM produto p 
                LEFT JOIN estoque e ON p.id_produto = e.idProduto
                LEFT JOIN foto_produto f ON p.id_produto = f.idProduto
                GROUP BY p.id_produto";
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
                            <p>Gerencie e acompanhe os produtos do estoque</p>
                        <form action="<?= $url_post ?>" method="POST" enctype="multipart/form-data">

                        </div>
                        <i class="bi bi-plus-lg"></i> Adicionar Produto
                        </a>
                    </div>

                    <div class="main-filtro">
                        <div class="barra-pesquisa">
                            <form method="POST" action="produtos.php">
                                <button type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                                <input class="filtro-pesquisa" type="text" name="pesquisa" placeholder="<?php echo ((isset($mensagem_erro) && $mensagem_erro != '') ? $mensagem_erro : 'Buscar Produto...');
                                                                                                        $mensagem_erro = ''; ?>">
                            </form>
                        </div>
                        <div class="categorias">
                            <form action="produtos.php" method="POST">
                                <select name="id_categoria" onchange="this.form.submit()">
                                    <?php
                                    $categorias = readAll($pdo, 'categoria');

                                    // Captura o ID enviado. Se não houver, fica vazio.
                                    $id_categoria_selecionada = $_POST['id_categoria'] ?? '';
                                    ?>

                                    <option value="" <?= $id_categoria_selecionada === '' ? 'selected' : '' ?>>Todas as categorias</option>

                                    <?php foreach ($categorias as $cat): ?>
                                        <option value="<?= $cat['id_categoria'] ?>" <?= (string)$id_categoria_selecionada === (string)$cat['id_categoria'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['nome_categoria']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <?php if ($registros_pesquisa == 1): ?>
                        <div class="main-resultados">
                            <div class="resultados-busca">
                                <?php if (!empty($resultados)):
                                    foreach ($resultados as $res):
                                ?>
                                        <div class="item-resultado">
                                            <div class="info-resultado">
                                                <a href="produtos.php?id_filtrado=<?= $res['id_produto']; ?>" class="link-resultado">
                                                    <span>
                                                        <i class="bi bi-person"></i>
                                                        <span class="nome-resultado"><?= htmlspecialchars($res['nome_produto']); ?></span>
                                                    </span>
                                                    <span>
                                                        <span class="sku-resultado"><?= htmlspecialchars($res['sku']); ?></span>
                                                    </span>
                                                </a>
                                                <a href="produtos.php?marca_filtrado=<?= $res['marca']; ?>" class="link-resultado">
                                                    <span>
                                                        <span class="marca-resultado"><?= htmlspecialchars($res['marca']); ?></span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                            </div>

                        <?php else: ?>
                            <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                                <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                                <?= !empty($mensagem_pesquisa) ? $mensagem_pesquisa : "Nenhum usuário encontrado."; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="container-tabela-produto">
                        <div class="tabela-wrapper">
                            <div class="tabela">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>SKU</th>
                                            <th>Nome</th>
                                            <th>Marca</th>
                                            <th class="preco-produtos">Preço</th>
                                            <th class="estoque-produtos">Qtd. Estoque</th>
                                            <th class="acao">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produtos as $p):
                                            if ($id_filtrado !== null && $p['id_produto'] != $id_filtrado) {
                                                continue;
                                            }

                                            if ($marca_filtrado !== null && trim($p['marca']) !== $marca_filtrado) {
                                                continue;
                                            }

                                            if ($id_categoria_selecionada !== '' && $p['idCategoria'] != $id_categoria_selecionada) {
                                                continue;
                                            }
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php if (!empty($p['caminho_imagem'])): ?>
                                                        <img src="../<?= htmlspecialchars($p['caminho_imagem']) ?>" alt="Foto" width="50" style="border-radius: 5px;">
                                                    <?php else: ?>
                                                        <i class="bi bi-image" style="font-size: 24px; color: #ccc;"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($p['sku']) ?></td>
                                                <td><?= htmlspecialchars($p['nome_produto']) ?></td>
                                                <td><?= htmlspecialchars($p['marca']) ?></td>
                                                <td>R$ <?= number_format($p['preco_unitario'], 2, ',', '.') ?></td>
                                                <td><?= number_format($p['quantidade_atual'] ?? 0) ?></td>
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
            </main>
        </div>

    <?php
    elseif ($acao === 'novo' || $acao === 'editar'):
        $produto = null;
        $estoque = null;
        $url_post = "?acao=salvar_novo";

        if ($acao === 'editar' && $id) {
            $produto = read($pdo, 'produto', '*', "id_produto = " . (int)$id);
            $estoque = read($pdo, 'estoque', '*', "idProduto = " . (int)$id);

            $url_post = "?acao=salvar_edicao&id=" . (int)$id;
        }
    ?>
        <div class="content">
            <header class="topbar">
                <div class="topbar-left">
                    <label for="menu-toggle" class="menu-btn">
                        <i class="bi bi-list"></i>
                    </label>
                    <div class="header-left">
                        <h1>Dashboard</h1>
                        <p>Visão geral do desempenho da sua loja.</p>
                    </div>
                </div>
                <div class="topbar-right">
                    <div class="user">
                        <i class="bi bi-person-circle"></i>
                        <p>Administrador</p>
                    </div>
                </div>
            </header>

            <div class="container-pagina">
                <div class="card-cadastro-produto">
                    <div class="top-card-cadastro">
                        <img src="../imagens/logo1.png">
                        <h2>Dados do Produto</h2>
                    </div>
                    <div class="main-card-cadastro">
                        <form action="<?= $url_post ?>" method="POST" enctype="multipart/form-data">
                            <div class="cadastros-form">

                                <div class="top-form">
                                    <div class="campo">
                                        <label>Categoria <span>*</span></label>
                                        <select name="idCategoria" required>
                                            <option value="">Escolha a Categoria</option>
                                            <option value="1" <?= ($produto['idCategoria'] ?? '') == '1' ? 'selected' : '' ?>>Ferramentas Manuais</option>
                                            <option value="2" <?= ($produto['idCategoria'] ?? '') == '2' ? 'selected' : '' ?>>Ferramentas Elétricas</option>
                                            <option value="3" <?= ($produto['idCategoria'] ?? '') == '3' ? 'selected' : '' ?>>Cimentos</option>
                                            <option value="4" <?= ($produto['idCategoria'] ?? '') == '4' ? 'selected' : '' ?>>Argamassas</option>
                                            <option value="5" <?= ($produto['idCategoria'] ?? '') == '5' ? 'selected' : '' ?>>Blocos</option>
                                            <option value="6" <?= ($produto['idCategoria'] ?? '') == '6' ? 'selected' : '' ?>>Pisos</option>
                                            <option value="7" <?= ($produto['idCategoria'] ?? '') == '7' ? 'selected' : '' ?>>Revestimentos</option>
                                            <option value="8" <?= ($produto['idCategoria'] ?? '') == '8' ? 'selected' : '' ?>>Tintas</option>
                                        </select>
                                    </div>
                                    <div class="campo">
                                        <label>SKU <span>*</span></label>
                                        <input type="text" placeholder="EX: SKU001" name="sku" value="<?= $produto['sku'] ?? '' ?>" required>
                                    </div>
                                    <div class="campo">
                                        <label>Status do Produto <span>*</span></label>
                                        <select name="status_produto">
                                            <option value="ativo" <?= ($produto['status_produto'] ?? '') === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                                            <option value="inativo" <?= ($produto['status_produto'] ?? '') === 'inativo' ? 'selected' : '' ?>>Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="main-form">
                                    <div class="campo">
                                        <label>Nome do Produto <span>*</span></label>
                                        <input type="text" placeholder="Digite o nome do produto" name="nome_produto" value="<?= $produto['nome_produto'] ?? '' ?>" required>
                                    </div>
                                    <div class="campo">
                                        <label>Marca</label>
                                        <input type="text" placeholder="Digite a marca (opcional)" name="marca" value="<?= $produto['marca'] ?? '' ?>">
                                    </div>
                                </div>

                                <div class="financas">
                                    <div class="campo">
                                        <label>Unidade de Medida <span>*</span></label>
                                        <select name="unidade_medida" required>
                                            <option value="UN" <?= ($produto['unidade_medida'] ?? '') == 'UN' ? 'selected' : '' ?>>UN - Unidade</option>
                                            <option value="CM" <?= ($produto['unidade_medida'] ?? '') == 'CM' ? 'selected' : '' ?>>CM - Centímetro</option>
                                            <option value="M" <?= ($produto['unidade_medida'] ?? '') == 'M' ? 'selected' : '' ?>>M - Metro</option>
                                            <option value="MM" <?= ($produto['unidade_medida'] ?? '') == 'MM' ? 'selected' : '' ?>>MM - Milímetro</option>
                                            <option value="M2" <?= ($produto['unidade_medida'] ?? '') == 'M2' ? 'selected' : '' ?>>M2 - Metros Quadrados</option>
                                            <option value="M3" <?= ($produto['unidade_medida'] ?? '') == 'M3' ? 'selected' : '' ?>>M3 - Metros Cúbicos</option>
                                            <option value="KG" <?= ($produto['unidade_medida'] ?? '') == 'KG' ? 'selected' : '' ?>>KG - Quilograma</option>
                                            <option value="G" <?= ($produto['unidade_medida'] ?? '') == 'G' ? 'selected' : '' ?>>G - Grama</option>
                                            <option value="T" <?= ($produto['unidade_medida'] ?? '') == 'T' ? 'selected' : '' ?>>T - Tonelada</option>
                                        </select>
                                    </div>
                                    <div class="campo">
                                        <label>Preço Unitário <span>*</span></label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="preco_unitario" value="<?= $produto['preco_unitario'] ?? '' ?>" required>
                                    </div>
                                    <div class="campo">
                                        <label>Desconto (R$)</label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="desconto" value="<?= $produto['desconto'] ?? '' ?>">
                                    </div>
                                    <div class="campo">
                                        <label>Frete (R$)</label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="frete" value="<?= $produto['frete'] ?? '' ?>">
                                    </div>
                                </div>

                                <div class="top-form">
                                    <div class="campo">
                                        <label>Quantidade em Estoque <span>*</span></label>
                                        <input type="number" placeholder="Ex: 100" name="quantidade" value="<?= $estoque['quantidade_atual'] ?? '1' ?>" min="0" required>
                                    </div>
                                    <div class="campo">
                                        <label>Estoque Mínimo <span>*</span></label>
                                        <input type="number" placeholder="Ex: 10" name="estoque_minimo" value="<?= $estoque['estoque_minimo'] ?? '1' ?>" min="1" required>
                                    </div>
                                    <div class="campo">
                                        <label>Local de Armazenamento</label>
                                        <input type="text" placeholder="Ex: Corredor A1" name="local_armazenamento" value="<?= $estoque['local_armazenamento'] ?? '' ?>">
                                    </div>
                                </div>

                                <div class="main-form">
                                    <div class="arquivo-imagem campo">
                                        <label>Imagem do Produto <?= $acao === 'novo' ? '<span>*</span>' : '(Opcional na edição)' ?></label>
                                        <input type="file" name="foto_produto" class="file-escondido" accept="image/png, image/jpeg, image/webp" <?= $acao === 'novo' ? 'required' : '' ?>>
                                    </div>
                                    <div class="campo">
                                        <label>Descrição da Imagem (Acessibilidade - Alt)</label>
                                        <input type="text" placeholder="Ex: Saco de cimento 50kg" name="descricao_imagem">
                                    </div>
                                </div>

                                <div class="descricao">
                                    <label>Descrição de Produto</label>
                                    <textarea placeholder="Digite os detalhes do produto aqui..." name="descricao_produto"><?= $produto['descricao_produto'] ?? '' ?></textarea>
                                </div>

                            </div>
                            <div class="botoes">
                                <a href="?acao=listar">Cancelar</a>
                                <button type="submit"><i class="bi bi-floppy"></i> <?= $acao === 'novo' ? 'Salvar Produto' : 'Atualizar Produto' ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>



</body>

</html>