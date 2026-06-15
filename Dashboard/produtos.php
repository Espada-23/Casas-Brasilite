<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$acao = $_GET['acao'] ?? 'listar';
$id = $_GET['id'] ?? null;

$erro = '';
$statusFiltro = $_GET['status'] ?? '';
$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
$id_filtrado = isset($_GET['id_filtrado']) ? (int)$_GET['id_filtrado'] : null;
$marca_filtrado = isset($_GET['marca_filtrado']) ? trim($_GET['marca_filtrado']) : null;
$id_categoria_selecionada = $_GET['id_categoria'] ?? '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($acao === 'salvar_novo' || $acao === 'salvar_edicao')) {
    $dados_produto = [
        'idCategoria' => $_POST['id_categoria'] ?? '',
        'sku' => $_POST['sku'] ?? '',
        'nome_produto' => $_POST['nome_produto'] ?? '',
        'preco_unitario' => $_POST['preco_unitario'] ?? '',
        'marca' => $_POST['marca'] ?? null,
        'unidade_medida' => $_POST['unidade_medida'] ?? 'UN',
        'desconto' => $_POST['desconto'] ?? 0.00,
        'custo_produto' => $_POST['custo_produto'] ?? 0.00,
        'frete' => $_POST['frete'] ?? 0.00,
        'status_produto' => $_POST['status_produto'] ?? 'ativo',
        'descricao_produto' => $_POST['descricao_produto'] ?? null
    ];

    if ($acao === 'salvar_novo') {
        $stmtSku = $pdo->prepare("SELECT COUNT(*) AS total FROM produto WHERE sku = ?");
        $stmtSku->execute([$dados_produto['sku']]);
        $skuExiste = $stmtSku->fetch(PDO::FETCH_ASSOC)['total'];

        if ($skuExiste > 0) {
            die("Erro: já existe um produto cadastrado com esse SKU.");
        }

        $id_produto_novo = create($pdo, 'produto', $dados_produto);

        $id_estoque_novo = create($pdo, 'estoque', [
            'idProduto' => $id_produto_novo,
            'quantidade_atual' => $_POST['quantidade'] ?? 1,
            'estoque_minimo' => $_POST['estoque_minimo'] ?? 1,
            'local_armazenamento' => $_POST['local_armazenamento'] ?? null,
            'status_estoque' => 'disponivel'
        ]);

        create($pdo, 'movimentacao', [
            'idUsuario' => $_SESSION['id_usuario'] ?? 1,
            'idEstoque' => $id_estoque_novo,
            'tipo_movimentacao' => 'entrada',
            'quantidade' => $_POST['quantidade'] ?? 1,
            'status_movimentacao' => 'concluido'
        ]);

        $diretorio_destino = '../uploads/';
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0777, true);
        }

        for ($i = 1; $i <= 4; $i++) {
            $campo = 'foto_produto_' . $i;
            if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
                $nome_arquivo = time() . '_' . $i . '_' . basename($_FILES[$campo]['name']);
                $caminho_upload = $diretorio_destino . $nome_arquivo;

                if (move_uploaded_file($_FILES[$campo]['tmp_name'], $caminho_upload)) {
                    create($pdo, 'foto_produto', [
                        'idProduto' => $id_produto_novo,
                        'caminho_imagem' => 'uploads/' . $nome_arquivo,
                        'descricao_imagem' => $_POST['descricao_imagem'] ?? null
                    ]);
                }
            }
        }

        header('Location: produtos.php?mensagem=Criado com sucesso');
        exit;
    }

    if ($acao === 'salvar_edicao' && $id) {
        $id_int = (int)$id;
        $estoque_atual = read($pdo, 'estoque', '*', "idProduto = " . $id_int);

        update($pdo, 'produto', $dados_produto, "id_produto = " . $id_int);

        update($pdo, 'estoque', [
            'quantidade_atual' => $_POST['quantidade'] ?? 0,
            'estoque_minimo' => $_POST['estoque_minimo'] ?? 1,
            'local_armazenamento' => $_POST['local_armazenamento'] ?? null
        ], "idProduto = " . $id_int);

        if ($estoque_atual) {
            $qtd_anterior = (int)$estoque_atual['quantidade_atual'];
            $qtd_nova = (int)($_POST['quantidade'] ?? 0);
            $diferenca = $qtd_nova - $qtd_anterior;

            if ($diferenca !== 0) {
                create($pdo, 'movimentacao', [
                    'idUsuario' => $_SESSION['id_usuario'] ?? 1,
                    'idEstoque' => $estoque_atual['id_estoque'],
                    'tipo_movimentacao' => $diferenca > 0 ? 'entrada' : 'saida',
                    'quantidade' => abs($diferenca),
                    'status_movimentacao' => 'concluido'
                ]);
            }
        }

        $diretorio_destino = '../uploads/';
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0777, true);
        }

        for ($i = 1; $i <= 4; $i++) {
            $campo = 'foto_produto_' . $i;
            if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
                $nome_arquivo = time() . '_' . $i . '_' . basename($_FILES[$campo]['name']);
                $caminho_upload = $diretorio_destino . $nome_arquivo;

                if (move_uploaded_file($_FILES[$campo]['tmp_name'], $caminho_upload)) {
                    $foto_existente = $pdo
                        ->query("SELECT * FROM foto_produto WHERE idProduto = $id_int ORDER BY id_foto ASC LIMIT 1 OFFSET " . ($i - 1))
                        ->fetch(PDO::FETCH_ASSOC);

                    if ($foto_existente) {
                        if (!empty($foto_existente['caminho_imagem'])) {
                            $arquivo_antigo = '../' . $foto_existente['caminho_imagem'];
                            if (file_exists($arquivo_antigo)) {
                                unlink($arquivo_antigo);
                            }
                        }

                        update($pdo, 'foto_produto', [
                            'caminho_imagem' => 'uploads/' . $nome_arquivo,
                            'descricao_imagem' => $_POST['descricao_imagem'] ?? null
                        ], "id_foto = " . $foto_existente['id_foto']);
                    } else {
                        create($pdo, 'foto_produto', [
                            'idProduto' => $id_int,
                            'caminho_imagem' => 'uploads/' . $nome_arquivo,
                            'descricao_imagem' => $_POST['descricao_imagem'] ?? null
                        ]);
                    }
                }
            }
        }

        unset($_SESSION['dados_salvos']);
        unset($_SESSION['nome_imagem_1']);
        unset($_SESSION['nome_imagem_2']);
        unset($_SESSION['nome_imagem_3']);
        unset($_SESSION['nome_imagem_4']);

        header('Location: produtos.php?mensagem=Editado com sucesso');
        exit;
    }
}

if ($acao === 'excluir' && $id) {
    $id_int = (int)$id;
    $estoque_atual = read($pdo, 'estoque', '*', "idProduto = " . $id_int);

    if ($estoque_atual && $estoque_atual['quantidade_atual'] > 0) {
        create($pdo, 'movimentacao', [
            'idUsuario' => $_SESSION['id_usuario'] ?? 1,
            'idEstoque' => $estoque_atual['id_estoque'],
            'tipo_movimentacao' => 'saida',
            'quantidade' => $estoque_atual['quantidade_atual'],
            'status_movimentacao' => 'concluido'
        ]);
    }

    delete($pdo, 'produto', "id_produto = " . $id_int);
    header('Location: produtos.php?mensagem=Excluido com sucesso');
    exit;
}

$categorias = readAll($pdo, 'categoria');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Gerenciar Produtos - Casas Brasilite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/produtos.css?v=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php
    $pagina = "produtos";
    require_once("../partials/sidebar.php");
    $form_dados = $_SESSION['dados_salvos'] ?? [];
    ?>

    <?php
    $limite = 12;
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($paginaAtual < 1) $paginaAtual = 1;
    $offset = ($paginaAtual - 1) * $limite;

    if ($acao === 'listar'):

        $where = " WHERE 1=1 ";
        $params = [];

        if ($statusFiltro == 'normal') {
            $where .= " AND e.quantidade_atual > e.estoque_minimo";
        } elseif ($statusFiltro == 'atencao') {
            $where .= " AND e.quantidade_atual <= e.estoque_minimo AND e.quantidade_atual > 0";
        } elseif ($statusFiltro == 'critico') {
            $where .= " AND e.quantidade_atual = 0";
        }

        if ($id_categoria_selecionada !== '') {
            $where .= " AND p.idCategoria = ?";
            $params[] = $id_categoria_selecionada;
        }

        if ($id_filtrado !== null) {
            $where .= " AND p.id_produto = ?";
            $params[] = $id_filtrado;
        }

        if ($marca_filtrado !== null) {
            $where .= " AND p.marca = ?";
            $params[] = $marca_filtrado;
        }

        if (!empty($pesquisa)) {
            $where .= " AND (p.nome_produto LIKE ? OR p.sku LIKE ? OR p.marca LIKE ?)";
            $params[] = "%$pesquisa%";
            $params[] = "%$pesquisa%";
            $params[] = "%$pesquisa%";
        }

        $sqlTotal = "
            SELECT COUNT(DISTINCT p.id_produto) as total
            FROM produto p
            LEFT JOIN estoque e ON p.id_produto = e.idProduto
            LEFT JOIN foto_produto f ON p.id_produto = f.idProduto
            $where
        ";

        $stmtTotal = $pdo->prepare($sqlTotal);
        $stmtTotal->execute($params);
        $totalRegistros = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];

        $totalPaginas = ($totalRegistros > 0) ? ceil($totalRegistros / $limite) : 1;
        if ($paginaAtual > $totalPaginas) $paginaAtual = $totalPaginas;
        $offset = ($paginaAtual - 1) * $limite;

        $sql = "
            SELECT 
                p.*,
                e.quantidade_atual,
                e.estoque_minimo,
                e.local_armazenamento,
                e.status_estoque,
                MIN(f.caminho_imagem) AS caminho_imagem
            FROM produto p
            LEFT JOIN estoque e ON p.id_produto = e.idProduto
            LEFT JOIN foto_produto f ON p.id_produto = f.idProduto
            $where
            GROUP BY p.id_produto
            ORDER BY p.nome_produto ASC
            LIMIT $limite OFFSET $offset
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalNormal = 0;
        $totalAtencao = 0;
        $totalCritico = 0;

        foreach ($produtos as $item) {
            if ($item['quantidade_atual'] == 0) {
                $totalCritico++;
            } elseif ($item['quantidade_atual'] <= $item['estoque_minimo']) {
                $totalAtencao++;
            } else {
                $totalNormal++;
            }
        }




        $queryBase = http_build_query([
            'status' => $statusFiltro,
            'id_categoria' => $id_categoria_selecionada,
            'pesquisa' => $pesquisa,
            'id_filtrado' => $id_filtrado,
            'marca_filtrado' => $marca_filtrado
        ]);
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
                        </div>
                        <a href="?acao=novo" class="btn"><i class="bi bi-plus-lg"></i> Adicionar Produto</a>
                    </div>


                    <?php
                    $totalNormal = 0;
                    $totalAtencao = 0;
                    $totalCritico = 0;


                    $sqlCards = "
                                SELECT
                                    quantidade_atual,
                                    estoque_minimo
                                FROM estoque
                            ";

                    $stmtCards = $pdo->query($sqlCards);
                    $dadosCards = $stmtCards->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($dadosCards as $item) {

                        if ($item['quantidade_atual'] == 0) {
                            $totalCritico++;
                        } elseif ($item['quantidade_atual'] <= $item['estoque_minimo']) {
                            $totalAtencao++;
                        } else {
                            $totalNormal++;
                        }
                    }
                    ?>

                    <div class="cards-status">
                        <div class="normal">
                            <i class="bi bi-check-circle-fill"></i>
                            <p><?= $totalNormal ?> Normal</p>
                        </div>
                        <div class="atencao">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <p><?= $totalAtencao ?> Atenção</p>
                        </div>
                        <div class="critico">
                            <i class="bi bi-x-circle-fill"></i>
                            <p><?= $totalCritico ?> Críticos</p>
                        </div>
                    </div>

                    <div class="main-filtro">
                        <div class="barra-pesquisa">
                            <form method="GET" action="produtos.php">
                                <button type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                                <input type="hidden" name="status" value="<?= htmlspecialchars($statusFiltro) ?>">
                                <input type="hidden" name="id_categoria" value="<?= htmlspecialchars($id_categoria_selecionada) ?>">
                                <input class="pesquisa-filtro" type="text" name="pesquisa"
                                    value="<?= htmlspecialchars($pesquisa) ?>"
                                    placeholder="Buscar Produto...">
                            </form>

                        </div>

                        <div class="selects">
                            <form action="produtos.php" method="GET">
                                <input type="hidden" name="pesquisa" value="<?= htmlspecialchars($pesquisa) ?>">

                                <div class="status">
                                    <select name="status" onchange="this.form.submit()" class="select-status">
                                        <option value="">Todos os status</option>
                                        <option value="normal" <?= $statusFiltro == 'normal' ? 'selected' : '' ?>>Normal</option>
                                        <option value="atencao" <?= $statusFiltro == 'atencao' ? 'selected' : '' ?>>Atenção</option>
                                        <option value="critico" <?= $statusFiltro == 'critico' ? 'selected' : '' ?>>Crítico</option>
                                    </select>
                                </div>

                                <div class="categorias">
                                    <select class="select-categorias" name="id_categoria" onchange="this.form.submit()">
                                        <option value="" <?= $id_categoria_selecionada === '' ? 'selected' : '' ?>>Todas as categorias</option>
                                        <?php foreach ($categorias as $cat): ?>
                                            <option value="<?= $cat['id_categoria'] ?>" <?= (string)$id_categoria_selecionada === (string)$cat['id_categoria'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cat['nome_categoria']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>


                    <?php if (empty($produtos)): ?>
                        <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                            <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                            Nenhum produto encontrado.
                        </div>

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
                                            <th>Mínimo</th>
                                            <th>Localização</th>
                                            <th>Status Estoque</th>
                                            <th class="acao">Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($produtos as $p): ?>
                                            <?php
                                            if ($p['quantidade_atual'] == 0) {
                                                $status = 'Crítico';
                                                $classe = 'status-critico';
                                            } elseif ($p['quantidade_atual'] <= $p['estoque_minimo']) {
                                                $status = 'Atenção';
                                                $classe = 'status-atencao';
                                            } else {
                                                $status = 'Normal';
                                                $classe = 'status-normal';
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
                                                <td style="text-align: center;"><?= number_format($p['quantidade_atual'] ?? 0) ?></td>
                                                <td style="text-align: center;"><?= number_format($p['estoque_minimo'] ?? 0) ?></td>
                                                <td><?= htmlspecialchars($p['local_armazenamento'] ?? 'Não definido') ?></td>
                                                <td class="<?= $classe ?>">
                                                    <?= $status ?>
                                                </td>
                                                <td>
                                                    <div class="btn-acao">
                                                        <a href="?acao=editar&id=<?= $p['id_produto'] ?>" class="btn-editar">Editar</a>
                                                        <a href="?acao=excluir&id=<?= $p['id_produto'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php if ($totalPaginas > 1): ?>
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
                                                <a href="?pagina=<?= $i ?>&<?= $queryBase ?>" class="<?= $i == $paginaAtual ? 'ativo' : '' ?>">
                                                    <?= $i ?>
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
                                <?php endif; ?>
                            </div>
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
                        <h1><?= $acao === 'novo' ? 'Cadastrar Produto' : 'Editar Produto' ?></h1>
                        <p><?= $acao === 'novo' ? 'Formulário para cadastrar produto.' : 'Formulário para editar produto.' ?></p>
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
                        <form action="<?= $url_post ?>" method="POST" enctype="multipart/form-data" class="form-cadastro-produto">
                            <div class="cadastros-form">
                                <div class="top-form">
                                    <div class="campo">
                                        <label>Categoria <span>*</span></label>
                                        <select name="id_categoria" required>
                                            <option value="">Escolha a Categoria</option>

                                            <?php if (!empty($categorias)): ?>
                                                <?php foreach ($categorias as $cat): 
                                                    $cat_selecionada = $form_dados['id_categoria'] ?? $produto['idCategoria'] ?? '';
                                                ?>
                                                    <option value="<?= $cat['id_categoria'] ?>" <?= $cat_selecionada == $cat['id_categoria'] ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($cat['nome_categoria']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                    <div class="campo">
                                        <label>SKU <span>*</span></label>
                                        <input type="text" placeholder="EX: SKU001" name="sku" value="<?= $form_dados['sku'] ?? $produto['sku'] ?? ''; ?>" required>
                                    </div>
                                    <div class="campo">
                                        <label>Status do Produto <span>*</span></label>
                                        <select name="status_produto">
                                            <?php $produto_selecionado = $form_dados['status_produto'] ?? $produto['status_produto'] ?? ''; ?>
                                            <option value="ativo" <?= $produto_selecionado === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                                            <option value="inativo" <?= $produto_selecionado === 'inativo' ? 'selected' : '' ?>>Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="main-form">
                                    <div class="campo">
                                        <label>Nome do Produto <span>*</span></label>
                                        <input type="text" placeholder="Digite o nome do produto" name="nome_produto" value="<?= $form_dados['nome_produto'] ?? $produto['nome_produto'] ?? ''; ?>" required>
                                    </div>
                                    <div class="campo">
                                        <label>Marca</label>
                                        <input type="text" placeholder="Digite a marca (opcional)" name="marca" value="<?= $form_dados['marca'] ?? $produto['marca'] ?? ''; ?>">
                                    </div>
                                </div>

                                <div class="financas">
                                    <div class="campo">
                                        <label>Unidade de Medida <span>*</span></label>
                                        <select name="unidade_medida" required>
                                            <?php $unidade_selecionada = $form_dados['unidade_medida'] ?? $produto['unidade_medida'] ?? 'UN'; ?>
                                            <option value="UN" <?= $unidade_selecionada == 'UN' ? 'selected' : '' ?>>UN - Unidade</option>
                                            <option value="CM" <?= $unidade_selecionada == 'CM' ? 'selected' : '' ?>>CM - Centímetro</option>
                                            <option value="M" <?= $unidade_selecionada == 'M' ? 'selected' : '' ?>>M - Metro</option>
                                            <option value="MM" <?= $unidade_selecionada == 'MM' ? 'selected' : '' ?>>MM - Milímetro</option>
                                            <option value="M2" <?= $unidade_selecionada == 'M2' ? 'selected' : '' ?>>M2 - Metros Quadrados</option>
                                            <option value="M3" <?= $unidade_selecionada == 'M3' ? 'selected' : '' ?>>M3 - Metros Cúbicos</option>
                                            <option value="KG" <?= $unidade_selecionada == 'KG' ? 'selected' : '' ?>>KG - Quilograma</option>
                                            <option value="G" <?= $unidade_selecionada == 'G' ? 'selected' : '' ?>>G - Grama</option>
                                            <option value="T" <?= $unidade_selecionada == 'T' ? 'selected' : '' ?>>T - Tonelada</option>
                                        </select>
                                    </div>
                                    <div class="campo">
                                        <label>Preço Unitário <span>*</span></label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="preco_unitario" value="<?= $form_dados['preco_unitario'] ?? $produto['preco_unitario'] ?? ''; ?>" required>
                                    </div>
                                    <div class="campo">
                                        <label>Desconto (R$)</label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="desconto" value="<?= $form_dados['desconto'] ?? $produto['desconto'] ?? ''; ?>">
                                    </div>
                                    <div class="campo">
                                        <label>Custos (R$)</label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="custo_produto" value="<?= $form_dados['custo_produto'] ?? $produto['custo_produto'] ?? ''; ?>">
                                    </div>
                                    <div class="campo">
                                        <label>Frete (R$)</label>
                                        <input type="number" step="0.01" placeholder="R$ 0.00" name="frete" value="<?= $form_dados['frete'] ?? $produto['frete'] ?? ''; ?>">
                                    </div>
                                </div>

                                <div class="top-form">
                                    <div class="campo">
                                        <label>Quantidade em Estoque <span>*</span></label>
                                        <input type="number" placeholder="Ex: 100" name="quantidade" value="<?= $form_dados['quantidade_atual'] ?? $produto['quantidade_atual'] ?? '1'; ?>" min="0" required>
                                    </div>
                                    <div class="campo">
                                        <label>Estoque Mínimo <span>*</span></label>
                                        <input type="number" placeholder="Ex: 10" name="estoque_minimo" value="<?= $form_dados['estoque_minimo'] ?? $produto['estoque_minimo'] ?? '1'; ?>" min="1" required>
                                    </div>
                                    <div class="campo">
                                        <label>Local de Armazenamento</label>
                                        <input type="text" placeholder="Ex: Corredor A1" name="local_armazenamento" value="<?= $form_dados['local_armazenamento'] ?? $produto['local_armazenamento'] ?? ''; ?>">
                                    </div>
                                </div>

                                <div class="main-form">
                                    <?php require_once "produtos_fotos.php"; ?>

                                    <span style="margin-top:-15px;">Selecione até 4 imagens. Tipos aceitos: JPG, PNG, WEBP.</span>
                                </div>
                            </div>
                            <div class="botton-form">
                                <div class="campo">
                                    <?php var_dump($form_dados); ?>
                                    <label>Descrição da Imagem (Acessibilidade - Alt)</label>
                                    <textarea name="descricao_imagem" placeholder="Ex: Saco de cimento 50kg"><?= $form_dados['descricao_imagem'] ?? $produto['descricao_imagem'] ?? ''; ?></textarea>
                                </div>

                                <div class="descricao">
                                    <label>Descrição de Produto</label>
                                    <textarea placeholder="Digite os detalhes do produto aqui..." name="descricao_produto"><?= $form_dados['descricao_produto'] ?? $produto['descricao_produto'] ?? ''; ?></textarea>
                                </div>
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