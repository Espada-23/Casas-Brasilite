<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas Brasilite - Página Inicial</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include_once "partials\header.php" ?>

    <section class="banner-principal">
        <div class="container banner-conteudo">
            <div class="texto-banner-centro">
                <h2 class="titulo-banner">"Nenhum sonho é pequeno demais<br>para uma <span
                        class="destaque-laranja">grande obra.</span>"</h2>
                <div class="botoes-banner">
                    <button class="btn btn-azul">Ver ofertas</button>
                    <button class="btn btn-laranja">Sobre nós</button>
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
                <div class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="https://media.canva.com/v2/image-resize/format:PNG/height:99/quality:100/uri:ifs%3A%2F%2FM%2Fc2adac7b-a167-4835-9c53-362597b081a3/watermark:F/width:150?csig=AAAAAAAAAAAAAAAAAAAAAMUcx8y7S0npcXdSNaaVGfctzMBbwF8u8zCKPGLlpSxb&exp=1779234668&osig=AAAAAAAAAAAAAAAAAAAAAFGdcBWNQTpuoTxP6lq7U3ZngtLvbFqJTB2q8ZvB_qaK&signer=media-rpc&x-canva-quality=micro_thumbnail">
                        <span>Materiais</span>
                    </div>
                </div>
                <div class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="https://media-public.canva.com/MAB1EWVLWBE/2/thumbnail-1.png">
                        <span>Ferramentas</span>
                    </div>
                </div>
                <div class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="https://media.canva.com/v2/image-resize/format:PNG/height:99/quality:100/uri:ifs%3A%2F%2FM%2Fd0edd934-dfad-40dc-be34-e43842a1b40f/watermark:F/width:150?csig=AAAAAAAAAAAAAAAAAAAAAJ9vVJhFWVTgQ1YK608Z227SW71MZdSGHZV-nEZn4bqT&exp=1779238107&osig=AAAAAAAAAAAAAAAAAAAAABvGyC13uvM2DvZQF0YFkjaobCc23JejHaVsnzYqdbIO&signer=media-rpc&x-canva-quality=micro_thumbnail">
                        <span>Acabamento</span>
                    </div>
                </div>
                <div class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="https://media.canva.com/v2/image-resize/format:PNG/height:93/quality:100/uri:ifs%3A%2F%2FM%2Fe29e02ed-a4a4-4162-97b8-bb0f26113080/watermark:F/width:150?csig=AAAAAAAAAAAAAAAAAAAAAMv46HpVDQMMMIuYbiY060eimF6rhpz0k3gLjovCUMD_&exp=1779235780&osig=AAAAAAAAAAAAAAAAAAAAAJYoy05G76o_bAvZk9kZ3lTty7cxE8nqKfQA0B2JIvN4&signer=media-rpc&x-canva-quality=micro_thumbnail">
                        <span>Estruturas</span>
                    </div>
                </div>
                <div class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="https://media-public.canva.com/MAB-3skysgA/2/thumbnail-1.png">
                        <span>EPI</span>
                    </div>
                </div>
                <div class="item-categoria-circulo">
                    <div class="fundo-imagem-cat">
                        <img src="data:image/png;base64,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">
                        <span>Ofertas</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secao-produtos">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>Mais vendidos</h3>
                <a href="#" class="link-ver-todos">Ver todos <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="carrossel-produtos-container">
                <button class="seta-carrossel-prod"><i class="fas fa-chevron-left"></i></button>
                <div class="grid-produtos">

                    <?php foreach ($produtos as $produto): ?>

                        <div class="cartao-produto">

                            <?php if (!empty($produto['desconto'])): ?>
                                <span class="selo-desconto">
                                    -
                                    <?= $produto['desconto'] ?>%
                                </span>
                            <?php endif; ?>

                            <div class="imagem-produto-placeholder">
                                <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                            </div>

                            <h4 class="titulo-produto">
                                <?= $produto['nome'] ?>
                            </h4>

                            <p class="preco-produto">
                                R$
                                <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </p>

                            <?php if (!empty($produto['preco_antigo'])): ?>
                                <p class="preco-antigo">
                                    R$
                                    <?= number_format($produto['preco_antigo'], 2, ',', '.') ?>
                                </p>
                            <?php endif; ?>

                            <p class="parcelamento">
                                ou
                                <?= $produto['parcelas'] ?>x de
                                R$
                                <?= number_format($produto['preco'] / $produto['parcelas'], 2, ',', '.') ?>
                            </p>

                        </div>

                    <?php endforeach; ?>

                </div>
                <button class="seta-carrossel-prod"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <section class="secao-ofertas-semana">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>Ofertas da semana</h3>
                <a href="#" class="link-ver-todos">Ver todas <i class="fas fa-arrow-right"></i></a>
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

                <?php foreach ($promocoes as $produto): ?>

                    <div class="cartao-produto cartao-oferta">

                        <?php if (!empty($produto['desconto'])): ?>
                            <span class="selo-desconto">
                                -
                                <?= $produto['desconto'] ?>%
                            </span>
                        <?php endif; ?>

                        <div class="imagem-produto-placeholder">
                            <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                        </div>

                        <h4 class="titulo-produto">
                            <?= $produto['nome'] ?>
                        </h4>

                        <div class="precos-bloco">

                            <p class="preco-produto">
                                R$
                                <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </p>

                            <?php if (!empty($produto['preco_antigo'])): ?>
                                <p class="preco-antigo">
                                    R$
                                    <?= number_format($produto['preco_antigo'], 2, ',', '.') ?>
                                </p>
                            <?php endif; ?>

                        </div>

                        <p class="parcelamento">
                            ou
                            <?= $produto['parcelas'] ?>x de
                            R$
                            <?= number_format($produto['preco'] / $produto['parcelas'], 2, ',', '.') ?>
                        </p>

                        <button class="btn btn-laranja btn-comprar-card">
                            Comprar
                        </button>

                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="secao-banner-interno">
        <div class="container">
            <div class="banner-solucoes">
                <div class="conteudo-banner-solucoes">
                    <h2>Soluções completas<br>para sua obra.</h2>
                    <p>Qualidade, segurança e os melhores<br>materiais para cada etapa.</p>
                    <button class="btn btn-laranja">Conheça nossos produtos</button>
                </div>
            </div>
        </div>
    </section>

    <section class="secao-categorias-destaque">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>Produtos por categoria</h3>
                <a href="#" class="link-ver-todos">Ver todas <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="grid-categorias-destaque">
                <div class="cartao-categoria-img estrutura-bg">
                    <div class="conteudo-cat-img">
                        <h4>Estruturas</h4>
                        <p>Tudo para fundação<br>e estrutura da sua obra</p>
                        <button class="btn-branco">Ver produtos</button>
                    </div>
                </div>
                <div class="cartao-categoria-img materiais-bg">
                    <div class="conteudo-cat-img">
                        <h4>Materiais</h4>
                        <p>Materiais básicos<br>com qualidade garantida</p>
                        <button class="btn-branco">Ver produtos</button>
                    </div>
                </div>
                <div class="cartao-categoria-img ferramentas-bg">
                    <div class="conteudo-cat-img">
                        <h4>Ferramentas</h4>
                        <p>Ferramentas para todos<br>os tipos de trabalho</p>
                        <button class="btn-branco">Ver produtos</button>
                    </div>
                </div>
                <div class="cartao-categoria-img epi-bg">
                    <div class="conteudo-cat-img">
                        <h4>EPI</h4>
                        <p>Segurança em primeiro<br>lugar na sua obra</p>
                        <button class="btn-branco">Ver produtos</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="secao-marcas">
        <div class="container">
            <h3 class="titulo-marcas">As melhores marcas para sua obra</h3>
            <div class="carrossel-marcas">
                <div class="lista-marcas">

                    <div class="logo-marca">
                        <img src="imagens/1.svg" alt="Vonder">
                    </div>

                    <div class="logo-marca">
                        <img src="imagens/2.svg" alt="Bosch">
                    </div>

                    <div class="logo-marca">
                        <img src="imagens/3.svg" alt="Tramontina">
                    </div>

                    <div class="logo-marca">
                        <img src="imagens/4.svg" alt="Tigre">
                    </div>

                    <div class="logo-marca">
                        <img src="imagens/5.svg" alt="Coral">
                    </div>

                    <div class="logo-marca">
                        <img src="imagens/6.svg" alt="Quartzolit">
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="secao-sobre-nos">
        <div class="container">
            <div class="caixa-sobre-nos">
                <div class="texto-sobre">
                    <h3>Sobre a Casas Brasilite</h3>
                    <p>Somos especialistas em materiais para construção civil e fundação. Aqui você encontra qualidade,
                        variedade e os melhores preços para sua obra avançar com segurança e eficiência.</p>
                    <button class="btn btn-azul-escuro">Saiba mais</button>
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

    <section class="secao-depoimentos">
        <div class="container">
            <div class="cabecalho-secao">
                <h3>O que nossos clientes dizem</h3>
            </div>

            <div class="grid-depoimentos">
                <div class="cartao-depoimento">
                    <div class="estrelas">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="texto-avaliacao">Produtos de excelente qualidade e entrega super rápida. Recomendo a
                        Casas Brasilite!</p>
                    <div class="cliente-info">
                        <div>
                            <strong>Carlos Almeida</strong>
                            <span>São Paulo - SP</span>
                        </div>
                    </div>
                </div>

                <div class="cartao-depoimento">
                    <div class="estrelas">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="texto-avaliacao">Encontrei tudo que precisava para minha obra. Preços justos e ótimo
                        atendimento.</p>
                    <div class="cliente-info">
                        <div>
                            <strong>Mariana Silva</strong>
                            <span>Campinas - SP</span>
                        </div>
                    </div>
                </div>

                <div class="cartao-depoimento">
                    <div class="estrelas">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="texto-avaliacao">Loja confiável e com muitas opções. Voltarei a comprar!</p>
                    <div class="cliente-info">
                        <div>
                            <strong>João Ferreira</strong>
                            <span>Sorocaba - SP</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php include_once "partials/footer.php" ?>

</body>

</html>