<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../Crud/crud.php';
require_once __DIR__ . '/../Crud/sessions.php';

$total_itens_carrinho = contarItensCarrinho($pdo);
$registros_pesquisa = 0;

$res = $_SESSION['resultados_produtos'] ?? null;
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
            <a href="/Casas-Brasilite/janelas/sobre/ajuda.php">Ajuda</a>
        </div>
    </div>
</div>

<header class="cabecalho-principal">
    <div class="container cabecalho-conteudo">

        <a href="/Casas-Brasilite/index.php" class="logo">
            <img src="/Casas-Brasilite/imagens/logo1.png">
        </a>

        <form class="barra-pesquisa" action="/Casas-Brasilite/partials/pesquisa.php" method="POST">
            <input type="text" name="pesquisa" placeholder="O que você procura?" required>
            <button class="btn-pesquisa" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <?php
        $resultados = $_SESSION['resultados'] ?? [];
        $mostrar_resultados = $_SESSION['resultados_produtos'] ?? false;
        $mensagem_pesquisa = $_SESSION['mensagem_pesquisa'] ?? null;
        ?>

        <?php if ($mostrar_resultados): ?>
            <div class="main-resultados">
                <div class="resultados-busca">

                    <?php if (!empty($resultados)): ?>

                        <?php foreach ($resultados as $item): ?>
                            <div class="item-resultado">

                                <a href="/Casas-Brasilite/janelas/janela-produto/janela-produto.php?id=<?= $item['id_produto'] ?>" class="link-resultado">

                                    <div class="info-resultado">

                                        <span class="nome-resultado">
                                            <?= htmlspecialchars($item['nome_produto']) ?>
                                        </span>

                                        <span class="marca-resultado">
                                            <?= htmlspecialchars($item['marca']) ?>
                                        </span>

                                    </div>

                                </a>

                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="item-resultado sem-resultado" style="padding: 16px; color: #9ca3af; text-align: center; font-size: 14px;">
                            <i class="bi bi-exclamation-circle" style="margin-right: 6px;"></i>
                            <?= $mensagem_pesquisa ?? "Nenhum produto encontrado." ?>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <?php
            unset($_SESSION['resultados']);
            unset($_SESSION['resultados_produtos']);
            unset($_SESSION['mensagem_pesquisa']);
            ?>

        <?php endif; ?>

        <div class="acoes-usuario">

            <a href="/Casas-Brasilite/janelas/janela-favoritos/janela-favoritos.php" class="icone-acao">
                <i class="far fa-heart"></i>
                <span>Favoritos</span>
            </a>

            <?php if (usuarioLogado()): ?>
                <a href="/Casas-Brasilite/janelas/configuracao/configuracao.php" class="icone-acao" title="Clique para configurar">
                    <i class="far fa-user"></i>
                    <span><?= htmlspecialchars($_SESSION['usuario']['nome']) ?></span>
                </a>
            <?php else: ?>
                <a href="/Casas-Brasilite/janelas/cadastro-login/login.php" class="icone-acao">
                    <i class="far fa-user"></i>
                    <span>Entrar</span>
                </a>
            <?php endif; ?>

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
                <div class="titulo-grupo">
                    <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php">
                        Todas Categorias
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
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

                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=32">Luvas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=33">Capacetes</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=34">Botas</a>
                        <a href="/Casas-Brasilite/janelas/todos-produtos/todos-produtos.php?categoria=35">Óculos</a>
                    </div>
                </div>

            </div>

        </div>

        <ul class="lista-links">
            <li><a href="/Casas-Brasilite/index.php#mais-vendidos">Melhores avaliados</a></li>
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
                $cep_header = $_SESSION['usuario']['cep'] ?? ($_SESSION['cep_index'] ?? null);
                if (!empty($cep_header)) { ?>
                    <span style="color: black;"><strong>CEP: <?= htmlspecialchars($cep_header); ?></strong></span>
                <?php } else { ?>
                    <span style="color: black;"><strong>Informe seu CEP</strong></span>
                <?php } ?>

            </div>
        </div>
    </div>
</nav>