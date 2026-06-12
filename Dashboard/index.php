<?php
require_once '../Crud/init.php';
require_once '../Crud/crud.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$mensagem = "";
$classe = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

    if ($email ===  "" || $senha === "") {
        $mensagem = "Informe o e-mail e a senha.";
    } else {

        $query = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
        $stmt = $pdo->query($query);
        $registros = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($registros) {
            $senhaValida = password_verify($senha, $registros['senha']) || hash_equals($registros['senha'], $senha);

            if ($senhaValida) {
                if (!password_get_info($registros['senha'])['algo']) {
                    $novaSenhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    $stmtAtualizaSenha = $pdo->prepare("UPDATE usuario SET senha = ? WHERE id_usuario = ?");
                    $stmtAtualizaSenha->execute([$novaSenhaHash, $registros['id_usuario']]);
                }

                $_SESSION['login_admin']['usuario'] = $registros['nome'];
                $_SESSION['login_admin']['email'] = $registros['email'];
                $_SESSION['login_admin']['id'] = $registros['id_usuario'];
                $_SESSION['login_admin']['perfil'] = $registros['perfil_usuario'];
                $_SESSION['login_admin']['cep'] = $registros['cep'];

                if ($registros['perfil_usuario'] === 'admin') {
                    header("Location: /Casas-Brasilite/Dashboard/dashboard.php");
                    exit;
                } else {
                    $mensagem = "Acesso negado. Esta área é permitida apenas para administradores.";
                    $classe = "erro";
                }
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
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="/Casas-Brasilite/janelas/cadastro-login/cadastro-login.css">
</head>

<body class="login-cadastro">

    <div class="cartao-login">
        <div class="marca-topo">
            <img src="\Casas-Brasilite\imagens\logo1.png">
        </div>
        <h2 class="titulo-autenticacao">Bem-vindo de volta</h2>
        <p class="subtitulo-autenticacao">Faça login na sua conta administrativa!</p>

        <form method="POST" action="index.php">
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

            <button type="submit" class="btn btn-azul btn-bloco">Entrar &rarr;</button>
        </form>

    </div>

</body>

</html>