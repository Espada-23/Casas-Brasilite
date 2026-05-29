<?php
require_once "../../Crud/crud.php";
$id_produto = $_GET['id'];
require_once "filtro.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title><?= $produto['nome_produto'] ?> - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="janela-produto.css">
</head>

<?php include_once "../../partials/header.php" ?>

<body>

    <section class="pagina-produto">
        <div class="container">

            <div class="grid-produto">

                <div class="galeria-produto">

                    <div class="miniaturas">
                        <?php
                        foreach ($fotos as $lista => $foto):
                            $classe_ativa = ($lista === 0) ? 'ativa' : '';
                        ?>
                            <div class="miniatura <?= $classe_ativa ?>">
                                <img src="../../<?= $foto['caminho_imagem'] ?>" alt="<?= $produto['nome_produto'] ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="imagem-principal-produto">
                        <img src="../../<?= $produto['caminho_imagem'] ?>" alt="<?= $produto['nome_produto'] ?>">
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
                                if ($i <= $media_nota) {
                                    echo '<i class="fas fa-star"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                        </div>

                        <span><?= $media_exibicao ?> (<?= $total_avaliacoes ?> <?= $total_avaliacoes == 1 ? 'avaliação' : 'avaliações' ?>)</span>

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

                    <p class="parcelamento-produto">
                        em <strong>3x R$ <?= number_format($preco_atual / 3, 2, ',', '.') ?> sem juros</strong>
                    </p>

                    <div class="frete-produto">
                        <i class="fas fa-truck"></i>
                        <div>
                            <strong>Chegará entre terça-feira e quarta-feira</strong>
                            <p><?= ($produto['frete'] > 0 && $produto['preco_unitario'] <= 199) ? "Frete: R$ " . number_format($produto['frete'], 2, ',', '.') : "Frete grátis" ?></p>
                        </div>
                    </div>

                    <form action="../carrinho/processar-carrinho.php" method="POST">

                        <input type="hidden" name="id_produto" value="<?= $id_produto ?>">
                        <input type="hidden" name="url_origem" value="<?= $_SERVER['REQUEST_URI'] ?>">

                        <div class="quantidade-produto">
                            <label for="campo-quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" id="campo-quantidade" value="1" min="1" max="<= $" step="1" required>
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
                    <h3>Produtos relacionados</h3>
                </div>

                <div class="grid-produtos">
                    <div class="cartao-produto">
                        <div class="imagem-produto-placeholder">
                            <img src="https://static3.tcdn.com.br/img/img_prod/123456/parafusadeira.png" alt="">
                        </div>
                        <h4 class="titulo-produto">Parafusadeira e Furadeira Dewalt</h4>
                        <div class="preco-produto">R$ 439,90</div>
                        <p class="parcelamento">10x R$ 43,99 sem juros</p>
                    </div>

                    <div class="cartao-produto">
                        <div class="imagem-produto-placeholder">
                            <img src="https://static3.tcdn.com.br/img/img_prod/123456/esmerilhadeira.png" alt="">
                        </div>
                        <h4 class="titulo-produto">Esmerilhadeira Bosch 850W</h4>
                        <div class="preco-produto">R$ 197,90</div>
                        <p class="parcelamento">8x R$ 24,74 sem juros</p>
                    </div>

                    <div class="cartao-produto">
                        <div class="imagem-produto-placeholder">
                            <img src="https://static3.tcdn.com.br/img/img_prod/123456/maleta.png" alt="">
                        </div>
                        <h4 class="titulo-produto">Jogo de Ferramentas com Maleta</h4>
                        <div class="preco-produto">R$ 159,90</div>
                        <p class="parcelamento">6x R$ 26,65 sem juros</p>
                    </div>

                    <div class="cartao-produto">
                        <div class="imagem-produto-placeholder">
                            <img src="https://static3.tcdn.com.br/img/img_prod/123456/trena.png" alt="">
                        </div>
                        <h4 class="titulo-produto">Trena Emborrachada 5m</h4>
                        <div class="preco-produto">R$ 39,90</div>
                        <p class="parcelamento">4x R$ 9,98 sem juros</p>
                    </div>
                </div>
            </section>

        </div>
    </section>

</body>

</html>