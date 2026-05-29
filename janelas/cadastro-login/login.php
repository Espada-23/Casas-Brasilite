<?php

require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';

$mensagem = "";
$classe = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

    if ($email ===  "" || $senha === "") {
        $mensagem = "Informe o e-mail e a senha.";
    } else {
    $senha_criptografada = md5($senha);
    $registros=read($pdo, 'usuario', '*', "email = '$email'");

    if ($registros) {
        if ($senha_criptografada == $registros['senha']) {
            $_SESSION['login']['usuario'] = $registros['nome'];
            $_SESSION['login']['id'] = $registros['id_usuario'];

            header("Location: /Casas-Brasilite/index.php");
        } else {
            $mensagem = "Senha incorreta.";
            $classe = "erro";
        }
    } else {
        $mensagem = "Email não encontrado.";
        $classe = "erro";
    }
}
}
?>

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

        <form method="POST" action="login.php">
            <div class="grupo-campo">
                <label>Email</label>
                <input type="email" name="email" placeholder="Ex: meunome@gmail.com" required>
            </div>
            <div class="grupo-campo">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Ex: meunome123" required>
            </div>
            <?php if ($mensagem): ?>
            <div class="<?= $classe; ?>">
                <?= htmlspecialchars($mensagem); ?>
            </div>
            <?php endif; ?>

            <div class="linha-links-autenticacao">
                <a href="#">Esqueceu senha?</a>
                <a href="cadastro1.php">Cadastrar-se</a>
            </div>

            <button type="submit" class="btn btn-azul btn-bloco">Entrar &rarr;</button>
        </form>

        <?php echo (isset($registros) ? var_dump($registros) : '');?>
    </div>

</body>

</html>