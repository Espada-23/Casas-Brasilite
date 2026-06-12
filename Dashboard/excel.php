<?php
// Importa o crud e a conexão PDO ($pdo)
require_once '../Crud/crud.php';
require_once '../Crud/init.php';

// VERIFICAÇÃO ESSENCIAL: Só executa a exportação se o botão foi clicado (?exportar=true)
if (isset($_GET['exportar']) && $_GET['exportar'] == 'true') {
    try {
        // Consulta SQL TOTALMENTE CORRIGIDA com base no seu arquivo .sql real
        $sql = "
 

    SELECT
    pr.nome_produto AS produto,
    SUM(m.quantidade) AS quantidade_vendida,
    pr.preco_unitario AS valor_unitario,
    SUM(m.quantidade * pr.preco_unitario) AS valor_total

FROM pagamento p

INNER JOIN movimentacao m
    ON p.id_pagamento = m.idPagamento

INNER JOIN estoque e
    ON m.idEstoque = e.id_estoque

INNER JOIN produto pr
    ON e.idProduto = pr.id_produto

WHERE
    p.status_pagamento = 'pago'
    AND m.tipo_movimentacao = 'saida'

GROUP BY
    pr.id_produto

ORDER BY
    quantidade_vendida DESC
";

      $stmt = $pdo->query($sql);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="relatorio_produtos_pagos.csv"');

$output = fopen('php://output', 'w');

fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

fputcsv($output, [
    'Produto',
    'Quantidade Vendida',
    'Valor Unitário',
    'Valor Total'
], ';');

foreach ($dados as $linha) {
    fputcsv($output, [
        $linha['produto'],
        $linha['quantidade_vendida'],
        number_format($linha['valor_unitario'], 2, ',', '.'),
        number_format($linha['valor_total'], 2, ',', '.')
    ], ';');
}

fclose($output);
exit;
    } catch (PDOException $e) {
        echo "Erro ao exportar dados: " . $e->getMessage();
        exit;
    }
}   
// Se a URL NÃO tiver '?exportar=true', o PHP ignora o bloco acima e continua para o HTML abaixo
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\Casas-Brasilite\imagens\icon.png" type="image/x-icon">
    <title>Dashboard - Pedidos</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/pedidos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <?php include 'sidebar.php'; ?>

        <main class="conteudo-principal" style="padding: 20px; width: 100%;">
            <div class="box-exportar" style="margin-bottom: 20px;">
                <a href="?exportar=true" class="btn btn-success" style="background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-flex; align-items: center; gap: 8px; font-weight: bold;">
                    <i class="bi bi-file-earmark-excel"></i> Exportar Produtos Pagos para Excel
                </a>
            </div>
        </main>
    </div>
</body>

</html>