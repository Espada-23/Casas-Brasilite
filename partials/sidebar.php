<?php 
$nome_usuario = $_SESSION['login_admin']['usuario'] ?? 'Admin';
?>
<input type="checkbox" id="menu-toggle">

<aside class="sidebar">

    <div class="logo">

        <div class="logo-left">
            <a href = "/Casas-Brasilite/">
            <img src="../imagens/logo-tri.png" alt="logo">
            </a>

            <div class="logo-text">
                <h2>Brasilite</h2>
                <p>PAINEL ADMIN</p>
            </div>

        </div>

        <label for="menu-toggle" class="menu-sidebar">
            <i class="bi bi-list"></i>
        </label>

    </div>

    <nav>

        <span class="menu-title">
            GERAL
        </span>

        <div class="lista-sidebar">

            <a href="../Dashboard/dashboard.php"
                class="<?= ($pagina == "dashboard") ? "active" : "" ?>">

                <i class="bi bi-house-door-fill"></i>
                <p>Dashboard</p>

            </a>

        </div>


        <div class="lista-sidebar">

            <a href="/Casas-Brasilite/Dashboard/produtos.php"
                class="<?= ($pagina == "produtos") ? "active" : "" ?>">

                <i class="bi bi-box-seam-fill"></i>
                <p>Produtos</p>

            </a>

        </div>

        <div class="lista-sidebar">

            <a href="../Dashboard/pedidos.php"
                class="<?= ($pagina == "pedidos") ? "active" : "" ?>">

                <i class="bi bi-card-list"></i>
                <p>Pedidos</p>

            </a>

        </div>


        <div class="lista-sidebar">

            <a href="../Dashboard/movimentacao.php"
                class="<?= ($pagina == "movimentacao") ? "active" : "" ?>">

                <i class="bi bi-arrow-left-right"></i>
                <p>Movimentações</p>

            </a>

        </div>

        <div class="lista-sidebar">
            <a href="/Casas-Brasilite/Dashboard/trocar_site.php"
                target="_blank"
                class="<?= ($pagina == "site") ? "active" : "" ?>">
                <i class="bi bi-globe"></i>
                <p>Ir para o Site</p>
            </a>
        </div>


        <span class="menu-title">
            GESTÃO
        </span>


        <div class="lista-sidebar">

            <a href="../Dashboard/clientes.php"
                class="<?= ($pagina == "clientes") ? "active" : "" ?>">

                <i class="bi bi-people-fill"></i>
                <p>Clientes</p>

            </a>

        </div>

        <div class="lista-sidebar">
            <a href="../Dashboard/financeiro.php"
                class="<?= ($pagina == "financeiro") ? "active" : "" ?>">

                <i class="bi bi-cash-stack"></i>
                <p>Financeiro</p>
            </a>

        </div>

    </nav>


    <div class="footer-sidebar">

        <div class="user-info-sidebar">

            <i class="bi bi-person-circle"></i>

                <div class="user-name">
            <a href="/Casas-Brasilite/janelas/configuracao/configuracao.php">                
                <p><?= $nome_usuario ?></p>
                <span>Administrador</span>
            </a>
        </div>

        </div>


        <div class="exit">

            <a href="/Casas-Brasilite/Dashboard/logout-dashboard.php">

                <i class="bi bi-box-arrow-right"></i>
                <p>Sair</p>

            </a>

        </div>

    </div>

</aside>