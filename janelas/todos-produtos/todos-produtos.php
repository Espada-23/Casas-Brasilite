<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas Brasilite - Todas Categorias</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\teste\style.css">
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
                    <li><label><input type="checkbox"> <span class="estrelas-filtro"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span> <span class="qtd">(98)</span></label></li>
                    <li><label><input type="checkbox"> <span class="estrelas-filtro"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></span> <span class="qtd">(74)</span></label></li>
                    <li><label><input type="checkbox"> <span class="estrelas-filtro"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></span> <span class="qtd">(45)</span></label></li>
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

            <div class="grid-produtos-4">

                <div class="cartao-produto">
                    <span class="selo-desconto">-15%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Furadeira" alt="Furadeira Bosch" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Furadeira de Impacto Bosch 550W 127V GSB 550</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i> (128)</div>
                    <span class="preco-antigo">R$ 352,90</span>
                    <div class="preco-produto">R$ 299,90</div>
                    <div class="parcelamento">ou 10x de R$ 29,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Parafusadeira" alt="Parafusadeira DeWalt" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Parafusadeira e Furadeira DeWalt 12V 3/8" DCD700LC1</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (96)</div>
                    <br>
                    <div class="preco-produto">R$ 439,90</div>
                    <div class="parcelamento">ou 10x de R$ 43,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <span class="selo-desconto">-10%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Esmerilhadeira" alt="Esmerilhadeira" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Esmerilhadeira Angular Bosch 4.1/2" 850W GWS 850</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (74)</div>
                    <span class="preco-antigo">R$ 219,90</span>
                    <div class="preco-produto">R$ 197,90</div>
                    <div class="parcelamento">ou 8x de R$ 24,74</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Maleta+Vonder" alt="Maleta" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Jogo de Ferramentas Vonder 110 Peças com Maleta</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> (63)</div>
                    <br>
                    <div class="preco-produto">R$ 159,90</div>
                    <div class="parcelamento">ou 5x de R$ 26,65</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>
                <div class="cartao-produto">
                    <span class="selo-desconto">-15%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Furadeira" alt="Furadeira Bosch" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Furadeira de Impacto Bosch 550W 127V GSB 550</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i> (128)</div>
                    <span class="preco-antigo">R$ 352,90</span>
                    <div class="preco-produto">R$ 299,90</div>
                    <div class="parcelamento">ou 10x de R$ 29,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Parafusadeira" alt="Parafusadeira DeWalt" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Parafusadeira e Furadeira DeWalt 12V 3/8" DCD700LC1</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (96)</div>
                    <br>
                    <div class="preco-produto">R$ 439,90</div>
                    <div class="parcelamento">ou 10x de R$ 43,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <span class="selo-desconto">-10%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Esmerilhadeira" alt="Esmerilhadeira" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Esmerilhadeira Angular Bosch 4.1/2" 850W GWS 850</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (74)</div>
                    <span class="preco-antigo">R$ 219,90</span>
                    <div class="preco-produto">R$ 197,90</div>
                    <div class="parcelamento">ou 8x de R$ 24,74</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Maleta+Vonder" alt="Maleta" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Jogo de Ferramentas Vonder 110 Peças com Maleta</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> (63)</div>
                    <br>
                    <div class="preco-produto">R$ 159,90</div>
                    <div class="parcelamento">ou 5x de R$ 26,65</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>
                <div class="cartao-produto">
                    <span class="selo-desconto">-15%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Furadeira" alt="Furadeira Bosch" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Furadeira de Impacto Bosch 550W 127V GSB 550</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i> (128)</div>
                    <span class="preco-antigo">R$ 352,90</span>
                    <div class="preco-produto">R$ 299,90</div>
                    <div class="parcelamento">ou 10x de R$ 29,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Parafusadeira" alt="Parafusadeira DeWalt" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Parafusadeira e Furadeira DeWalt 12V 3/8" DCD700LC1</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (96)</div>
                    <br>
                    <div class="preco-produto">R$ 439,90</div>
                    <div class="parcelamento">ou 10x de R$ 43,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <span class="selo-desconto">-10%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Esmerilhadeira" alt="Esmerilhadeira" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Esmerilhadeira Angular Bosch 4.1/2" 850W GWS 850</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (74)</div>
                    <span class="preco-antigo">R$ 219,90</span>
                    <div class="preco-produto">R$ 197,90</div>
                    <div class="parcelamento">ou 8x de R$ 24,74</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Maleta+Vonder" alt="Maleta" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Jogo de Ferramentas Vonder 110 Peças com Maleta</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> (63)</div>
                    <br>
                    <div class="preco-produto">R$ 159,90</div>
                    <div class="parcelamento">ou 5x de R$ 26,65</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>
                <div class="cartao-produto">
                    <span class="selo-desconto">-15%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Furadeira" alt="Furadeira Bosch" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Furadeira de Impacto Bosch 550W 127V GSB 550</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i> (128)</div>
                    <span class="preco-antigo">R$ 352,90</span>
                    <div class="preco-produto">R$ 299,90</div>
                    <div class="parcelamento">ou 10x de R$ 29,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Parafusadeira" alt="Parafusadeira DeWalt" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Parafusadeira e Furadeira DeWalt 12V 3/8" DCD700LC1</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (96)</div>
                    <br>
                    <div class="preco-produto">R$ 439,90</div>
                    <div class="parcelamento">ou 10x de R$ 43,99</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <span class="selo-desconto">-10%</span>
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Esmerilhadeira" alt="Esmerilhadeira" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Esmerilhadeira Angular Bosch 4.1/2" 850W GWS 850</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i> (74)</div>
                    <span class="preco-antigo">R$ 219,90</span>
                    <div class="preco-produto">R$ 197,90</div>
                    <div class="parcelamento">ou 8x de R$ 24,74</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

                <div class="cartao-produto">
                    <i class="fa-regular fa-heart icone-favoritar"></i>
                    <div class="imagem-produto-placeholder" style="background: transparent;">
                        <img src="https://via.placeholder.com/150?text=Maleta+Vonder" alt="Maleta" style="max-width: 100%; object-fit: contain;">
                    </div>
                    <span class="tag-estoque">Em estoque</span>
                    <h3 class="titulo-produto">Jogo de Ferramentas Vonder 110 Peças com Maleta</h3>
                    <div class="estrelas-produto"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> (63)</div>
                    <br>
                    <div class="preco-produto">R$ 159,90</div>
                    <div class="parcelamento">ou 5x de R$ 26,65</div>
                    <button class="btn btn-laranja btn-comprar-block"><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                </div>

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