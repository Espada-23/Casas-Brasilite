<?php
require_once "../../Crud/crud.php";
require_once "filtro.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Todas Categorias - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="todos-produtos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<?php include_once "../../partials/header.php" ?>

<body>

    <main class="container page-layout">

        <aside class="sidebar-filtros">

            <h3 class="titulo-filtros">Filtros</h3>

            <form method="GET">

                <h4>Categorias</h4>

                <input type="checkbox" id="toggleCategorias" class="toggle-filtro">

                <div class="lista-filtros limitada">
                    <?php foreach ($categorias as $c): ?>
                        <label>
                            <input type="checkbox" name="categoria[]" value="<?= $c['id_categoria'] ?>">
                            <?= $c['nome_categoria'] ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <label for="toggleCategorias" class="btn-ver-mais"></label>

                <div class="bloco-filtro">
                    <h4>Marcas</h4>

                    <input type="checkbox" id="toggleMarcas" class="toggle-filtro">

                    <ul class="lista-filtros limitada">
                        <?php foreach ($marcas as $m): ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="marca[]"
                                        value="<?= $m['marca'] ?>"
                                        <?= in_array($m['marca'], $marca) ? 'checked' : '' ?>>
                                    <?= $m['marca'] ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <label for="toggleMarcas" class="btn-ver-mais"></label>

                <div class="bloco-filtro">
                    <h4>Avaliação dos Clientes</h4>
                    <ul class="lista-filtros">

                        <?php for ($estrela = 5; $estrela >= 1; $estrela--): ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="avaliacao[]" value="<?= $estrela ?>">
                                    <span class="estrelas-filtro">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $estrela
                                                ? '<i class="fa-solid fa-star"></i>'
                                                : '<i class="fa-regular fa-star"></i>';
                                        }
                                        ?>
                                    </span>
                                </label>
                            </li>
                        <?php endfor; ?>

                    </ul>
                </div>

                <div class="bloco-filtro">
                    <h4>Faixa de preço</h4>
                    <div class="filtro-preco-inputs">
                        <input type="number" name="preco_min" value="<?= $preco_min ?>" placeholder="R$ 0">
                        <span>a</span>
                        <input type="number" name="preco_max" value="<?= $preco_max ?>" placeholder="R$ 1000">
                    </div>
                </div>

                <button type="submit" class="btn btn-filtro-aplicar">
                    Aplicar filtros
                </button>

            </form>

        </aside>


        <section class="conteudo-lista">

            <div class="cabecalho-resultados">
                <h2>Produtos</h2>

                <form method="GET" class="ordenacao">

                    <?php foreach ($categoria as $c): ?>
                        <input type="hidden" name="categoria[]" value="<?= $c ?>">
                    <?php endforeach; ?>

                    <?php foreach ($marca as $m): ?>
                        <input type="hidden" name="marca[]" value="<?= $m ?>">
                    <?php endforeach; ?>

                    <input type="hidden" name="preco_min" value="<?= $preco_min ?>">
                    <input type="hidden" name="preco_max" value="<?= $preco_max ?>">

                    <?php foreach ($avaliacao as $a): ?>
                        <input type="hidden" name="avaliacao[]" value="<?= $a ?>">
                    <?php endforeach; ?>

                    <select name="ordem" onchange="this.form.submit()">
                        <option value="">Mais recentes</option>
                        <option value="menor_preco" <?= $ordem == 'menor_preco' ? 'selected' : '' ?>>Menor preço</option>
                        <option value="maior_preco" <?= $ordem == 'maior_preco' ? 'selected' : '' ?>>Maior preço</option>
                    </select>

                </form>
            </div>


            <div class="grid-produtos">

                <?php if (empty($produtos)): ?>
                    <p>Nenhum produto encontrado com os filtros selecionados.</p>
                <?php endif; ?>

                <?php foreach ($produtos as $p): ?>
                    <?php
                    $preco_original = (float)$p['preco_unitario'];
                    $desconto_reais = (float)$p['desconto'];

                    $preco_final = $preco_original - $desconto_reais;

                    if ($preco_final < 0) {
                        $preco_final = 0;
                    }

                    $porcentagem_desconto = 0;

                    if ($desconto_reais > 0 && $preco_original > 0) {
                        $porcentagem_desconto = round(($desconto_reais / $preco_original) * 100);
                    }
                    ?>

                    <div class="cartao-produto">

                        <?php if ($desconto_reais > 0): ?>
                            <span class="selo-desconto">
                                <?= $porcentagem_desconto ?>%
                            </span>
                        <?php endif; ?>

                        <a href="../../janelas/janela-favoritos/favoritar.php?id=<?= $p['id_produto'] ?>" class="icone-favoritar">
                            <i class="<?= in_array($p['id_produto'], $_SESSION['favoritos'])
                                            ? 'fa-solid fa-heart'
                                            : 'fa-regular fa-heart' ?>"></i>
                        </a>

                        <div class="imagem-produto-placeholder">
                            <img src="../../<?= $p['caminho_imagem'] ?>" alt="<?= $p['nome_produto'] ?>">
                        </div>

                        <span class="tag-estoque">
                            <?= ($p['quantidade_atual'] > 0) ? 'Em estoque' : 'Indisponível' ?>
                        </span>

                        <h3 class="titulo-produto">
                            <?= $p['nome_produto'] ?>
                        </h3>

                        <div class="estrelas-produto">
                            <?php
                            $media = round($p['media_avaliacao']);

                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $media) {
                                    echo '<i class="fa-solid fa-star"></i>';
                                } else {
                                    echo '<i class="fa-regular fa-star"></i>';
                                }
                            }
                            ?>
                            (<?= $p['total_avaliacoes'] ?>)
                        </div>

                        <?php if ($desconto_reais > 0): ?>
                            <p class="preco-antigo">
                                R$ <?= number_format($preco_original, 2, ',', '.') ?>
                            </p>
                        <?php endif; ?>

                        <div class="preco-produto">
                            R$ <?= number_format($preco_final, 2, ',', '.') ?>
                        </div>

                        <?php
                        if ($p['preco_unitario'] <= 50) {
                            $parcelas = 2;
                        } elseif ($p['preco_unitario'] <= 100) {
                            $parcelas = 4;
                        } elseif ($p['preco_unitario'] <= 200) {
                            $parcelas = 5;
                        } elseif ($p['preco_unitario'] <= 500) {
                            $parcelas = 6;
                        } elseif ($p['preco_unitario'] <= 1000) {
                            $parcelas = 8;
                        } else {
                            $parcelas = 10;
                        }

                        $valorParcela = $preco_final / $parcelas;
                        ?>

                        <div class="parcelamento">
                            ou <?= $parcelas ?>x de R$
                            <?= number_format($valorParcela, 2, ',', '.') ?>
                        </div>

                        <a href="../../janelas/janela-produto/janela-produto.php?id=<?= $p['id_produto'] ?>" class="link-card-produto">
                            <button class="btn btn-laranja btn-comprar-block">
                                <i class="fa-solid fa-cart-plus"></i>
                                Comprar
                            </button>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>

            <?php $query = $_GET; ?>

            <div class="paginacao">

                <div class="seta">
                    <?php if ($paginaAtual > 1): ?>
                        <?php $query['pagina'] = $paginaAtual - 1; ?>
                        <a class="seta" href="?<?= http_build_query($query) ?>">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="box-num">
                    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                        <?php $query['pagina'] = $i; ?>
                        <a href="?<?= http_build_query($query) ?>"
                            class="<?= $i == $paginaAtual ? 'ativo' : ''; ?>">
                            <?= $i; ?>
                        </a>
                    <?php endfor; ?>
                </div>

                <div class="seta">
                    <?php if ($paginaAtual < $totalPaginas): ?>
                        <?php $query['pagina'] = $paginaAtual + 1; ?>
                        <a class="seta" href="?<?= http_build_query($query) ?>">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>

            </div>

        </section>

    </main>

</body>

</html>