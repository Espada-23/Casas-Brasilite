<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../../Crud/crud.php";
include_once "../../Crud/init.php";

$favoritos = $_SESSION['favoritos'] ?? [];

if (!empty($favoritos)) {

    $ids = implode(',', $favoritos);

    $sql = "
    SELECT p.*, MIN(f.caminho_imagem) as caminho_imagem
    FROM produto p
    LEFT JOIN foto_produto f 
    ON p.id_produto = f.idProduto
    WHERE p.id_produto IN ($ids)
    GROUP BY p.id_produto
    ";

    $stmt = $pdo->query($sql);
    $produtos_favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $produtos_favoritos = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Casas-Brasilite/imagens/icon.png" type="image/x-icon">
    <title>Meus Favoritos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="janela-favoritos.css">
</head>

<body>

    <?php include_once "../../partials/header.php" ?>

    <section class="secao-favoritos">
        <div class="container">

            <?php if (empty($produtos_favoritos)): ?>
                <div class="lista-produtos-vazia">
                    <i class="far fa-heart"></i>
                    <p>Sua lista de favoritos está vazia.</p>
                    <a href="/Casas-Brasilite/index.php" class="btn btn-laranja btn-alinhamento">
                        Continuar Navegando
                    </a>
                </div>
            <?php else: ?>
                <div class="grid-favoritos">

                    <div class="lista-produtos-favoritos">
                        <?php foreach ($produtos_favoritos as $produto): ?>
                            <div class="item-favorito">
                                <div class="info-produto-favorito">
                                    <img src="../../<?= $produto['caminho_imagem'] ?>" width="60">
                                    <div>
                                        <a href="/Casas-Brasilite/janelas/janela-produto/janela-produto.php?id=<?= $produto['id_produto'] ?>">
                                            <h4><?= $produto['nome_produto'] ?></h4>
                                        </a>
                                        <span class="status-produto em-estoque">
                                            <i class="fa-solid fa-check"></i> Em estoque
                                        </span>
                                    </div>
                                </div>

                                <div class="acoes-preco-favorito">
                                    <div class="preco-item-favorito">
                                        <strong>
                                            R$ <?= number_format($produto['preco_unitario'], 2, ',', '.') ?>
                                        </strong>
                                    </div>

                                    <div class="botoes-item-favorito">
                                        <a href="favoritar.php?id=<?= $produto['id_produto'] ?>">
                                            <button class="btn-remover-favorito">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="resumo-favoritos">
                        <h3>Gerenciar Lista</h3>

                        <div class="linha-resumo">
                            <span>Total de itens:</span>
                            <span><?= count($produtos_favoritos) ?> produtos</span>
                        </div>

                        <div class="linha-resumo aviso-favoritos">
                            <p><i class="fas fa-info-circle"></i> Os itens salvos não reservam estoque ou garantem o preço atual do produto.</p>
                        </div>

                        <form action="/Casas-Brasilite/janelas/carrinho/processar-carrinho.php" method="POST">
                            <input type="hidden" name="acao" value="mover_todos_para_carrinho">
                            <button type="submit" class="btn btn-laranja btn-adicionar-todos" style="margin-bottom: 15px; width: 100%;">
                                Adicionar Todos ao Carrinho <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>

                        <a href="/Casas-Brasilite/index.php" class="btn-continuar-comprando" style="display: block; text-align: center;">
                            <i class="fas fa-arrow-left"></i> Continuar Navegando
                        </a>
                    </div>

                </div>
            <?php endif; ?>

        </div>
    </section>

</body>

</html>