<?php
require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';


if (!usuarioLogado()) {
    header("Location: ../login.php");
    exit;
}

$idUsuario = idUsuarioLogado();

$usuario = read(
    $pdo,
    'usuario',
    '*',
    "id_usuario = $idUsuario"
);

$mensagem = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'cpf' => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'cep' => $_POST['cep'],
        'estado' => $_POST['estado'],
        'cidade' => $_POST['cidade'],
        'bairro' => $_POST['bairro'],
        'numero' => $_POST['numero']
    ];

    if (!empty($_POST['nova_senha'])) {

        if ($_POST['nova_senha'] !== $_POST['confirmar_senha']) {

            $erro = 'As senhas não coincidem.';

        } else {

            $dados['senha'] = password_hash(
                $_POST['nova_senha'],
                PASSWORD_DEFAULT
            );
        }
    }

    if (empty($erro)) {

        update(
            $pdo,
            'usuario',
            $dados,
            "id_usuario = $idUsuario"
        );

        $usuario = read(
            $pdo,
            'usuario',
            '*',
            "id_usuario = $idUsuario"
        );

        salvarUsuarioNaSessao($usuario);

        $mensagem = 'Dados atualizados com sucesso!';
    }
}
?>





<!-- 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração</title>
    <link rel="stylesheet" href="css/configuracao.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../partials-css/header.css">
</head>

<body>

    <?php
    require_once "../../partials/header.php";
    ?>

    <main>

        <div class="top-header">
            <h1>Configurações de Perfil</h1>
        </div>

        <div class="container-main">

            <form class="form-info">
                <div class="card-settings">
                    <div class="title">
                        <i class="bi bi-people"></i>
                        <h3>Informações Pessoais</h3>
                    </div>
                    <div class="informacoes">
                        <div class="campo">
                            <label>Nome Completo</label>
                            <input type="text" placeholder="João Gomes" name="nome">
                        </div>
                        <div class="campo">
                            <label>E-mail</label>
                            <input type="email" placeholder="joaogomes@gmail.com" name="email">
                        </div>
                        <div class="campo">
                            <label>CPF</label>
                            <input type="text" placeholder="428.351.838-76" name="cpf">
                        </div>
                        <div class="campo">
                            <label>Telefone</label>
                            <input type="text" placeholder="(11) 99999-9999" name="telefone">
                        </div>
                    </div>
                </div>
                <div class="card-endereco">
                    <div class="title">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Endereço</h3>
                    </div>
                    <div class="informacoes">
                        <div class="campo">
                            <label>CEP</label>
                            <input type="text" placeholder="09560-580" name="cep">
                        </div>
                        <div class="campo">
                            <label>Estado</label>
                            <input type="text" placeholder="SP" name="estado">
                        </div>
                        <div class="campo">
                            <label>Cidade</label>
                            <input type="text" placeholder="São Caetano do Sul" name="cidade">
                        </div>
                        <div class="campo">
                            <label>Bairro</label>
                            <input type="text" placeholder="Santa Maria" name="bairro">
                        </div>
                        <div class="campo">
                            <label>Número</label>
                            <input type="number" placeholder="444" name="numero">
                        </div>
                    </div>
                </div>
                <div class="info-conta">
                    <div class="title">
                        <i class="bi bi-shield-exclamation"></i>
                        <h3>Informação da Conta</h3>
                    </div>
                    <div class="campo">
                        <label>Perfil do Usuário</label>
                        <p>Cliente</p>
                    </div>
                </div>
            </form>
            <div class="privacidade">
                <div class="title">
                    <i class="bi bi-shield-lock"></i>
                    <h3>Alteração de Senha</h3>
                </div>
                <div class="informacoes">
                    <form>
                        <div class="campo">
                            <label>Nova Senha</label>
                            <input type="text" name="nova-senha" placeholder="Digite a nova senha">
                        </div>
                        <div class="campo">
                            <label>Confirmar Nova Senha</label>
                            <input type="text" name="confirmar-senha" placeholder="Confirme a nova senha">
                        </div>
                    </form>
                </div>

                <div class="mensagem">
                    <i class="bi bi-info-circle-fill"></i>
                    <p>Preencha apenas se desejar alterar a senha</p>
                </div>

            </div>
            <div class="botoes">
                <form>
                    <button type="reset" class="sair">
                        Sair da Conta
                    </button>
                    <button type="submit" class="salvar">
                        <i class="bi bi-floppy"></i>
                        Salvar as alterações
                    </button>
                </form>
            </div>
        </div>
    </main>

 -->

<form method="POST" class="form-info">

    <div class="card-settings">
        <div class="title">
            <i class="bi bi-people"></i>
            <h3>Informações Pessoais</h3>
        </div>

        <div class="informacoes">

            <div class="campo">
                <label>Nome Completo</label>
                <input
                    type="text"
                    name="nome"
                    value="<?= htmlspecialchars($usuario['nome']) ?>"
                    required>
            </div>

            <div class="campo">
                <label>E-mail</label>
                <input
                    type="email"
                    name="email"
                    value="<?= htmlspecialchars($usuario['email']) ?>"
                    required>
            </div>

            <div class="campo">
                <label>CPF</label>
                <input
                    type="text"
                    name="cpf"
                    value="<?= htmlspecialchars($usuario['cpf']) ?>"
                    required>
            </div>

            <div class="campo">
                <label>Telefone</label>
                <input
                    type="text"
                    name="telefone"
                    value="<?= htmlspecialchars($usuario['telefone']) ?>">
            </div>

        </div>
    </div>

    <div class="card-endereco">

        <div class="title">
            <i class="bi bi-geo-alt"></i>
            <h3>Endereço</h3>
        </div>

        <div class="informacoes">

            <div class="campo">
                <label>CEP</label>
                <input
                    type="text"
                    name="cep"
                    value="<?= htmlspecialchars($usuario['cep']) ?>">
            </div>

            <div class="campo">
                <label>Estado</label>
                <input
                    type="text"
                    name="estado"
                    value="<?= htmlspecialchars($usuario['estado']) ?>">
            </div>

            <div class="campo">
                <label>Cidade</label>
                <input
                    type="text"
                    name="cidade"
                    value="<?= htmlspecialchars($usuario['cidade']) ?>">
            </div>

            <div class="campo">
                <label>Bairro</label>
                <input
                    type="text"
                    name="bairro"
                    value="<?= htmlspecialchars($usuario['bairro']) ?>">
            </div>

            <div class="campo">
                <label>Número</label>
                <input
                    type="text"
                    name="numero"
                    value="<?= htmlspecialchars($usuario['numero']) ?>">
            </div>

        </div>

    </div>

    <div class="info-conta">

        <div class="title">
            <i class="bi bi-shield-exclamation"></i>
            <h3>Informação da Conta</h3>
        </div>

        <div class="campo">
            <label>Perfil do Usuário</label>
            <p><?= ucfirst($usuario['perfil_usuario']) ?></p>
        </div>

    </div>

    <div class="privacidade">

        <div class="title">
            <i class="bi bi-shield-lock"></i>
            <h3>Alteração de Senha</h3>
        </div>

        <div class="informacoes">

            <div class="campo">
                <label>Nova Senha</label>
                <input
                    type="password"
                    name="nova_senha"
                    placeholder="Digite a nova senha">
            </div>

            <div class="campo">
                <label>Confirmar Nova Senha</label>
                <input
                    type="password"
                    name="confirmar_senha"
                    placeholder="Confirme a nova senha">
            </div>

        </div>

        <div class="mensagem">
            <i class="bi bi-info-circle-fill"></i>
            <p>Preencha apenas se desejar alterar a senha.</p>
        </div>

    </div>

    <div class="botoes">

        <button type="submit" class="salvar">
            <i class="bi bi-floppy"></i>
            Salvar Alterações
        </button>

    </div>

</form>








</body>















</html>