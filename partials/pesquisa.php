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
            foreach ($registros as $usuario => $value) {
                $_SESSION['resultados'][$usuario] = is_array($value) ? $value : $usuario;
            }

            header("Location: header.php?res=1");
            exit;
        } else {
            $mensagem_pesquisa = "Nenhum usuário encontrado.";
        }

        $registros_pesquisa = 1;
        }
    }
?>