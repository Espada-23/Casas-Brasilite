<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="pedidos.css">
</head>

<body>

    <?php include_once "../../partials/header.php" ?>

    <section class="secao-pedidos">
        <div class="container main-pedidos-container">

            <div class="card-pedido">
                <div class="topo-card-pedido">
                    <div class="info-geral-pedido">
                        <div>
                            <span class="label-pedido">Pedido</span>
                            <strong>#48291</strong>
                        </div>
                        <div>
                            <span class="label-pedido">Data</span>
                            <strong>23/05/2026</strong>
                        </div>
                        <div>
                            <span class="label-pedido">Total</span>
                            <strong>R$ 935,00</strong>
                        </div>
                        <div>
                            <span class="label-pedido">Pagamento</span>
                            <strong>Pix</strong>
                        </div>
                    </div>
                    <span class="status-tag status-transito">Em transporte</span>
                </div>

                <div class="linha-tempo">
                    <div class="passo concluido">
                        <div class="circulo-passo"><i class="fas fa-check"></i></div>
                        <span class="texto-passo">Pedido Recebido</span>
                    </div>
                    <div class="passo concluido">
                        <div class="circulo-passo"><i class="fas fa-check"></i></div>
                        <span class="texto-passo">Pagamento Aprovado</span>
                    </div>
                    <div class="passo ativo">
                        <div class="circulo-passo"><i class="fas fa-truck"></i></div>
                        <span class="texto-passo">Em Transporte</span>
                    </div>
                    <div class="passo">
                        <div class="circulo-passo"><i class="fas fa-home"></i></div>
                        <span class="texto-passo">Entregue</span>
                    </div>
                </div>

                <details class="detalhes-pedido-dropdown">
                    <summary class="btn-ver-detalhes">
                        Exibir itens do pedido <i class="fas fa-chevron-down"></i>
                    </summary>
                    <div class="conteudo-detalhes">
                        <div class="produto-pedido-mini">
                            <div class="img-mini-placeholder"><i class="fas fa-hammer"></i></div>
                            <div class="nome-mini">
                                <h5>Furadeira de Impacto Vonder</h5>
                                <span>Qtd: 1</span>
                            </div>
                            <div class="preco-mini">R$ 350,00</div>
                        </div>
                        <div class="produto-pedido-mini">
                            <div class="img-mini-placeholder"><i class="fas fa-paint-roller"></i></div>
                            <div class="nome-mini">
                                <h5>Tinta Acrílica Fosca Coral 18L</h5>
                                <span>Qtd: 2</span>
                            </div>
                            <div class="preco-mini">R$ 540,00</div>
                        </div>
                        <div class="resumo-entrega-mini">
                            <p><strong>Endereço de Entrega:</strong> Av. Paulista, 1000 - Bela Vista, São Paulo - SP</p>
                        </div>
                    </div>
                </details>
            </div>

            <div class="card-pedido">
                <div class="topo-card-pedido">
                    <div class="info-geral-pedido">
                        <div>
                            <span class="label-pedido">Pedido</span>
                            <strong>#47102</strong>
                        </div>
                        <div>
                            <span class="label-pedido">Data</span>
                            <strong>10/04/2026</strong>
                        </div>
                        <div>
                            <span class="label-pedido">Total</span>
                            <strong>R$ 120,50</strong>
                        </div>
                        <div>
                            <span class="label-pedido">Pagamento</span>
                            <strong>Cartão</strong>
                        </div>
                    </div>
                    <span class="status-tag status-entregue">Entregue</span>
                </div>

                <div class="linha-tempo">
                    <div class="passo concluido">
                        <div class="circulo-passo"><i class="fas fa-check"></i></div>
                        <span class="texto-passo">Pedido Recebido</span>
                    </div>
                    <div class="passo concluido">
                        <div class="circulo-passo"><i class="fas fa-check"></i></div>
                        <span class="texto-passo">Pagamento Aprovado</span>
                    </div>
                    <div class="passo concluido">
                        <div class="circulo-passo"><i class="fas fa-check"></i></div>
                        <span class="texto-passo">Em Transporte</span>
                    </div>
                    <div class="passo concluido">
                        <div class="circulo-passo"><i class="fas fa-check"></i></div>
                        <span class="texto-passo">Entregue</span>
                    </div>
                </div>

                <details class="detalhes-pedido-dropdown">
                    <summary class="btn-ver-detalhes">
                        Exibir itens do pedido <i class="fas fa-chevron-down"></i>
                    </summary>
                    <div class="conteudo-detalhes">
                        <div class="produto-pedido-mini">
                            <div class="img-mini-placeholder"><i class="fas fa-screwdriver"></i></div>
                            <div class="nome-mini">
                                <h5>Jogo de Chaves Fenda e Philips (6 peças)</h5>
                                <span>Qtd: 1</span>
                            </div>
                            <div class="preco-mini">R$ 120,50</div>
                        </div>
                    </div>
                </details>
            </div>

        </div>
    </section>

</body>

</html>