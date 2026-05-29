<link rel="stylesheet" href="\Casas-Brasilite\partials-css\header.css">

<div class="barra-topo">
    <div class="container barra-topo-conteudo">
        <div class="topo-esquerda">
            <span><i class="fas fa-truck"></i> Frete grátis acima de R$ 199</span>
            <span><i class="fas fa-credit-card"></i> Até 10x sem juros</span>
            <span><i class="fab fa-whatsapp"></i> Atendimento via WhatsApp</span>
        </div>

        <div class="topo-direita">
            <a href="\Casas-Brasilite\janelas\pedidos\pedidos.php"><i class="fas fa-box"></i> Meus pedidos</a>
            <a href="#">Ajuda</a>
        </div>
    </div>
</div>

<header class="cabecalho-principal">
    <div class="container cabecalho-conteudo">

        <a href="/Casas-Brasilite/index.php" class="logo">
            <img src="/Casas-Brasilite/imagens/logo1.png">
        </a>

        <form class="barra-pesquisa" action="pesquisa.php" method="GET">

            <input type="text" name="busca" placeholder="O que você procura?" required>
            <button class="btn-pesquisa" type="submit"><i class="fas fa-search"></i></button>

        </form>

        <div class="acoes-usuario">

            <a href="#" class="icone-acao">
                <i class="far fa-heart"></i>
                <span>Favoritos</span>
            </a>

            <a href="\Casas-Brasilite\janelas\cadastro-login\login.php" class="icone-acao">
                <i class="far fa-user"></i>
                <span>Entrar</span>
            </a>

            <a href="\Casas-Brasilite\janelas\carrinho\carrinho.php" class="icone-acao carrinho">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge-carrinho">0</span>
                <span>Carrinho</span>
            </a>

        </div>
    </div>
</header>

<nav class="menu-navegacao">
    <div class="container menu-conteudo">
        <div class="menu-departamentos">

            <div class="departamentos">
                <i class="fas fa-bars"></i>
                <span>Departamentos</span>
            </div>

            <div class="dropdown-departamentos">

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php">
                    <i class="fa-solid fa-cart-flatbed-suitcase"></i> Todas Categorias
                </a>

                <strong>Ferramentas</strong>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=1">Ferramentas Manuais</a>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=2">Ferramentas Elétricas</a>

                <strong>Materiais</strong>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=3">Cimentos</a>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=4">Argamassas</a>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=5">Blocos</a>

                <strong>Acabamento</strong>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=6">Pisos</a>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=7">Revestimentos</a>
                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=8">Tintas</a>

            </div>

        </div>

        <ul class="lista-links">

            <li>
                <a href="/Casas-Brasilite/index.php#mais-vendidos">
                    Mais vendidos
                </a>
            </li>

            <li>
                <a href="/Casas-Brasilite/index.php#ofertas">
                    Promoções
                </a>
            </li>

            <li>
                <a href="/Casas-Brasilite/index.php#parcerias">
                    Parcerias
                </a>
            </li>

            <li>
                <a href="/Casas-Brasilite/index.php#avaliaçoes">
                    Avaliações
                </a>
            </li>

            <li>
                <a href="/Casas-Brasilite/index.php#orcamentos" class="link-laranja">
                    Orçamentos
                </a>
            </li>

        </ul>
        <div class="localizacao">
            <i class="fas fa-map-marker-alt"></i>
            <div class="texto-local">
                <span>Enviar para:</span>
                <strong>Informe seu CEP</strong>
            </div>
        </div>
    </div>
</nav>