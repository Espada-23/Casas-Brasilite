<input type="checkbox" id="menu-toggle">

<aside class="sidebar">

    <div class="logo">

        <div class="logo-left">

            <img src="../imagens/logo-branca.png" alt="logo">

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

            <a href="../Dashboard/produtos.php"
                class="<?= ($pagina == "produtos") ? "active" : "" ?>">

                <i class="bi bi-box-seam-fill"></i>
                <p>Produtos</p>

            </a>

        </div>


        <div class="lista-sidebar">

            <a href="../Dashboard/estoque.php"
                class="<?= ($pagina == "estoque") ? "active" : "" ?>">

                <i class="bi bi-grid-fill"></i>
                <p>Estoque</p>

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


        <div class="lista-sidebar">

            <a href="../Dashboard/configuracoes.php"
                class="<?= ($pagina == "configuracoes") ? "active" : "" ?>">

                <i class="bi bi-gear-fill"></i>
                <p>Configurações</p>

            </a>

        </div>

    </nav>


    <div class="footer-sidebar">

        <div class="user-info-sidebar">

            <i class="bi bi-person-circle"></i>

            <div class="user-name">

                <p>Gustavo</p>
                <span>Administrador</span>

            </div>

        </div>


        <div class="exit">

            <a href="#">

                <i class="bi bi-box-arrow-right"></i>
                <p>Sair</p>

            </a>

        </div>

    </div>

</aside>