<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

$produtos_carrinho = buscarItensCarrinhoAtual($pdo);
$subtotal = 0;
$frete = 0;

$editar = isset($_GET['#editar']) ? [
    'codigo' => 'OPA GALERA',
] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produto = (int) $_POST['id_produto'] ?? null;
    $qtd_atual = (int) $_POST['qtd'] ?? null;

    if ($qtd_atual > 0) {
        adicionarProdutoCarrinhoBanco($pdo, usuarioLogado(), $id_produto, $qtd_atual);
    }
}

foreach ($produtos_carrinho as $produto) {
    $subtotal += (float) $produto['subtotal'];
    $frete += (float) $produto['frete'];
}

if ($subtotal > 200) {
    $frete = 0;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <?php include_once "../../partials/header.php" ?>

    <section class="secao-carrinho">
        <div class="container">
            <?php if (!empty($_SESSION['erro_carrinho'])): ?>
                <div class="lista-produtos-vazia" style="margin-bottom: 20px; color: #b91c1c;">
                    <?= htmlspecialchars($_SESSION['erro_carrinho']); unset($_SESSION['erro_carrinho']); ?>
                </div>
            <?php endif; ?>

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
                            $id_prod = (int) $produto['id_produto'];
                            isset($_GET['editar']) ? $editar[
                                'id_produto' => $id_prod,
                            ] : null;
                            $qtd = (int) $produto['quantidade'];
                            $preco_total_item = (float) $produto['subtotal'];
                            $imagem = !empty($produto['caminho_imagem']) ? '../../' . $produto['caminho_imagem'] : '../../uploads/sem-foto.webp';

                        ?>
                            <div class="item-carrinho">
                                <div class="info-produto-carrinho">
                                    <div class="img-carrinho">
                                        <img src="<?= htmlspecialchars($imagem) ?>" width="60" style="border-radius: 6px;">
                                    </div>
                                    <div>
                                        <a href="/Casas-Brasilite/janelas/janela-produto/janela-produto.php?id=<?= $id_prod ?>">
                                            <h4><?= htmlspecialchars($produto['nome_produto']) ?></h4>
                                        </a>
                                        <p class="ref-produto">Qtd: <?php echo (!empty($editar) && isset($editar['codigo']) ? $editar['codigo'] : $qtd); ?> <a href="?editar=<?= $id_prod ?>"><span style="padding-left: 10px"><i class="fas fa-pencil-alt"></i></span></a></p>

                                        <!-- <form action="carrinho.php" method="post">
                                            <input type="hidden" name="id_produto" value="<?= $id_prod ?>">
                                            <input type="number" name="qtd" id="qtd" min="1"  value="<?= $qtd ?>" style=" all: unset; width: 30px;">
                                        </form>
                                        <i class="fas fa-pencil-alt"></i> -->
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

                        <?php if (!usuarioLogado()): ?>
                            <p style="font-size: 14px; margin: 12px 0; color: #b45309;">
                                Faça login para finalizar a compra e salvar o pedido no sistema.
                            </p>
                        <?php endif; ?>

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
