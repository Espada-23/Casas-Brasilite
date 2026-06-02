<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$total_itens_carrinho = 0;

if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $total_itens_carrinho = count($_SESSION['carrinho']);
}

?>
<link rel="stylesheet" href="/Casas-Brasilite/partials-css/header.css">

<div class="barra-topo">
    <div class="container barra-topo-conteudo">
        <div class="topo-esquerda">
            <span><i class="fas fa-truck"></i> Frete grátis acima de R$ 200</span>
            <span><i class="fas fa-credit-card"></i> Até 10x sem juros</span>
            <span><i class="fab fa-whatsapp"></i> Atendimento via WhatsApp</span>
        </div>

        <div class="topo-direita">
            <a href="/Casas-Brasilite/janelas/pedidos/pedidos.php"><i class="fas fa-box"></i> Meus pedidos</a>
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

            <a href="/Casas-Brasilite/janelas/janela-favoritos/janela-favoritos.php" class="icone-acao">
                <i class="far fa-heart"></i>
                <span>Favoritos</span>
            </a>

            <a href="/Casas-Brasilite/janelas/cadastro-login/login.php" class="icone-acao">
                <i class="far fa-user"></i>
                <span>Entrar</span>
            </a>

            <a href="/Casas-Brasilite/janelas/carrinho/carrinho.php" class="icone-acao carrinho">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge-carrinho"><?= $total_itens_carrinho ?></span>
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
                <span>Categorias</span>
            </div>

            <div class="dropdown-departamentos">

                <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php" class="link-todas">
                    <i class="fa-solid fa-cart-flatbed-suitcase"></i>
                    Todas Categorias
                </a>

                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=ferramentas">
                            Ferramentas
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=1">Ferramentas Manuais</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=2">Ferramentas Elétricas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=10">Ferramentas de Demolição</a>
                    </div>

                </div>

                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=materiais">
                            Materiais de Construção
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=3">Cimentos</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=4">Argamassas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=5">Blocos</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=16">Tijolos</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=23">Areia, Pedra</a>

                    </div>

                </div>

                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=acabamento">
                            Acabamento
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=6">Pisos</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=7">Revestimentos</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=8">Tintas</a>
                    </div>

                </div>
                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=maquinas_equipamentos">
                            Máquinas e Equipamentos
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=12">Betoneiras</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=11">Equipamentos de obra</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=9">Máquinas pesadas</a>
                    </div>
                </div>
                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=obras_estruturas">
                            Obras e Estrutura
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=19">Ferragens estruturais</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=20">Madeira</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=21">Pré-moldados</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=17">Telhas</a>
                    </div>
                </div>
                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=suprimento_obras">
                            Suprimentos de Obra
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=14">Carrinho de mão</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=13">Andaimes, Escadas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=22">Acessórios diversos</a>
                    </div>
                </div>
                <div class="grupo-dropdown">

                    <div class="titulo-grupo">
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?grupo=seguranca">
                            Segurança (EPIs)
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>

                    <div class="submenu-lateral">

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=3">Luvas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=4">Capacetes</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=5">Botas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=5">Óculos</a>
                    </div>
                </div>

            </div>

        </div>

        <ul class="lista-links">
            <li><a href="/Casas-Brasilite/index.php#mais-vendidos">Mais vendidos</a></li>
            <li><a href="/Casas-Brasilite/index.php#ofertas">Promoções</a></li>
            <li><a href="/Casas-Brasilite/index.php#parcerias">Parcerias</a></li>
            <li><a href="/Casas-Brasilite/index.php#avaliaçoes">Avaliações</a></li>
            <li><a href="/Casas-Brasilite/index.php#orcamentos" class="link-laranja">Orçamentos</a></li>
        </ul>

        <div class="localizacao">
            <i class="fas fa-map-marker-alt"></i>
            <div class="texto-local">
                <span>Enviar para:</span>
                <?php
                $_SESSION['cep_index'] = (isset($_GET['#'])) ? $_GET['#'] : null;

                if ($_SESSION['cep_index']) { 
                ?>
                <span><?= $_SESSION['cep_index']; ?></span>
                <?php } else { ?>
                <span style="color: black;"><strong>Informe seu CEP: </strong></span>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>  