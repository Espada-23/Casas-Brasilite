<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Crud/init.php';
require_once '../Crud/crud.php';

$nome_imagem_1 = $_SESSION['nome_imagem_1'] ?? "Imagem Principal";
$nome_imagem_2 = $_SESSION['nome_imagem_2'] ?? "Imagem 2";
$nome_imagem_3 = $_SESSION['nome_imagem_3'] ?? "Imagem 3";
$nome_imagem_4 = $_SESSION['nome_imagem_4'] ?? "Imagem 4";
$obrigatoria = "(Obrigatória)";
$opcional = "(Opcional)";

$acao = $_GET['acao'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $acao === 'atualizar_fotos') {
    $_SESSION['dados_salvos'] = $_POST ?? '';

    for ($i = 1; $i <= 4; $i++) {
        $campo = 'foto_produto_' . $i;

        if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] == 0) {
            $_SESSION['nome_imagem_' . $i] = $_FILES[$campo]['name'];
        }
    }

    header("Location: produtos.php?acao=novo");
    exit;
}
?>

<form action="produtos_fotos.php?acao=atualizar_fotos<?= isset($id) ? '&id='.$id : '' ?>" method="post" enctype="multipart/form-data">
    
    <div class="campo">
        <label>Imagem Principal</label>
        <input type="file" onchange="this.form.action='produtos_fotos.php?acao=atualizar_fotos'; this.form.submit();" name="foto_produto_1" id="foto_principal" accept="image/png, image/jpeg, image/webp">
        <label for="foto_principal" class="upload-label">
            <span class="icon">+</span>
            <span class="title"><?= $_SESSION['nome_imagem_1'] ?? $nome_imagem_1 ?? 'Selecionar imagem'; ?></span>
            <span class="subtitle">
                <?= (!isset($_SESSION['nome_imagem_1']) || empty($_SESSION['nome_imagem_1'])) ? ($obrigatoria ?? "Obrigatório") : "Obrigatório"; ?>
            </span>
        </label>
    </div>

    <div class="campo">
        <label>Imagem 2</label>
        <input type="file" onchange="this.form.action='produtos_fotos.php?acao=atualizar_fotos'; this.form.submit();" name="foto_produto_2" id="foto_2" accept="image/png, image/jpeg, image/webp">
        <label for="foto_2" class="upload-label">
            <span class="icon">+</span>
            <span class="title"><?= $_SESSION['nome_imagem_2'] ?? $nome_imagem_2 ?? 'Selecionar imagem'; ?></span>
            <span class="subtitle">
                <?= (!isset($_SESSION['nome_imagem_2']) || empty($_SESSION['nome_imagem_2'])) ? ($opcional ?? "Opcional") : "Opcional"; ?>
            </span>
        </label>
    </div>

    <div class="campo">
        <label>Imagem 3</label>
        <input type="file" onchange="this.form.action='produtos_fotos.php?acao=atualizar_fotos'; this.form.submit();" name="foto_produto_3" id="foto_3" accept="image/png, image/jpeg, image/webp">
        <label for="foto_3" class="upload-label">
            <span class="icon">+</span>
            <span class="title"><?= $_SESSION['nome_imagem_3'] ?? $nome_imagem_3 ?? 'Selecionar imagem'; ?></span>
            <span class="subtitle">
                <?= (!isset($_SESSION['nome_imagem_3']) || empty($_SESSION['nome_imagem_3'])) ? ($opcional ?? "Opcional") : "Opcional"; ?>
            </span>
        </label>
    </div>

    <div class="campo">
        <label>Imagem 4</label>
        <input type="file" onchange="this.form.action='produtos_fotos.php?acao=atualizar_fotos'; this.form.submit();" name="foto_produto_4" id="foto_4" accept="image/png, image/jpeg, image/webp">
        <label for="foto_4" class="upload-label">
            <span class="icon">+</span>
            <span class="title"><?= $_SESSION['nome_imagem_4'] ?? $nome_imagem_4 ?? 'Selecionar imagem'; ?></span>
            <span class="subtitle">
                <?= (!isset($_SESSION['nome_imagem_4']) || empty($_SESSION['nome_imagem_4'])) ? ($opcional ?? "Opcional") : "Opcional"; ?>
            </span>
        </label>
    </div>
</form>