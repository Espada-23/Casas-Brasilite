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
                <h2 class="titulo-autenticacao" style="margin-bottom: 25px;">Informe seu Contato</h2>

                <form action="\Casas-Brasilite\index.php">
                    <div class="grupo-campo">
                        <label>E-mail</label>
                        <input type="email" placeholder="Ex: seunome@gmail.com" required>
                    </div>

                    <div class="linha-campos-duplos">
                        <div class="grupo-campo">
                            <label>Senha</label>
                            <input type="password" placeholder="Ex: SeuNome123" required>
                        </div>
                        <div class="grupo-campo">
                            <label>Confirmar Senha</label>
                            <input type="password" placeholder="Ex: SeuNome123" required>
                        </div>
                    </div>

                    <div class="grupo-campo">
                        <label>Telefone</label>
                        <input type="tel" placeholder="Ex: 11 99999-9999" required>
                    </div>

                    <div class="caixa-selecao-termos">
                        <input type="checkbox" id="termos" required>
                        <label for="termos">Aceito e Concordo com os Termos de Uso</label>
                    </div>

                    <a href="#" class="link-suporte-ajuda">Precisa de ajuda? Contate o suporte.</a>

                    <button type="submit" class="btn btn-azul btn-bloco">Cadastrar &rarr;</button>
                    <a href="cadastro-2.html" class="link-voltar-fluxo">Voltar ao passo anterior</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>