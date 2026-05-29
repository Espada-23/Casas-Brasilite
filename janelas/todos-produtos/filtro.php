<?php
require_once "../../Crud/crud.php";

if (isset($_GET['grupo'])) {
    $grupo = $_GET['grupo'];

    if ($grupo == 'ferramentas') {
        $sql = "SELECT * FROM produto WHERE idCategoria IN (1, 2)";
    } elseif ($grupo == 'materiais') {
        $sql = "SELECT * FROM produto WHERE idCategoria IN (3, 4, 5)";
    } elseif ($grupo == 'acabamento') {
        $sql = "SELECT * FROM produto WHERE idCategoria IN (6, 7, 8)";
    } else {
        $sql = "SELECT * FROM produto";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} elseif (isset($_GET['categoria'])) {
    $idCategoria = $_GET['categoria'];

    $sql = "SELECT * FROM produto WHERE idCategoria = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idCategoria]);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {
    $produtos = readAll($pdo, "produto");
}