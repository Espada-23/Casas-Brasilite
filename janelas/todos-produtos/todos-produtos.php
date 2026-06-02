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

    <style>
        .lista-filtros label {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .estrelas-filtro {
            color: #ffc107;
        }
    </style>
</head>

<?php include_once "../../partials/header.php" ?>

<body>

    <main class="container page-layout">

        <aside class="sidebar-filtros">

            <h3 class="titulo-filtros">Filtros</h3>

            <form method="GET">

                <div class="bloco-filtro">
                    <h4>Categorias</h4>
                    <ul class="lista-filtros">
                        <?php foreach ($categorias as $cat): ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="categoria[]"
                                        value="<?= $cat['id_categoria'] ?>"
                                        <?= in_array($cat['id_categoria'], $categoria) ? 'checked' : '' ?>>
                                    <?= $cat['nome_categoria'] ?>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="bloco-filtro">
                    <h4>Marcas</h4>
                    <ul class="lista-filtros">
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

                <div class="bloco-filtro">
                    <h4>Avaliação dos Clientes</h4>
                    <ul class="lista-filtros">
                        <li>
                            <label>
                                <input type="radio" name="avaliacao" value="" <?= empty($avaliacao) ? 'checked' : '' ?>>
                                Todas as avaliações
                            </label>
                        </li>
                        <?php for ($estrela = 5; $estrela >= 1; $estrela--): ?>
                            <li>
                                <label>
                                    <input type="radio" name="avaliacao" value="<?= $estrela ?>" <?= $avaliacao == $estrela ? 'checked' : '' ?>>
                                    <span class="estrelas-filtro">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $estrela ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
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

                    <input type="hidden" name="avaliacao" value="<?= $avaliacao ?>">

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
                    <div class="cartao-produto">

                        <?php if ($p['desconto'] > 0): ?>
                            <span class="selo-desconto">
                                <?= number_format(($p['desconto'] / $p['preco_unitario']) * 100, 0) ?>%
                            </span>
                        <?php endif; ?>

                        <div class="imagem-produto-placeholder">
                            <img src="../../imagens/produto-sem-imagem.png" style="max-width:100%;">
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

                        <?php if ($p['desconto'] > 0): ?>
                            <span class="preco-antigo">
                                R$ <?= number_format($p['preco_unitario'] + $p['desconto'], 2, ',', '.') ?>
                            </span>
                        <?php endif; ?>

                        <div class="preco-produto">
                            R$ <?= number_format($p['preco_unitario'], 2, ',', '.') ?>
                        </div>

                        <div class="parcelamento">
                            ou 5x de R$ <?= number_format($p['preco_unitario'] / 5, 2, ',', '.') ?>
                        </div>

                        <button class="btn btn-laranja btn-comprar-block">
                            <i class="fa-solid fa-cart-plus"></i>
                            Comprar
                        </button>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

    </main>

</body>

</html>