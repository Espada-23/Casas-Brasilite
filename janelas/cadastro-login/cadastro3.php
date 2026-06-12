<?php
require_once '../../Crud/init.php';

$voltar = $_GET['voltar'] ?? null;

if ($voltar != null)
{
    unset($_SESSION['cadastro']['email']);
    unset($_SESSION['cadastro']['senha']);
    unset($_SESSION['cadastro']['telefone']);

    header("Location: cadastro2.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmarsenha'];
    
    if (!($senha === $confirmar)) {
        $erro_senha = "As senhas não coincidem. Por favor, tente novamente.";
    } else {
        $_SESSION['cadastro']['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
        $_SESSION['cadastro']['senha'] = isset($_POST['senha']) ? password_hash(trim($_POST['senha']), PASSWORD_DEFAULT) : '';
        $_SESSION['cadastro']['telefone'] = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';

        header("Location: cadastro_processo.php");
        exit;
    }
}
?>
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

                <form action="cadastro3.php" method="POST">
                    <div class="grupo-campo">
                        <label>E-mail</label>
                        <input type="email" name='email' placeholder="Ex: seunome@gmail.com" required>
                    </div>

                    <div class="linha-campos-duplos">
                        <div class="grupo-campo">
                            <label>Senha</label>
                            <input type="password" name='senha' placeholder="Ex: SeuNome123" minlength="8" required>
                        </div>
                        <div class="grupo-campo">
                            <label>Confirmar Senha</label>
                            <input type="password" name='confirmarsenha' placeholder="Ex: SeuNome123" minlength="8" required>
                        </div> 
                    </div>
                    
                    <div>
                        <?php
                            if (isset($erro_senha) && $erro_senha != null) {
                                $erro_senha1 = $erro_senha;
                                print_r($erro_senha);
                                unset($erro_senha);
                            }
                        ?>
                    </div>

                    <div class="grupo-campo">
                        <label>Telefone</label>
                        <input type="tel" pattern="\(\d{2}\)\s\d{4,5}-\d{4}" name='telefone' placeholder="Ex: (11) 99999-9999" required>
                    </div>

                    <div class="caixa-selecao-termos">
                        <input type="checkbox" name='termos' id="termos" required>
                        <label for="termos">Aceito e Concordo com os Termos de Uso</label>
                    </div>

                    <a href="#" class="link-suporte-ajuda">Precisa de ajuda? Contate o suporte.</a>

                    <button type="submit" class="btn btn-azul btn-bloco">Cadastrar &rarr;</button>
                    <a href="cadastro3.php?voltar=1" class="link-voltar-fluxo">Voltar ao passo anterior</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>