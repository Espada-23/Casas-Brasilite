<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "Crud/crud.php";
require_once "Crud/init.php";


$_SESSION['cep_index'] = isset($_GET['a']) ? $_GET['a'] : null;

$registros_pesquisa = 0;

$sql_promo = "
SELECT p.*, MIN(f.caminho_imagem) as caminho_imagem
FROM produto p
LEFT JOIN foto_produto f 
ON p.id_produto = f.idProduto
WHERE p.desconto IS NOT NULL AND p.desconto > 0
GROUP BY p.id_produto
LIMIT 4
";

$stmt = $pdo->query($sql_promo);
$produtos_promo = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_melhores = "
SELECT 
    p.*, 
    MIN(f.caminho_imagem) AS caminho_imagem,
    AVG(a.nota) AS media_avaliacao
FROM produto p
INNER JOIN avaliacao a 
    ON p.id_produto = a.idProduto
LEFT JOIN foto_produto f 
    ON p.id_produto = f.idProduto
GROUP BY p.id_produto
HAVING ROUND(AVG(a.nota)) IN (5, 4)
ORDER BY media_avaliacao DESC
LIMIT 5
";

$stmt_melhores = $pdo->query($sql_melhores);
$melhoresAvaliados = $stmt_melhores->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Casas-Brasilite/imagens/icon.png" type="image/x-icon">
    <title>Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php include_once "partials/header.php"; ?>

    <?php if($registros_pesquisa == 1 ): ?>
                <div class="main-resultados">
                    <div class="resultados-busca">
                        <?php if (!empty($resultados)):
                            foreach ($resultados as $res): ?>
                                <div class="item-resultado">
                                    <div class="info-resultado">
                                        <a href="clientes.php?id_filtrado=<?= $res['id_usuario']; ?>" class="link-resultado">
                                            <div class="info-resultado">
                                                <span>
                                                    <i class="bi bi-person"></i>
                                                    <span class="nome-resultado"><?= htmlspecialchars($res['nome']); ?></span>
                                                </span>
                                                <span>
                                                    <span class="email-resultado"><?= htmlspecialchars($res['email']); ?></span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                                <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                                <?= !empty($mensagem_pesquisa) ? $mensagem_pesquisa : "Nenhum usuário encontrado."; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

    <section class="banner-principal">
        <div class="container banner-conteudo">
            <div class="texto-banner-centro">
                <h2 class="titulo-banner">"Nenhum sonho é pequeno demais<br>para uma <span
                        class="destaque-laranja">grande obra.</span>"</h2>
                <div class="botoes-banner">
                    <a href="#ofertas" class="btn btn-azul">Ver ofertas</a>
                    <a href="#sobre-nos" class="btn btn-laranja">Sobre nós</a>
                </div>
            </div>
        </div>
    </section>

    <section class="secao-vantagens">
        <div class="container grid-vantagens">
            <div class="item-vantagem">
                <i class="fas fa-shipping-fast"></i>
                <div>
                    <strong>Entrega Rápida</strong>
                    <p>Para todo o Brasil</p>
                </div>
            </div>
            <div class="item-vantagem">
                <i class="fas fa-shield-alt"></i>
                <div>
                    <strong>Compra Secura</strong>
                    <p>Seus dados protegidos</p>
                </div>
            </div>
            <div class="item-vantagem">
                <i class="fas fa-tag"></i>
                <div>
                    <strong>Melhores preços</strong>
                    <p>Ofertas todos os dias</p>
                </div>
            </div>
        </div>
    </section>

    <section class="secao-categorias-topo">
        <div class="container">
            <h3 class="titulo-secao-esquerda">Categorias em destaque</h3>

            <div class="grid-categorias-circulos">

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=materiais" class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="imagens/materiais.png">
                        <span>Materiais</span>
                    </div>
                </a>

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=ferramentas" class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="imagens/ferramentas.png">
                        <span>Ferramentas</span>
                    </div>
                </a>

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=acabamento" class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="imagens/acabamento.webp">
                        <span>Acabamento</span>
                    </div>
                </a>

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=obras_estruturas" class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="imagens/estruturas.webp">
                        <span>Estruturas</span>
                    </div>
                </a>

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=seguranca" class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="imagens/epi.png">
                        <span>EPI</span>
                    </div>
                </a>

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?disponibilidade=promocao" class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="imagens/ofertas.png">
                        <span>Ofertas</span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <section id="mais-vendidos" class="secao-produtos">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>Melhores avaliados</h3>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?avaliacao%5B%5D=5&avaliacao%5B%5D=4&preco_min=&preco_max=" class="link-ver-todos">Ver todos <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="produtos-container">
                <div class="wrapper">
                    <div class="grid-produtos">

                        <?php foreach ($melhoresAvaliados as $produto): ?>
                            <div class="cartao-produto">

                                <?php if (!empty($produto['desconto']) && $produto['desconto'] != 0): ?>
                                    <span class="selo-desconto">
                                        <?= round($produto['desconto'], 0) ?>%
                                    </span>
                                <?php endif; ?>

                                <a href="janelas/janela-favoritos/favoritar.php?id=<?= $produto['id_produto'] ?>" class="icone-favoritar">
                                    <i class="<?= in_array($produto['id_produto'], $_SESSION['favoritos'])
                                                    ? 'fa-solid fa-heart'
                                                    : 'fa-regular fa-heart' ?>"></i>
                                </a>

                                <a href="janelas/janela-produto/janela-produto.php?id=<?= $produto['id_produto'] ?>">
                                    <div class="imagem-produto-placeholder">
                                        <img src="<?= $produto['caminho_imagem'] ?>" alt="<?= $produto['nome_produto'] ?>">
                                    </div>

                                    <h4 class="titulo-produto">
                                        <?= $produto['nome_produto'] ?>
                                    </h4>

                                    <p class="preco-produto">
                                        R$ <?= number_format($produto['preco_unitario'], 2, ',', '.') ?>
                                    </p>

                                    <?php if (!empty($produto['desconto']) && $produto['desconto'] > 0): ?>
                                        <?php if ($produto['desconto'] < 100) {
                                            $precoAntigo = $produto['preco_unitario'] / (1 - ($produto['desconto'] / 100));
                                        } else {
                                            $precoAntigo = $produto['preco_unitario'];
                                        } ?>
                                        <p class="preco-antigo">
                                            R$ <?= $precoAntigo = round($precoAntigo, 2); ?>
                                        </p>
                                    <?php endif; ?>

                                    <p class="parcelamento">
                                        ou 3x de R$
                                        <?= number_format($produto['preco_unitario'] / 3, 2, ',', '.') ?>
                                    </p>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ofertas" class="secao-ofertas-semana">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>Ofertas da semana</h3>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?disponibilidade=promocao" class="link-ver-todos">Ver todas <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="bloco-ofertas">
                <div class="cartao-cronometro">
                    <h3>OFERTAS POR<br>TEMPO LIMITADO!</h3>
                    <p>Aproveite enquanto dura.</p>
                    <div class="cronometro">
                        <div class="tempo"><strong>02</strong><span>DIAS</span></div>
                        <div class="tempo"><strong>14</strong><span>HORAS</span></div>
                        <div class="tempo"><strong>36</strong><span>MIN</span></div>
                        <div class="tempo"><strong>48</strong><span>SEG</span></div>
                    </div>
                </div>

                <?php foreach ($produtos_promo as $produto_promo): ?>

                    <div class="cartao-produtos cartao-oferta">

                        <?php if (!empty($produto_promo['desconto']) && $produto_promo['desconto'] > 0): ?>
                            <span class="selo-desconto">
                                <?= round($produto_promo['desconto'], 0) ?>%
                            </span>
                        <?php endif; ?>

                        <a href="janelas/janela-favoritos/favoritar.php?id=<?= $produto_promo['id_produto'] ?>" class="icone-favoritar">
                            <i class="<?= in_array($produto_promo['id_produto'], $_SESSION['favoritos'])
                                            ? 'fa-solid fa-heart'
                                            : 'fa-regular fa-heart' ?>"></i>
                        </a>

                        <div class="imagem-produto-placeholder">
                            <img src="<?= $produto_promo['caminho_imagem'] ?>" alt="<?= $produto_promo['nome_produto'] ?>">
                        </div>

                        <h4 class="titulo-produto">
                            <?= $produto_promo['nome_produto'] ?>
                        </h4>

                        <p class="preco-produto">
                            R$ <?= number_format($produto_promo['preco_unitario'], 2, ',', '.') ?>
                        </p>

                        <?php if (!empty($produto_promo['desconto']) && $produto_promo['desconto'] > 0): ?>
                            <?php if ($produto['desconto'] < 100) {
                                $precoAntigo = $produto['preco_unitario'] / (1 - ($produto['desconto'] / 100));
                            } else {
                                $precoAntigo = $produto['preco_unitario'];
                            } ?>
                            <p class="preco-antigo">
                                R$ <?= $precoAntigo = round($precoAntigo, 2); ?>
                            </p>
                        <?php endif; ?>

                        <p class="parcelamento">
                            ou 10x de R$ <?= number_format($produto_promo['preco_unitario'] / 10, 2, ',', '.') ?>
                        </p>

                        <a href="janelas/janela-produto/janela-produto.php?id=<?= $produto_promo['id_produto'] ?>" class="link-card-produto">
                            <button class="btn btn-laranja btn-comprar-card">
                                Ver Informações
                            </button>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section id="orcamentos" class="secao-banner-interno">
        <div class="container">
            <div class="banner-solucoes">
                <div class="conteudo-banner-solucoes">
                    <h2>Soluções completas<br>para sua obra.</h2>
                    <p>Qualidade, segurança e os melhores<br>materiais para cada etapa.</p>
                    <button class="btn btn-laranja">Faça seu orçamento</button>
                </div>
            </div>
        </div>
    </section>

    <section class="secao-categorias-destaque">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>Produtos por categoria</h3>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php" class="link-ver-todos">Ver todas <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="grid-categorias-destaque">
                <div class="cartao-categoria-img estrutura-bg">
                    <div class="conteudo-cat-img">
                        <h4>Estruturas</h4>
                        <p>Tudo para fundação<br>e estrutura da sua obra</p>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=obras_estruturas" class="btn-branco">Ver produtos</a>
                    </div>
                </div>
                <div class="cartao-categoria-img materiais-bg">
                    <div class="conteudo-cat-img">
                        <h4>Materiais</h4>
                        <p>Materiais básicos<br>com qualidade garantida</p>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=materiais" class="btn-branco">Ver produtos</a>
                    </div>
                </div>
                <div class="cartao-categoria-img ferramentas-bg">
                    <div class="conteudo-cat-img">
                        <h4>Ferramentas</h4>
                        <p>Ferramentas para todos<br>os tipos de trabalho</p>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=ferramentas" class="btn-branco">Ver produtos</a>
                    </div>
                </div>
                <div class="cartao-categoria-img epi-bg">
                    <div class="conteudo-cat-img">
                        <h4>EPI</h4>
                        <p>Segurança em primeiro<br>lugar na sua obra</p>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=seguranca" class="btn-branco">Ver produtos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="parcerias" class="secao-marcas">
        <div class="container">
            <h3 class="titulo-marcas">Nossos Principais Parceiros</h3>
            <div class="carrossel-marcas">
                <div class="carrossel-track">
                    <div class="parceiro-logo"><img src="https://melhorindustria.com.br/media/image/82/ff/09/tigre-logo-2.png" alt="tigre"></div>
                    <div class="parceiro-logo"><img src="https://logodownload.org/wp-content/uploads/2019/07/coral-logo-0.png" alt="coral"></div>
                    <div class="parceiro-logo"><img src="https://cdn.cookielaw.org/logos/27e912f4-2342-4569-b692-c1d67f9a1d91/def26e55-fce3-456f-b2a9-5a41ec372e27/5f00bf70-54d6-4d75-815f-bd6a5e36354d/Logo_VC_-_One_Trust.png" alt="votorantim"></div>
                    <div class="parceiro-logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Tramontina-Logo.svg/1280px-Tramontina-Logo.svg.png" alt="tramontina"></div>
                    <div class="parceiro-logo"><img src="https://lojasolar.vtexassets.com/arquivos/ids/164344-auto-262.5?width=auto&height=262.5&aspect=true" alt="vonder"></div>

                    <div class="parceiro-logo"><img src="https://melhorindustria.com.br/media/image/82/ff/09/tigre-logo-2.png" alt="tigre"></div>
                    <div class="parceiro-logo"><img src="https://logodownload.org/wp-content/uploads/2019/07/coral-logo-0.png" alt="coral"></div>
                    <div class="parceiro-logo"><img src="https://cdn.cookielaw.org/logos/27e912f4-2342-4569-b692-c1d67f9a1d91/def26e55-fce3-456f-b2a9-5a41ec372e27/5f00bf70-54d6-4d75-815f-bd6a5e36354d/Logo_VC_-_One_Trust.png" alt="votorantim"></div>
                    <div class="parceiro-logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Tramontina-Logo.svg/1280px-Tramontina-Logo.svg.png" alt="tramontina"></div>
                    <div class="parceiro-logo"><img src="https://lojasolar.vtexassets.com/arquivos/ids/164344-auto-262.5?width=auto&height=262.5&aspect=true" alt="vonder"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre-nos" class="secao-sobre-nos">
        <div class="container">
            <div class="caixa-sobre-nos">
                <div class="texto-sobre">
                    <h3>Sobre a Casas Brasilite</h3>
                    <p>Somos especialistas em materiais para construção civil e fundação. Aqui você encontra qualidade,
                        variedade e os melhores preços para sua obra avançar com segurança e eficiência.</p>
                    <a href="janelas/sobre/sobre.php" class="btn btn-azul-escuro">Saiba mais</a>
                </div>
                <div class="beneficios-sobre">
                    <div class="grid-beneficios-sobre">
                        <div class="item-beneficio-sobre">
                            <div class="circulo-icone"><i class="fas fa-headset"></i></div>
                            <strong>Atendimento especializado</strong>
                            <p>Equipe pronta para ajudar você</p>
                        </div>
                        <div class="item-beneficio-sobre">
                            <div class="circulo-icone"><i class="fas fa-award"></i></div>
                            <strong>Qualidade garantida</strong>
                            <p>Produtos de confiança das melhores marcas</p>
                        </div>
                        <div class="item-beneficio-sobre">
                            <div class="circulo-icone"><i class="fas fa-truck"></i></div>
                            <strong>Entrega rápida e segura</strong>
                            <p>Para todo o Brasil com agilidade</p>
                        </div>
                        <div class="item-beneficio-sobre">
                            <div class="circulo-icone"><i class="far fa-credit-card"></i></div>
                            <strong>Pagamento facilitado</strong>
                            <p>Diversas formas de pagamento</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="avaliaçoes" class="secao-depoimentos">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>O que nossos clientes dizem</h3>
            </div>

            <div class="carrossel-depoimentos">
                <div class="wrapper">
                    <div class="grid-depoimentos">

                        <div class="cartao-depoimento">
                            <div class="estrelas">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="texto-avaliacao">Produtos de excelente qualidade e entrega super rápida. Recomendo a Casas Brasilite!</p>
                            <div class="cliente-info">
                                <div>
                                    <strong>Carlos Almeida</strong>
                                    <span>São Paulo - SP</span>
                                </div>
                            </div>
                        </div>

                        <div class="cartao-depoimento">
                            <div class="estrelas">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="texto-avaliacao">Encontrei tudo que precisava para minha obra. Preços justos e ótimo atendimento.</p>
                            <div class="cliente-info">
                                <div>
                                    <strong>Mariana Silva</strong>
                                    <span>Campinas - SP</span>
                                </div>
                            </div>
                        </div>

                        <div class="cartao-depoimento">
                            <div class="estrelas">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="texto-avaliacao">Loja confiável e com muitas opções. Voltarei a comprar!</p>
                            <div class="cliente-info">
                                <div>
                                    <strong>João Ferreira</strong>
                                    <span>Sorocaba - SP</span>
                                </div>
                            </div>
                        </div>

                        <div class="cartao-depoimento">
                            <div class="estrelas">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="texto-avaliacao">Melhor preço da região e o material de fundação é excelente. Nota 10!</p>
                            <div class="cliente-info">
                                <div>
                                    <strong>Pedro Santos</strong>
                                    <span>Santos - SP</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once "partials/footer.php" ?>

</body>

</html>