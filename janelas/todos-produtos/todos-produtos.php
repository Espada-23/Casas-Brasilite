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

</head>

<body>

    <?php include_once "../../partials\header.php" ?>

    <main class="container page-layout">

        <aside class="sidebar-filtros">
            <h3 class="titulo-filtros">Filtros</h3>

            <div class="bloco-filtro">
                <h4>Categorias <i class="fa-solid fa-chevron-up"></i></h4>
                <ul class="lista-filtros">
                    <li><label><input type="checkbox"> Ferramentas Elétricas <span class="qtd">(103)</span></label></li>
                    <li><label><input type="checkbox"> Ferramentas Manuais <span class="qtd">(62)</span></label></li>
                    <li><label><input type="checkbox"> Acessórios <span class="qtd">(45)</span></label></li>
                    <li><label><input type="checkbox"> Máquinas <span class="qtd">(35)</span></label></li>
                </ul>
            </div>

            <div class="bloco-filtro">
                <h4>Faixa de preço <i class="fa-solid fa-chevron-up"></i></h4>
                <div class="filtro-preco-inputs">
                    <input type="text" placeholder="R$ 0">
                    <span>a</span>
                    <input type="text" placeholder="R$ 1.000">
                </div>
                <button class="btn btn-filtro-aplicar">Aplicar</button>
            </div>

            <div class="bloco-filtro">
                <h4>Marcas <i class="fa-solid fa-chevron-up"></i></h4>
                <ul class="lista-filtros">
                    <li><label><input type="checkbox"> Bosch <span class="qtd">(68)</span></label></li>
                    <li><label><input type="checkbox"> Vonder <span class="qtd">(52)</span></label></li>
                    <li><label><input type="checkbox"> Tramontina <span class="qtd">(41)</span></label></li>
                    <li><label><input type="checkbox"> Makita <span class="qtd">(35)</span></label></li>
                    <li><label><input type="checkbox"> DeWalt <span class="qtd">(28)</span></label></li>
                </ul>
                <a href="#" class="ver-mais-link">Ver mais</a>
            </div>

            <div class="bloco-filtro">
                <h4>Avaliação <i class="fa-solid fa-chevron-up"></i></h4>
                <ul class="lista-filtros avaliacao-filtros">
                    <li><label><input type="checkbox"> <span class="estrelas-filtro"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                    <li><label><input type="checkbox"> <span class="estrelas-filtro"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></span>
                    <li><label><input type="checkbox"> <span class="estrelas-filtro"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span>
                </ul>
            </div>

            <div class="bloco-filtro">
                <h4>Disponibilidade <i class="fa-solid fa-chevron-up"></i></h4>
                <ul class="lista-filtros">
                    <li><label><input type="checkbox"> Em estoque <span class="qtd">(198)</span></label></li>
                    <li><label><input type="checkbox"> Promoção <span class="qtd">(53)</span></label></li>
                </ul>
            </div>
        </aside>

        <section class="conteudo-lista">
            <div class="cabecalho-resultados">
                <h2 style="font-size: 2rem; color: var(--azul-escuro); font-weight: 800;">Ferramentas</h2>
                <div class="ordenacao">
                    <label>Ordenar por: </label>
                    <select>
                        <option>Mais vendidos</option>
                        <option>Menor Preço</option>
                        <option>Maior Preço</option>
                    </select>
                </div>
            </div>

            <div class="grid-produtos">
                <?php foreach ($produtos as $produto): ?>
                    <div class="cartao-produto">

                        <?php if (!empty($produto['desconto'])): ?>
                            <span class="selo-desconto">
                                -<?= $produto['desconto'] ?>%
                            </span>
                        <?php endif; ?>

                        <i class="fa-regular fa-heart icone-favoritar"></i>

                        <div class="imagem-produto-placeholder" style="background: transparent;">
                            <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" style="max-width: 100%; object-fit: contain;">
                        </div>

                        <span class="tag-estoque">
                            <?= !empty($produto['em_estoque']) && $produto['em_estoque'] ? 'Em estoque' : 'Esgotado' ?>
                        </span>

                        <h3 class="titulo-produto">
                            <?= $produto['nome'] ?>
                        </h3>

                        <div class="estrelas-produto">
                            <!-- colocar a alteração das estrelas pelo banco aqui, por enquanto estão fixas -->
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                            (<?= $produto['avaliacoes'] ?>)
                        </div>

                        <?php if (!empty($produto['preco_antigo'])): ?>
                            <span class="preco-antigo">
                                R$ <?= number_format($produto['preco_antigo'], 2, ',', '.') ?>
                            </span>
                        <?php endif; ?>

                        <div class="preco-produto">
                            R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </div>

                        <?php if (!empty($produto['parcelas'])): ?>
                            <div class="parcelamento">
                                ou <?= $produto['parcelas'] ?>x de R$ <?= number_format($produto['preco'] / $produto['parcelas'], 2, ',', '.') ?>
                            </div>
                        <?php endif; ?>

                        <button class="btn btn-laranja btn-comprar-block">
                            <i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho
                        </button>

                    </div>
                <?php endforeach; ?>
            </div>

            <div class="paginacao">
                <button class="btn-pag">&lt;</button>
                <button class="btn-pag ativo">1</button>
                <button class="btn-pag">2</button>
                <button class="btn-pag">3</button>
                <button class="btn-pag">4</button>
                <span>...</span>
                <button class="btn-pag">11</button>
                <button class="btn-pag">&gt;</button>
            </div>

        </section>
    </main>

</body>

</html>