<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../../Crud/crud.php";
include_once "../../Crud/init.php";

$carrinho_sessao = $_SESSION['carrinho'] ?? [];
$produtos_carrinho = [];
$subtotal = 0;
$frete = 0;

if (!empty($carrinho_sessao)) {
    $ids = implode(',', array_keys($carrinho_sessao));

    $sql = "
    SELECT p.*, MIN(f.caminho_imagem) as caminho_imagem
    FROM produto p
    LEFT JOIN foto_produto f 
    ON p.id_produto = f.idProduto
    WHERE p.id_produto IN ($ids)
    GROUP BY p.id_produto
    ";

    $stmt = $pdo->query($sql);
    $produtos_carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produtos_carrinho as $produto) {
        $id_prod = $produto['id_produto'];
        $qtd = $carrinho_sessao[$id_prod];
        $subtotal += $produto['preco_unitario'] * $qtd;
    }

    $frete = ($subtotal > 200) ? 0.00 : 45.00;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Casas-Brasilite/imagens/icon.png" type="image/x-icon">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="carrinho.css">
</head>

<body>

    <?php include_once "../../partials/header.php" ?>

    <section class="secao-carrinho">
        <div class="container">
            <?php if (empty($produtos_carrinho)): ?>
                <div class="lista-produtos-vazia">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Seu carrinho está vazio.</p>
                    <a href="/Casas-Brasilite/index.php" class="btn btn-laranja btn-alinhamento">
                        Continuar Navegando
                    </a>
                </div>
            <?php else: ?>
                <div class="grid-carrinho">

                    <div class="lista-produtos-carrinho">
                        <div class="cabecalho-lista">
                            <span>Produto</span>
                            <span>Preço Total</span>
                        </div>

                        <?php foreach ($produtos_carrinho as $produto):
                            $id_prod = $produto['id_produto'];
                            $qtd = $carrinho_sessao[$id_prod];
                            $preco_total_item = $produto['preco_unitario'] * $qtd;
                        ?>
                            <div class="item-carrinho">
                                <div class="info-produto-carrinho">
                                    <div class="img-carrinho">
                                        <img src="../../<?= $produto['caminho_imagem'] ?>" width="60" style="border-radius: 6px;">
                                    </div>
                                    <div>
                                        <a href="/Casas-Brasilite/janelas/janela-produto/janela-produto.php?id=<?= $produto['id_produto'] ?>">
                                            <h4><?= $produto['nome_produto'] ?></h4>
                                        </a>
                                        <p class="ref-produto">Qtd: <?= $qtd ?></p>
                                    </div>
                                </div>

                                <div class="acoes-preco-carrinho">
                                    <div class="preco-item-carrinho">
                                        <strong>R$ <?= number_format($preco_total_item, 2, ',', '.') ?></strong>
                                    </div>

                                    <form action="processar-carrinho.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="acao" value="remover_item">
                                        <input type="hidden" name="id_produto" value="<?= $id_prod ?>">
                                        <button type="submit" class="btn-remover-carrinho" title="Remover produto">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <form action="processar_pedido.php" method="POST" class="resumo-pedido">
                        <h3>Resumo da Compra</h3>

                        <div class="linha-resumo">
                            <span>Subtotal:</span>
                            <span>R$ <?= number_format($subtotal, 2, ',', '.') ?></span>
                        </div>
                        <div class="linha-resumo">
                            <span>Frete:</span>
                            <span>
                                <?php if ($frete == 0): ?>
                                    <strong style="color: #2e7d32;">Grátis</strong>
                                <?php else: ?>
                                    R$ <?= number_format($frete, 2, ',', '.') ?>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="linha-resumo total-resumo">
                            <span>Total:</span>
                            <span>R$ <?= number_format($subtotal + $frete, 2, ',', '.') ?></span>
                        </div>

                        <div class="forma-pagamento">
                            <h4>Forma de Pagamento</h4>

                            <label class="opcao-pagamento">
                                <input type="radio" name="pagamento" value="pix" required checked>
                                <span class="radio-custom"></span>
                                <i class="fab fa-pix"></i> Pix
                            </label>

                            <label class="opcao-pagamento">
                                <input type="radio" name="pagamento" value="cartao">
                                <span class="radio-custom"></span>
                                <i class="far fa-credit-card"></i> Cartão de Crédito
                            </label>

                            <label class="opcao-pagamento">
                                <input type="radio" name="pagamento" value="boleto">
                                <span class="radio-custom"></span>
                                <i class="fas fa-barcode"></i> Boleto Bancário
                            </label>
                        </div>

                        <button type="submit" class="btn btn-laranja btn-finalizar">
                            Finalizar Compra <i class="fas fa-check"></i>
                        </button>
                    </form>

                </div>
            <?php endif; ?>
        </div>
    </section>

</body>

</html>