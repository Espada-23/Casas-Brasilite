<?php  
if (!isset($_SESSION['favoritos'])) {
    $_SESSION['favoritos'] = [];
}

/*
    usort ($_SESSION['produtos'], function($nome_1, $nome_2){
        return strcmp($nome_1['nome'], $nome_2['nome']);
    });
    // session_destroy();

    if (!isset($_SESSION['estoque_minimo'])){
        $_SESSION['estoque_minimo'] = $estoque_minimo;
    };*/