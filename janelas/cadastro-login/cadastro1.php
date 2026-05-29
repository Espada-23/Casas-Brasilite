<?php
    require_once '../../Crud/init.php';
    require_once '../../Crud/crud.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = isset($_POST['cpf']) ? trim($_POST['cpf']) : '';

    $usuario_existente = read($pdo, 'usuario', 'cpf = "'. $_POST['cpf'] . '"');

    if (empty($usuario_existente)) {
        $erro_cadastro = "Este CPF já está cadastrado em nosso sistema!";
    } else {
        $_SESSION['cadastro']['nome'] = $_POST['nome'];
        $_SESSION['cadastro']['cpf'] = $cpf;
        header("Location: cadastro2.php");
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

        <?php include_once "../../partials/cadastro-lado-esquerdo.php";?>

        <div class="lado-formulario">
            <div class="caixa-interna-passo">
                <h2 class="titulo-autenticacao" style="margin-bottom: 25px;">Faça seu Cadastro</h2>

                <form action="cadastro1.php" method="POST">
                    <div class="grupo-campo">
                        <label>Nome</label>
                        <input type="text" name='nome' placeholder="Ex: Seu Nome Completo" required>
                    </div>
                    <div class="grupo-campo">
                        <label>CPF</label>
                        <input type="text" name='cpf' placeholder="Ex: 213.333.123-55" required>
                    </div>

                    <div>
                        <?php
                            if (isset($erro_cadastro) && $erro_cadastro != null) {
                                $erro_cadastrado1 = $erro_cadastro;
                                print_r($erro_cadastrado1);
                                unset($erro_cadastro);
                            }
                        ?>
                    </div>

                    <a href="#" class="link-suporte-ajuda">Precisa de ajuda? Contate o suporte.</a>

                    <button type="submit" class="btn btn-azul btn-bloco">Próximo</button>
                    <a href="login.php" class="link-voltar-fluxo">Voltar ao Login</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>