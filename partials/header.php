<link rel="stylesheet" href="\Casas-Brasilite\partials-css\header.css">

<div class="barra-topo">
    <div class="container barra-topo-conteudo">
        <div class="topo-esquerda">
            <span><i class="fas fa-truck"></i> Frete grátis acima de R$ 199</span>
            <span><i class="fas fa-credit-card"></i> Até 10x sem juros</span>
            <span><i class="fab fa-whatsapp"></i> Atendimento via WhatsApp</span>
        </div>

        <div class="topo-direita">
            <a href="#"><i class="fas fa-box"></i> Meus pedidos</a>
            <a href="#">Ajuda</a>
        </div>
    </div>
</div>

<header class="cabecalho-principal">
    <div class="container cabecalho-conteudo">

        <a href="/teste/index.php" class="logo">
            <img src="/teste/imagens/logo1.png">
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

            <a href="#" class="icone-acao">
                <i class="far fa-user"></i>
                <span>Entrar</span>
            </a>

            <a href="#" class="icone-acao carrinho">
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

                <a href="/Casas-Brasilite/janelas\todos-produtos\todos-produtos.php"><i class="fa-solid fa-cart-flatbed-suitcase"></i>Todas Categorias</a>

                <a href="#"><i class="fas fa-hammer"></i> Ferramentas</a>

                <a href="#"><i class="fas fa-paint-roller"></i> Tintas</a>

                <a href="#"><i class="fas fa-hard-hat"></i> EPI</a>

                <a href="#"><i class="fas fa-couch"></i> Decoração</a>

                <a href="#"><i class="fas fa-building"></i> Estruturas</a>

            </div>

        </div>

        <ul class="lista-links">
            <li><a href="#">Materiais</a></li>
            <li><a href="#">Ferramentas</a></li>
            <li><a href="#">Acabamento</a></li>
            <li><a href="#">Estruturas</a></li>
            <li><a href="#">EPI</a></li>
            <li><a href="#" class="link-ofertas">Ofertas</a></li>
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