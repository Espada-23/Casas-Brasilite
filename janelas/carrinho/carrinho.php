<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="carrinho.css">
</head>

<body>

    <?php include_once "../../partials\header.php" ?>

    <section class="secao-carrinho">
        <div class="container">
            <form action="processar_pedido.php" method="POST" class="grid-carrinho">

                <div class="lista-produtos-carrinho">
                    <div class="cabecalho-lista">
                        <span>Produto</span>
                        <span>Preço</span>
                    </div>

                    <div class="item-carrinho">
                        <div class="info-produto-carrinho">
                            <div class="img-carrinho-placeholder">
                                <i class="fas fa-hammer"></i>
                            </div>
                            <div>
                                <h4>Furadeira de Impacto Vonder</h4>
                                <p class="ref-produto">Qtd: 1</p>
                            </div>
                        </div>
                        <div class="preco-item-carrinho">
                            <strong>R$ 350,00</strong>
                        </div>
                    </div>

                    <div class="item-carrinho">
                        <div class="info-produto-carrinho">
                            <div class="img-carrinho-placeholder">
                                <i class="fas fa-paint-roller"></i>
                            </div>
                            <div>
                                <h4>Tinta Acrílica Fosca Coral 18L</h4>
                                <p class="ref-produto">Qtd: 2</p>
                            </div>
                        </div>
                        <div class="preco-item-carrinho">
                            <strong>R$ 540,00</strong>
                        </div>
                    </div>
                </div>

                <div class="resumo-pedido">
                    <h3>Resumo da Compra</h3>

                    <div class="linha-resumo">
                        <span>Subtotal:</span>
                        <span>R$ 890,00</span>
                    </div>
                    <div class="linha-resumo">
                        <span>Frete:</span>
                        <span>R$ 45,00</span>
                    </div>
                    <div class="linha-resumo total-resumo">
                        <span>Total:</span>
                        <span>R$ 935,00</span>
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
                </div>

            </form>
        </div>
    </section>

</body>

</html>