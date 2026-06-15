<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../Crud/init.php';
require_once '../../Crud/crud.php';
require_once '../../Crud/sessions.php';

if (!usuarioLogado()) {
    header("Location: /Casas-Brasilite/janelas/cadastro-login/login.php");
    exit;
}

$idUsuario = idUsuarioLogado();
$mensagem = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dados = [
        'nome'     => trim($_POST['nome'] ?? ''),
        'email'    => trim($_POST['email'] ?? ''),
        'cpf'      => trim($_POST['cpf'] ?? ''),
        'telefone' => trim($_POST['telefone'] ?? ''),
        'cep'      => trim($_POST['cep'] ?? ''),
        'estado'   => trim($_POST['estado'] ?? ''),
        'cidade'   => trim($_POST['cidade'] ?? ''),
        'bairro'   => trim($_POST['bairro'] ?? ''),
        'numero'   => trim($_POST['numero'] ?? ''),
    ];

    if (empty($dados['nome']) || empty($dados['email'])) {
        $erro = 'Os campos Nome e E-mail são obrigatórios.';
    }

    if (empty($erro) && !empty($_POST['nova_senha'])) {
        if ($_POST['nova_senha'] !== $_POST['confirmar_senha']) {
            $erro = 'As senhas não coincidem.';
        } else {
            $dados['senha'] = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
        }
    }

    if (empty($erro)) {
        try {
            $stmtEmail = $pdo->prepare("SELECT COUNT(*) AS total FROM usuario WHERE email = ? AND id_usuario != ?");
            $stmtEmail->execute([$dados['email'], $idUsuario]);
            
            if ($stmtEmail->fetch(PDO::FETCH_ASSOC)['total'] > 0) {
                $erro = 'Este e-mail já está sendo utilizado por outra conta.';
            } else {
                update($pdo, 'usuario', $dados, "id_usuario = $idUsuario");
                
                $mensagem = 'Alterações salvas com sucesso!';

                if (isset($_SESSION['login'])) {
                    $_SESSION['login']['usuario'] = $dados['nome'];
                    $_SESSION['login']['email'] = $dados['email'];
                }
            }
        } catch (PDOException $e) {
            $erro = 'Erro ao atualizar os dados: ' . $e->getMessage();
        }
    }
}

$usuario = read($pdo, 'usuario', '*', "id_usuario = $idUsuario");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="configuracao.css">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php require_once "../../partials/header.php"; ?>

    <main>

        <div class="top-header">
            <h1>Configurações de Perfil</h1>
        </div>

            <?php if (!empty($mensagem)): ?>
                <div class="alerta alerta-sucesso">
                    <i class="bi bi-check-circle-fill"></i> <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($erro)): ?>
                <div class="alerta alerta-erro">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?= htmlspecialchars($erro) ?>
                </div>
            <?php endif; ?>

        <div class="container-main">

            <form method="POST" class="form-info">

                <div class="card-settings">
                    <div class="title">
                        <i class="bi bi-people"></i>
                        <h3>Informações Pessoais</h3>
                    </div>
                    <div class="informacoes">
                        <div class="campo">
                            <label for="nome">Nome Completo</label>
                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                value="<?= htmlspecialchars($usuario['nome'] ?? '') ?>" required>
                        </div>
                        <div class="campo">
                            <label for="email">E-mail</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="<?= htmlspecialchars($usuario['email']) ?>"
                                required>
                        </div>
                        <div class="campo">
                            <label for="cpf">CPF</label>
                            <input
                                type="text"
                                id="cpf"
                                name="cpf"
                                value="<?= htmlspecialchars($usuario['cpf']) ?>"
                                required>
                        </div>
                        <div class="campo">
                            <label for="telefone">Telefone</label>
                            <input
                                type="text"
                                id="telefone"
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
                            <label for="cep">CEP</label>
                            <input
                                type="text"
                                id="cep"
                                name="cep"
                                value="<?= htmlspecialchars($usuario['cep']) ?>">
                        </div>
                        <div class="campo">
                            <label for="estado">Estado</label>
                            <input
                                type="text"
                                id="estado"
                                name="estado"
                                value="<?= htmlspecialchars($usuario['estado']) ?>">
                        </div>
                        <div class="campo">
                            <label for="cidade">Cidade</label>
                            <input
                                type="text"
                                id="cidade"
                                name="cidade"
                                value="<?= htmlspecialchars($usuario['cidade']) ?>">
                        </div>
                        <div class="campo">
                            <label for="bairro">Bairro</label>
                            <input
                                type="text"
                                id="bairro"
                                name="bairro"
                                value="<?= htmlspecialchars($usuario['bairro']) ?>">
                        </div>
                        <div class="campo">
                            <label for="numero">Número</label>
                            <input
                                type="text"
                                id="numero"
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
                        <p><?= htmlspecialchars(ucfirst($usuario['perfil_usuario'])) ?></p>
                    </div>
                </div>

                <div class="privacidade">
                    <div class="title">
                        <i class="bi bi-shield-lock"></i>
                        <h3>Alteração de Senha</h3>
                    </div>
                    <div class="informacoes">
                        <div class="campo">
                            <label for="nova_senha">Nova Senha</label>
                            <input
                                type="password"
                                id="nova_senha"
                                name="nova_senha"
                                placeholder="Digite a nova senha">
                        </div>
                        <div class="campo">
                            <label for="confirmar_senha">Confirmar Nova Senha</label>
                            <input
                                type="password"
                                id="confirmar_senha"
                                name="confirmar_senha"
                                placeholder="Confirme a nova senha">
                        </div>
                    </div>
                    <div class="mensagem">
                        <i class="bi bi-info-circle-fill"></i>
                        <p>Preencha se desejar alterar a senha ou confirmar alterações.</p>
                    </div>
                </div>

                <div class="botoes">
                    <a href="/Casas-Brasilite/janelas/cadastro-login/logout.php" name="sair" class="sair">
                        <i class="bi bi-box-arrow-right"></i>
                        Sair da Conta
                    </a>
                    <button type="submit" class="salvar">
                        <i class="bi bi-floppy"></i>
                        Salvar Alterações
                    </button>
                </div>

            </form>

        </div>

    </main>










    <!-- <main>
        <div class="container-configuracao">
            <h2>Configurações da Conta</h2>
            <p>Gerencie as informações do seu perfil e endereço.</p>



            <form method="POST" action="configuracao.php">
                
                <div class="secao-form">
                    <h3>Dados Pessoais</h3>
                    <div class="grid-campos">
                        <div class="campo">
                            <label for="nome">Nome Completo</label>
                            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome'] ?? '') ?>" required>
                        </div>
                        <div class="campo">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email'] ?? '') ?>" required>
                        </div>
                        <div class="campo">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($usuario['cpf'] ?? '') ?>">
                        </div>
                        <div class="campo">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($usuario['telefone'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <div class="secao-form">
                    <h3>Endereço de Entrega</h3>
                    <div class="grid-campos">
                        <div class="campo">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" value="<?= htmlspecialchars($usuario['cep'] ?? '') ?>">
                        </div>
                        <div class="campo">
                            <label for="estado">Estado (UF)</label>
                            <input type="text" id="estado" name="estado" value="<?= htmlspecialchars($usuario['estado'] ?? '') ?>" maxlength="2">
                        </div>
                        <div class="campo">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($usuario['cidade'] ?? '') ?>">
                        </div>
                        <div class="campo">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($usuario['bairro'] ?? '') ?>">
                        </div>
                        <div class="campo">
                            <label for="numero">Número / Complemento</label>
                            <input type="text" id="numero" name="numero" value="<?= htmlspecialchars($usuario['numero'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <div class="secao-form">
                    <h3>Segurança</h3>
                    <div class="grid-campos">
                        <div class="campo">
                            <label for="nova_senha">Nova Senha</label>
                            <input type="password" id="nova_senha" name="nova_senha" placeholder="Digite a nova senha">
                        </div>
                        <div class="campo">
                            <label for="confirmar_senha">Confirmar Nova Senha</label>
                            <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme a nova senha">
                        </div>
                    </div>
                    <div class="mensagem-info">
                        <i class="bi bi-info-circle-fill"></i>
                        <p>Deixe os campos de senha vazios caso queira alterar apenas os seus dados cadastrais.</p>
                    </div>
                </div>

                <div class="botoes">
                    <a href="/Casas-Brasilite/janelas/cadastro-login/logout.php" class="sair">
                        <i class="bi bi-box-arrow-right"></i>
                        Sair da Conta
                    </a>
                    <button type="submit" class="salvar">
                        <i class="bi bi-floppy"></i>
                        Salvar Alterações
                    </button>
                </div>

            </form>
        </div>
    </main>
 -->

</body>
</html>