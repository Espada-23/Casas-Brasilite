<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../../Crud/crud.php";
require_once "../../Crud/init.php";
$id_produto = $_GET['id'];

$sql = "
    SELECT p.*, f.caminho_imagem, e.quantidade_atual AS estoque_atual
    FROM produto p
    LEFT JOIN foto_produto f ON p.id_produto = f.idProduto
    LEFT JOIN estoque e ON p.id_produto = e.idProduto
    WHERE p.id_produto = $id_produto
    LIMIT 1
";

$stmt = $pdo->query($sql);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}

$sql_fotos = "SELECT caminho_imagem FROM foto_produto WHERE idProduto = $id_produto";
$stmt_fotos = $pdo->query($sql_fotos);
$fotos = $stmt_fotos->fetchAll(PDO::FETCH_ASSOC);

if (empty($fotos)) {
    $fotos[] = ['caminho_imagem' => '../../uploads/sem-foto.webp'];
}

$fotoSelecionada = isset($_GET['foto']) ? (int)$_GET['foto'] : 0;

if (!isset($fotos[$fotoSelecionada])) {
    $fotoSelecionada = 0;
}

$preco_atual = $produto['preco_unitario'];
$desconto_porcentagem = (int)$produto['desconto'];
if ($desconto_porcentagem > 0) {
    $preco_antigo = $preco_atual / (1 - ($desconto_porcentagem / 100));
} else {
    $preco_antigo = $preco_atual;
}

$sql_avaliacoes = "SELECT nota FROM avaliacao WHERE idProduto = $id_produto";
$stmt_av = $pdo->query($sql_avaliacoes);
$avaliacoes = $stmt_av->fetchAll(PDO::FETCH_ASSOC);
$total_avaliacoes = count($avaliacoes);

if ($total_avaliacoes > 0) {
    $soma_notas = array_sum(array_column($avaliacoes, 'nota'));
    $media_nota      = round($soma_notas / $total_avaliacoes);
    $media_exibicao  = number_format($soma_notas / $total_avaliacoes, 1, '.', '');
} else {
    $media_nota     = 0;
    $media_exibicao = "0.0";
}

$distribuicao = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
foreach ($avaliacoes as $av) {
    $n = (int)$av['nota'];
    if (isset($distribuicao[$n])) {
        $distribuicao[$n]++;
    }
}

$sql_comentarios = "
    SELECT f.mensagem, f.data_feedback, u.nome,
           COALESCE(a.nota, 0) AS nota
    FROM feedback f
    JOIN  usuario u  ON f.idUsuario = u.id_usuario
    LEFT JOIN avaliacao a
           ON a.idUsuario = f.idUsuario AND a.idProduto = f.idProduto
    WHERE f.idProduto = $id_produto
    ORDER BY f.data_feedback DESC
";
$stmt_comentarios  = $pdo->query($sql_comentarios);
$comentarios       = $stmt_comentarios->fetchAll(PDO::FETCH_ASSOC);

$usuario_logado      = $_SESSION['usuario'] ?? null;
$id_usuario_logado   = (int)($usuario_logado['id_usuario'] ?? 0);

$ja_avaliou = false;
if ($id_usuario_logado) {
    $check = $pdo->query("SELECT id_feedback FROM feedback WHERE idUsuario = $id_usuario_logado AND idProduto = $id_produto");
    $ja_avaliou = (bool)$check->fetch();
}

$categoria_produto = $produto['idCategoria'];

$sql_relacionados = "
    SELECT p.*, f.caminho_imagem
    FROM produto p
    LEFT JOIN foto_produto f ON p.id_produto = f.idProduto
    WHERE p.idCategoria = '$categoria_produto' AND p.id_produto != $id_produto
    GROUP BY p.id_produto
    LIMIT 4
";
$stmt_relacionados  = $pdo->query($sql_relacionados);
$produtos_relacionados = $stmt_relacionados->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Casas-Brasilite/imagens/icon.png" type="image/x-icon">
    <title><?= $produto['nome_produto'] ?> - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="janela-produto.css">
</head>

<?php include_once "../../partials/header.php" ?>

<body>

    <section class="pagina-produto">
        <div class="container">

            <div class="grid-produto">

                <div class="galeria-produto">

                    <div class="miniaturas">
                        <?php foreach ($fotos as $lista => $foto): ?>
                            <?php if ($lista === 0) continue; ?>
                            <?php $classe_ativa = ($lista == $fotoSelecionada) ? 'ativa' : ''; ?>
                            <a href="janela-produto.php?id=<?= $id_produto ?>&foto=<?= $lista ?>"
                                class="miniatura <?= $classe_ativa ?>">
                                <img src="../../<?= $foto['caminho_imagem'] ?>"
                                    alt="<?= $produto['nome_produto'] ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="imagem-principal-produto">
                        <a href="/Casas-Brasilite/janelas/janela-favoritos/favoritar.php?id=<?= $produto['id_produto'] ?>" class="icone-favoritar">
                            <i class="<?= in_array($produto['id_produto'], $_SESSION['favoritos'])
                                            ? 'fa-solid fa-heart'
                                            : 'fa-regular fa-heart' ?>"></i>
                        </a>
                        <img src="../../<?= $fotos[$fotoSelecionada]['caminho_imagem'] ?>"
                            alt="<?= $produto['nome_produto'] ?>">
                    </div>

                </div>

                <div class="informacoes-produto">
                    <h1 class="titulo-produto-detalhe">
                        <?= $produto['nome_produto'] ?>
                    </h1>

                    <div class="avaliacoes-produto">
                        <div class="estrelas">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $media_nota
                                    ? '<i class="fas fa-star"></i>'
                                    : '<i class="far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <span>
                            <?= $media_exibicao ?>
                            (<?= $total_avaliacoes ?> <?= $total_avaliacoes == 1 ? 'avaliação' : 'avaliações' ?>)
                        </span>
                    </div>

                    <p class="descricao-texto-produto">
                        <?= $produto['descricao_produto'] ?>
                    </p>

                    <ul class="lista-caracteristicas">
                        <li>Marca: <?= $produto['marca'] ?></li>
                    </ul>
                </div>

                <div class="card-compra">

                    <?php if ($desconto_porcentagem > 0): ?>
                        <span class="preco-antigo-detalhe">
                            R$ <?= number_format($preco_antigo, 2, ',', '.') ?>
                        </span>
                    <?php endif; ?>

                    <div class="linha-preco">
                        <h2 class="preco-atual">
                            R$ <?= number_format($preco_atual, 2, ',', '.') ?>
                        </h2>
                        <?php if ($desconto_porcentagem > 0): ?>
                            <span class="desconto-produto">
                                <?= $desconto_porcentagem ?>% OFF
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php
                    if ($preco_atual <= 50) {
                        $parcelas = 2;
                    } elseif ($preco_atual <= 100) {
                        $parcelas = 4;
                    } elseif ($preco_atual <= 200) {
                        $parcelas = 5;
                    } elseif ($preco_atual <= 500) {
                        $parcelas = 6;
                    } elseif ($preco_atual <= 1000) {
                        $parcelas = 8;
                    } else {
                        $parcelas = 10;
                    }

                    $valorParcela = $preco_atual / $parcelas;
                    ?>

                    <p class="parcelamento-produto">
                        em <strong><?= $parcelas ?>x de R$ <?= number_format($valorParcela, 2, ',', '.') ?> sem juros</strong>
                    </p>

                    <div class="frete-produto">
                        <i class="fas fa-truck"></i>
                        <div>
                            <strong>Chegará entre terça-feira e quarta-feira</strong>
                            <p><?= ($produto['frete'] > 0 && $produto['preco_unitario'] <= 199)
                                    ? "Frete: R$ " . number_format($produto['frete'], 2, ',', '.')
                                    : "Frete grátis" ?></p>
                        </div>
                    </div>

                    <form action="../carrinho/processar-carrinho.php" method="POST">
                        <input type="hidden" name="id_produto" value="<?= $id_produto ?>">
                        <input type="hidden" name="url_origem" value="<?= $_SERVER['REQUEST_URI'] ?>">

                        <div class="quantidade-produto">
                            <label for="campo-quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" id="campo-quantidade"
                                value="1" min="1"
                                max="<?= isset($produto['estoque_atual']) ? $produto['estoque_atual'] : 10 ?>"
                                step="1" required>
                        </div>

                        <button type="submit" name="acao" value="comprar" class="btn-comprar-agora">
                            Comprar agora
                        </button>
                        <button type="submit" name="acao" value="adicionar" class="btn-adicionar-carrinho">
                            <i class="fas fa-shopping-cart"></i>
                            Adicionar ao carrinho
                        </button>
                    </form>

                </div>

            </div>

            <section class="secao-relacionados">
                <div class="cabecalho-relacionados">
                    <h3>Produtos Relacionados:</h3>
                </div>

                <div class="grid-produtos">
                    <?php if (!empty($produtos_relacionados)): ?>
                        <?php foreach ($produtos_relacionados as $relacionado):
                            $img_relacionado = !empty($relacionado['caminho_imagem'])
                                ? $relacionado['caminho_imagem']
                                : 'uploads/sem-foto.webp';
                        ?>
                            <a href="janela-produto.php?id=<?= $relacionado['id_produto'] ?>"
                                style="text-decoration: none; color: inherit;">
                                <div class="cartao-produto">
                                    <div class="imagem-produto-placeholder">
                                        <img src="../../<?= $img_relacionado ?>"
                                            alt="<?= $relacionado['nome_produto'] ?>">
                                    </div>
                                    <h4 class="titulo-produto"><?= $relacionado['nome_produto'] ?></h4>
                                    <div class="preco-produto">R$ <?= number_format($relacionado['preco_unitario'], 2, ',', '.') ?></div>
                                    <?php
                                    if ($relacionado['preco_unitario'] <= 50) {
                                        $parcelas = 2;
                                    } elseif ($relacionado['preco_unitario'] <= 100) {
                                        $parcelas = 4;
                                    } elseif ($relacionado['preco_unitario'] <= 200) {
                                        $parcelas = 5;
                                    } elseif ($relacionado['preco_unitario'] <= 500) {
                                        $parcelas = 6;
                                    } elseif ($relacionado['preco_unitario'] <= 1000) {
                                        $parcelas = 8;
                                    } else {
                                        $parcelas = 10;
                                    }

                                    $valorParcela = $relacionado['preco_unitario'] / $parcelas;
                                    ?>

                                    <div class="parcelamento">
                                        ou <?= $parcelas ?>x de R$
                                        <?= number_format($valorParcela, 2, ',', '.') ?>
                                    </div>

                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Nenhum outro produto semelhante encontrado.</p>
                    <?php endif; ?>
                </div>
            </section>


            <section class="secao-avaliacoes" id="avaliacoes">

                <div class="cabecalho-avaliacoes">
                    <h3>Avaliações do Produto:</h3>
                </div>

                <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'avaliacao'): ?>
                    <div class="alerta-avaliacao alerta-sucesso">
                        <i class="fas fa-check-circle"></i>
                        Sua avaliação foi enviada com sucesso. Obrigado!
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['erro'])): ?>
                    <?php
                    $msgs_erro = [
                        'login'     => 'Você precisa estar logado para avaliar este produto.',
                        'invalido'  => 'Preencha todos os campos corretamente (nota + comentário).',
                        'duplicado' => 'Você já enviou uma avaliação para este produto.',
                    ];
                    $msg = $msgs_erro[$_GET['erro']] ?? 'Ocorreu um erro. Tente novamente.';
                    ?>
                    <div class="alerta-avaliacao alerta-erro">
                        <i class="fas fa-exclamation-circle"></i>
                        <?= $msg ?>
                    </div>
                <?php endif; ?>

                <div class="lista-comentarios">
                    <?php if (!empty($comentarios)): ?>
                        <?php foreach ($comentarios as $com):
                            $nome_exibicao = trim($com['nome']) ?: 'Usuário';
                            $inicial       = mb_strtoupper(mb_substr($nome_exibicao, 0, 1));
                            $nota_com      = (int)$com['nota'];
                        ?>
                            <div class="cartao-comentario">
                                <div class="cabecalho-comentario">
                                    <div class="avatar-usuario"><?= $inicial ?></div>
                                    <div class="info-comentario">
                                        <h4><?= htmlspecialchars($nome_exibicao) ?></h4>
                                        <?php if ($nota_com > 0): ?>
                                            <div class="estrelas-comentario">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <i class="<?= $i <= $nota_com ? 'fas' : 'far' ?> fa-star"></i>
                                                <?php endfor; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="data-comentario">
                                        <?= date('d/m/Y', strtotime($com['data_feedback'])) ?>
                                    </span>
                                </div>
                                <p class="texto-comentario"><?= htmlspecialchars($com['mensagem']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="sem-comentarios">
                            <i class="far fa-comment-dots"></i>
                            <p>Nenhuma avaliação ainda. Seja o primeiro a avaliar!</p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($id_usuario_logado): ?>

                    <?php if ($ja_avaliou): ?>
                        <div class="aviso-avaliacao aviso-ja-avaliou">
                            <i class="fas fa-check-circle"></i>
                            Você já avaliou este produto. Obrigado pelo seu feedback!
                        </div>

                    <?php else: ?>
                        <div class="form-avaliacao">
                            <h4><i class="fas fa-pen-to-square"></i> Deixe sua avaliação</h4>

                            <form action="processar-avaliacao.php" method="POST">
                                <input type="hidden" name="id_produto" value="<?= $id_produto ?>">
                                <input type="hidden" name="url_origem" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

                                <div class="campo-form-avaliacao">
                                    <label class="label-form">Sua nota <span class="obrigatorio">*</span></label>
                                    <div class="estrelas-interativas" role="group" aria-label="Nota de 1 a 5 estrelas">
                                        <?php for ($i = 5; $i >= 1; $i--): ?>
                                            <input type="radio" id="star<?= $i ?>" name="nota" value="<?= $i ?>" required>
                                            <label for="star<?= $i ?>" title="<?= $i ?> estrela<?= $i > 1 ? 's' : '' ?>">
                                                <i class="fas fa-star"></i>
                                            </label>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div class="campo-form-avaliacao">
                                    <label class="label-form" for="comentario">
                                        Comentário <span class="obrigatorio">*</span>
                                    </label>
                                    <textarea
                                        id="comentario"
                                        name="comentario"
                                        placeholder="Conte sua experiência com este produto..."
                                        required
                                        maxlength="500"
                                        rows="4"></textarea>
                                    <span class="contador-chars">Máximo 500 caracteres</span>
                                </div>

                                <button type="submit" class="btn-enviar-avaliacao">
                                    <i class="fas fa-paper-plane"></i> Enviar avaliação
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="aviso-avaliacao aviso-login">
                        <i class="fas fa-user-circle"></i>
                        <span>
                            <a href="/Casas-Brasilite/janelas/cadastro-login/login.php">Faça login</a>
                            para deixar uma avaliação.
                        </span>
                    </div>
                <?php endif; ?>

            </section>

        </div>
    </section>

</body>

</html>