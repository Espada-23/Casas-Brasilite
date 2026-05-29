<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="icon" href="../imagens/logo.png">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/cadastrar-produto.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header class="topbar">
        <div class="topbar-left">
            <div class="header-left">
                <h1>Cadastrar Produto</h1>
                <p>Preencha as informações para cadastrar um novo produto</p>
            </div>
        </div>
        <div class="topbar-right">
            <div class="user">
                <i class="bi bi-person-circle"></i>
                <p>Administrador</p>
            </div>
        </div>
    </header>

    <main>
        <div class="container-pagina">
            <div class="card-cadastro-produto">
                <div class="top-card-cadastro">
                    <img src="../imagens/logo1.png">
                    <h2>Dados do Produto</h2>
                </div>

                <div class="main-card-cadastro">
                    <form action="cadastrar-produto.php" method="POST" enctype="multipart/form-data">
                       <div class="cadastros-form">
                            <div class="top-form">
                                <div class="campo">
                                    <label>Categoria <span>*</span></label>
                                    <select>
                                        <option>Escolha a Categoria</option>
                                        <option value="construcao">Construção</option>
                                        <option value="cimento">Cimentos e Argamassas</option>
                                        <option value="metais">Metais Sanitários</option>
                                        <option value="revestimentos">Pisos e Revestimentos</option>
                                        <option value="ferramentas">Ferramentas Manuais</option>
                                    </select>
                                </div>
                                <div class="campo">
                                    <label>SKU <span>*</span></label>
                                    <input type="text" placeholder="EX: SKU001" name="sku" required>
                                </div>

                                <div class="campo">
                                    <label>Status do Produto <span>*</span></label>
                                    <select>
                                        <option>Ativo</option>
                                        <option>Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="main-form">
                                <div class="campo">
                                    <label>Nome do Produto <span>*</span></label>
                                    <input type="text" placeholder="Digete o nome do produto" name="nome_produto" required>
                                </div>
                                <div class="campo">
                                    <label>Marca</label>
                                    <input type="text" placeholder="Digite a marca (opcional)" name="marca">
                                </div>
                            </div>
                            <div class="financas">
                                <div class="campo">
                                    <label>Unidade de Medida <span>*</span></label>
                                    <select>
                                        <option>UN - Unidade</option>
                                        <option>CM - Centímetro</option>
                                        <option>M - Metro</option>
                                        <option>MM - Milímetro</option>
                                        <option>M2 - Metros Quadrados</option>
                                        <option>M3 - Metros Cúbicos</option>
                                        <option>KG - Quilograma</option>
                                        <option>G - Grama</option>
                                        <option>T - Tonelada</option>
                                    </select>
                                </div>
                                <div class="campo">
                                    <label>Preço Unitário <span>*</span></label>
                                    <input type="number" step="0.01" placeholder="R$ 0.00" name="preco_unitario" required>
                                </div>
                                <div class="campo">
                                    <label>Desconto (R$)</label>
                                    <input type="number" step="0.01" placeholder="R$ 0.00" name="desconto" required>
                                </div>
                                <div class="campo">
                                    <label>Frete (R$)</label>
                                    <input type="number" step="0.01" placeholder="R$ 0.00" name="frete" required>
                                </div>
                            </div>
                            <div class="arquivo-imagem">
                                <label>Imagem do Produto <span>*</span></label>
                                <input type="file" name="caminho_imagem" class="file-escondido" required>
                            </div>
                            <div class="descricao">
                                <label>Descrição de Produto</label>
                                <textarea placeholder="Digite sua mensagem aqui..." name="detalhes"></textarea>
                            </div>
                        </div>
                        <div class="botoes">
                            <a href="#">Cancelar</a>
                            <button type="submit"><i class="bi bi-floppy"></i>Salvar Produto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>