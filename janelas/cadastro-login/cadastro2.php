<?php
require_once '../../Crud/init.php';

$voltar = $_GET['voltar'] ?? null;

if ($voltar !== null) {
    unset($_SESSION['cadastro']['nome']);
    unset($_SESSION['cadastro']['cpf']);
    unset($_SESSION['cadastro']['cep']);
    unset($_SESSION['cadastro']['estado']);
    unset($_SESSION['cadastro']['cidade']);
    unset($_SESSION['cadastro']['numero']);
    unset($_SESSION['cadastro']['bairro']);

    header("Location: cadastro1.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['cadastro']['cep'] = isset($_POST['cep']) ? trim($_POST['cep']) : '';
    $_SESSION['cadastro']['estado'] = isset($_POST['estado']) ? trim($_POST['estado']) : '';
    $_SESSION['cadastro']['cidade'] = isset($_POST['cidade']) ? trim($_POST['cidade']) : '';
    $_SESSION['cadastro']['numero'] = isset($_POST['numero']) ? trim($_POST['numero']) : '';
    $_SESSION['cadastro']['bairro'] = isset($_POST['bairro']) ? trim($_POST['bairro']) : '';

    header("Location: cadastro3.php");
    exit;
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
                <h2 class="titulo-autenticacao" style="margin-bottom: 25px;">Informe seu Endereço</h2>

                <form action="cadastro2.php" method="POST">
                    <div class="linha-campos-duplos">
                        <div class="grupo-campo">
                            <label>CEP</label>
                            <input type="text" pattern="\d{5}-\d{3}" name='cep' placeholder="Ex: 11111-111" required>
                        </div>
                        <div class="grupo-campo">
                            <label>Estado</label>
                            <select name="estado" required>
                                <option value="" disabled selected>Selecione um estado</option>
                                <option value="AC">Acre (AC)</option>
                                <option value="AL">Alagoas (AL)</option>
                                <option value="AP">Amapá (AP)</option>
                                <option value="AM">Amazonas (AM)</option>
                                <option value="BA">Bahia (BA)</option>
                                <option value="CE">Ceará (CE)</option>
                                <option value="DF">Distrito Federal (DF)</option>
                                <option value="ES">Espírito Santo (ES)</option>
                                <option value="GO">Goiás (GO)</option>
                                <option value="MA">Maranhão (MA)</option>
                                <option value="MT">Mato Grosso (MT)</option>
                                <option value="MS">Mato Grosso do Sul (MS)</option>
                                <option value="MG">Minas Gerais (MG)</option>
                                <option value="PA">Pará (PA)</option>
                                <option value="PB">Paraíba (PB)</option>
                                <option value="PR">Paraná (PR)</option>
                                <option value="PE">Pernambuco (PE)</option>
                                <option value="PI">Piauí (PI)</option>
                                <option value="RJ">Rio de Janeiro (RJ)</option>
                                <option value="RN">Rio Grande do Norte (RN)</option>
                                <option value="RS">Rio Grande do Sul (RS)</option>
                                <option value="RO">Rondônia (RO)</option>
                                <option value="RR">Roraima (RR)</option>
                                <option value="SC">Santa Catarina (SC)</option>
                                <option value="SP">São Paulo (SP)</option>
                                <option value="SE">Sergipe (SE)</option>
                                <option value="TO">Tocantins (TO)</option>
                            </select>
                        </div>
                    </div>



                    <div class="linha-campos-duplos">
                        <div class="grupo-campo">
                            <label>Cidade</label>
                            <input type="text" name='cidade' placeholder="Ex: São Caetano" required>
                        </div>
                        <div class="grupo-campo">
                            <label>Número</label>
                            <input type="text" name='numero' placeholder="Ex: 398" required>
                        </div>
                    </div>

                    <div class="grupo-campo">
                        <label>Bairro</label>
                        <input type="text" name='bairro' placeholder="Ex: Santa Maria" required>
                    </div>

                    <a href="#" class="link-suporte-ajuda">Precisa de ajuda? Contate o suporte.</a>

                    <button type="submit" class="btn btn-azul btn-bloco">Próximo</button>
                    <a href="cadastro2.php?voltar=1" class="link-voltar-fluxo">Voltar ao passo anterior</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>