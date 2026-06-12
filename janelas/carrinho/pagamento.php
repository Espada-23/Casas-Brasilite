<?php
require_once '../../Crud/init.php';
require_once '../../Crud/sessions.php';

if (!isset($_SESSION['checkout'])) {
    header('Location: carrinho.php');
    exit;
}

$checkout = $_SESSION['checkout'];
$formaPagamento = $checkout['forma_pagamento'];
$valorTotal = $checkout['valor_total'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="carrinho.css">
</head>

<body>

    <?php include_once "../../partials/header.php" ?>

    <div class="container">
        <div class="container-pagamento">
            <h2>Finalize seu Pagamento</h2>
            <p>Valor total a pagar: <strong>R$ <?= number_format($valorTotal, 2, ',', '.') ?></strong></p>

            <form action="confirmar-compra.php" method="POST">

                <div class="metodo-wrapper">
                    <?php if ($formaPagamento === 'pix'): ?>
                        <h3><i class="fab fa-pix" style="color: #32bcad;"></i> Pagamento via Pix</h3>
                        <p style="font-size: 0.9rem; margin-top: 10px;">Abra o app do seu banco e escaneie o QR Code abaixo:</p>

                        <div class="qr-code">
                            <img src="../../imagens/pix.png" alt="QR Code Pix">
                        </div>

                        <p style="font-size: 0.85rem; color: var(--texto-secundario);">Ou copie o código Copia e Cola:</p>
                        <input type="text" class="codigo-copiar" readonly value="00020126360014BR.GOV.BCB.PIX0114+55119778025285204000053039865802BR5919Felipe Vitor Espada6009SAO PAULO62140510sCShTdemfG6304D52B">

                    <?php elseif ($formaPagamento === 'cartao'): ?>
                        <h3><i class="far fa-credit-card" style="color: var(--azul-escuro);"></i> Dados do Cartão de Crédito</h3>
                        <br>

                        <?php
                        if ($valorTotal <= 50) {
                            $maxParcelas = 2;
                        } elseif ($valorTotal <= 100) {
                            $maxParcelas = 4;
                        } elseif ($valorTotal <= 200) {
                            $maxParcelas = 5;
                        } elseif ($valorTotal <= 500) {
                            $maxParcelas = 6;
                        } elseif ($valorTotal <= 1000) {
                            $maxParcelas = 8;
                        } else {
                            $maxParcelas = 10;
                        }
                        ?>

                        <div class="campo-cartao">
                            <label>Opções de Parcelamento</label>
                            <select name="parcelas" required>
                                <?php for ($i = 1; $i <= $maxParcelas; $i++): ?>
                                    <option value="<?= $i ?>">
                                        <?= $i ?>x de R$ <?= number_format($valorTotal / $i, 2, ',', '.') ?> sem juros
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="campo-cartao">
                            <label>Número do Cartão</label>
                            <input type="text" name="numero_cartao" placeholder="0000 0000 0000 0000" maxlength="19" required>
                        </div>

                        <div class="campo-cartao">
                            <label>Nome impresso no cartão</label>
                            <input type="text" name="nome_cartao" placeholder="NOME DO TITULAR" required>
                        </div>

                        <div class="linha-dupla">
                            <div class="campo-cartao">
                                <label>Validade</label>
                                <input type="text" name="validade" placeholder="MM/AA" maxlength="5" required>
                            </div>
                            <div class="campo-cartao">
                                <label>CVV</label>
                                <input type="text" name="cvv" placeholder="123" maxlength="4" required>
                            </div>
                        </div>

                    <?php elseif ($formaPagamento === 'boleto'): ?>
                        <h3><i class="fas fa-barcode"></i> Boleto Bancário</h3>
                        <p style="font-size: 0.9rem; margin-top: 10px;">Seu boleto foi gerado. Você pode utilizar o código de barras abaixo para realizar o pagamento.</p>

                        <div class="codigo-barras"><img src="../../imagens/boleto.png" alt="Código de Barras"></div>

                        <input type="text" class="codigo-copiar" readonly value="34191.79001 01043.513147 91020.150008 7 987600000<?= str_replace('.', '', number_format($valorTotal, 2, '', '')) ?>">
                        <p style="font-size: 0.8rem; margin-top: 10px; color: #b45309;"><i class="fas fa-info-circle"></i> Boletos levam até 3 dias úteis para compensação.</p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-laranja" style="width: 100%; padding: 15px; font-size: 1.1rem;">
                    Confirmar e Finalizar Compra <i class="fas fa-check-circle"></i>
                </button>
            </form>
        </div>
    </div>

</body>

</html>