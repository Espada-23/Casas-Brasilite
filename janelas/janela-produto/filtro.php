<?php
$sql = "
    SELECT p.*, f.caminho_imagem 
    FROM produto p
    LEFT JOIN foto_produto f ON p.id_produto = f.idProduto
    WHERE p.id_produto = $id_produto
    LIMIT 1
";

$stmt = $pdo->query($sql);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}

$sql_fotos = "SELECT caminho_imagem FROM foto_produto WHERE idProduto = $id_produto";
$stmt_fotos = $pdo->query($sql_fotos);
$fotos = $stmt_fotos->fetchAll(PDO::FETCH_ASSOC);

if (empty($fotos)) {
    $fotos[] = ['caminho_imagem' => '../../uploads/sem-foto.webp'];
}

$preco_atual = $produto['preco_unitario'];
$desconto_porcentagem = (int)$produto['desconto'];
if ($desconto_porcentagem > 0) {
    $preco_antigo = $preco_atual / (1 - ($desconto_porcentagem / 100));
} else {
    $preco_antigo = $preco_atual;
}

$sql_avaliacoes = "SELECT nota FROM avaliacao WHERE idProduto = $id_produto";
$stmt_av = $pdo->query($sql_avaliacoes);
$avaliacoes = $stmt_av->fetchAll(PDO::FETCH_ASSOC);
$total_avaliacoes = count($avaliacoes);

if ($total_avaliacoes > 0) {
    $soma_notas = 0;
    foreach ($avaliacoes as $av) {
        $soma_notas += $av['nota'];
    }
    $media_nota = round($soma_notas / $total_avaliacoes);
    $media_exibicao = number_format($soma_notas / $total_avaliacoes, 1, '.', '');
} else {
    $media_nota = 0;
    $media_exibicao = "0.0";
}