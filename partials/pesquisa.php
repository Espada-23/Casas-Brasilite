<?php
require_once "../Crud/init.php";
require_once "../Crud/crud.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesquisa = trim($_POST['pesquisa']) ?? null;
    if (empty($pesquisa)) {
        $mensagem_erro = "Por favor, digite um nome ou e-mail para realizar a busca.";
    } else {
        $registros = readAll($pdo, 'produto', "nome_produto LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%'");

        if (count($registros) > 0) {
            foreach ($registros as $produto => $value) {
                $_SESSION['resultados'][$produto] = is_array($value) ? $value : $produto;
            }

            $_SESSION['resultados_produtos'] = $_SESSION['resultados'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $mensagem_pesquisa = "Nenhum produto encontrado.";
            $_SESSION['resultados_produtos'] = $_SESSION['resultados'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $registros_pesquisa = 1;
    }
}
