<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Cadastro - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="cadastro-login.css">
</head>

<body class="login-cadastro">

    <div class="painel-cadastro-duplo">

        <?php include_once "../../partials/cadastro-lado-esquerdo.php"; ?>

        <div class="lado-formulario">
            <div class="caixa-interna-passo">
                <h2 class="titulo-autenticacao" style="margin-bottom: 25px;">Informe seu Endereço</h2>

                <form action="cadastro3.php">
                    <div class="linha-campos-duplos">
                        <div class="grupo-campo">
                            <label>CEP</label>
                            <input type="text" placeholder="Ex: 11111-111" required>
                        </div>
                        <div class="grupo-campo">
                            <label>Estado</label>
                            <input type="text" placeholder="Ex: São Paulo" required>
                        </div>
                    </div>

                    <div class="linha-campos-duplos">
                        <div class="grupo-campo">
                            <label>Cidade</label>
                            <input type="text" placeholder="Ex: São Caetano" required>
                        </div>
                        <div class="grupo-campo">
                            <label>Número</label>
                            <input type="text" placeholder="Ex: 398" required>
                        </div>
                    </div>

                    <div class="grupo-campo">
                        <label>Bairro</label>
                        <input type="text" placeholder="Ex: Santa Maria" required>
                    </div>

                    <a href="#" class="link-suporte-ajuda">Precisa de ajuda? Contate o suporte.</a>

                    <button type="submit" class="btn btn-azul btn-bloco">Próximo</button>
                    <a href="cadastro1.html" class="link-voltar-fluxo">Voltar ao passo anterior</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>