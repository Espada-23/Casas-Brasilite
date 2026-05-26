<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Login - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="\Casas-Brasilite\style.css">
    <link rel="stylesheet" href="cadastro-login.css">
</head>

<body class="login-cadastro">

    <div class="cartao-login">
        <div class="marca-topo">
            <img src="\Casas-Brasilite\imagens\logo1.png">
        </div>
        <h2 class="titulo-autenticacao">Bem-vindo de volta</h2>
        <p class="subtitulo-autenticacao">Faça login na sua conta!</p>

        <form action="#">
            <div class="grupo-campo">
                <label>Email</label>
                <input type="email" placeholder="Ex: meunome@gmail.com" required>
            </div>
            <div class="grupo-campo">
                <label>Senha</label>
                <input type="password" placeholder="Ex: meunome123" required>
            </div>

            <div class="linha-links-autenticacao">
                <a href="#">Esqueceu senha?</a>
                <a href="cadastro1.php">Cadastrar-se</a>
            </div>

            <button type="submit" class="btn btn-azul btn-bloco">Entrar &rarr;</button>
        </form>
    </div>

</body>

</html>