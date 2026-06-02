<?php

$grupo = $_GET['grupo'] ?? null;

$categoria = $_GET['categoria'] ?? [];

if ($grupo == 'ferramentas') {
    $categoria = [1, 2, 10];
} elseif ($grupo == 'materiais') {
    $categoria = [3, 4, 5, 16, 23];
} elseif ($grupo == 'acabamento') {
    $categoria = [6, 7, 8];
} elseif ($grupo == 'maquinas_equipamentos') {
    $categoria = [12, 11, 9];
} elseif ($grupo == 'obras_estruturas') {
    $categoria = [19, 20, 21, 17];
} elseif ($grupo == 'suprimento_obras') {
    $categoria = [14, 13, 22];
} elseif ($grupo == 'seguranca') {
    $categoria = [32, 33, 34, 35];
}

$categoria = is_array($categoria) ? $categoria : [$categoria];

$marca = $_GET['marca'] ?? [];
$marca = is_array($marca) ? $marca : [$marca];

$preco_min = $_GET['preco_min'] ?? null;
$preco_max = $_GET['preco_max'] ?? null;
$ordem = $_GET['ordem'] ?? null;
$avaliacao = $_GET['avaliacao'] ?? [];
$avaliacao = is_array($avaliacao) ? $avaliacao : [$avaliacao];
$disponibilidade = $_GET['disponibilidade'] ?? null;



function buscarProdutos($pdo, $categoria, $marca, $preco_min, $preco_max, $ordem, $avaliacao, $disponibilidade)
{
    $sql = "
        SELECT
            p.*,
            e.quantidade_atual,
            IFNULL(AVG(a.nota), 0) AS media_avaliacao,
            COUNT(a.id_avaliacao) AS total_avaliacoes,
            MIN(f.caminho_imagem) as caminho_imagem
        FROM produto p
        LEFT JOIN foto_produto f ON f.idProduto = p.id_produto
        LEFT JOIN estoque e ON e.idProduto = p.id_produto
        LEFT JOIN avaliacao a ON a.idProduto = p.id_produto
        WHERE p.status_produto = 'ativo'
    ";

    $params = [];

    // categorias
    if (!empty($categoria)) {
        $in = implode(',', array_fill(0, count($categoria), '?'));
        $sql .= " AND p.idCategoria IN ($in)";
        $params = array_merge($params, $categoria);
    }

    // marcas
    if (!empty($marca)) {
        $in = implode(',', array_fill(0, count($marca), '?'));
        $sql .= " AND p.marca IN ($in)";
        $params = array_merge($params, $marca);
    }

    // preço
    if ($preco_min !== null && $preco_min !== '') {
        $sql .= " AND p.preco_unitario >= ?";
        $params[] = $preco_min;
    }

    if ($preco_max !== null && $preco_max !== '') {
        $sql .= " AND p.preco_unitario <= ?";
        $params[] = $preco_max;
    }

    // diposnivel/ nao disponivel
    if ($disponibilidade == 'estoque') {
        $sql .= " AND e.quantidade_atual > 0";
    }

    if ($disponibilidade == 'promocao') {
        $sql .= " AND p.desconto > 0";
    }

    // agrupamento
    $sql .= " GROUP BY p.id_produto";

    // estrelas de avaliação
    if (!empty($avaliacao)) {
        $placeholders = implode(',', array_fill(0, count($avaliacao), '?'));
        $sql .= " HAVING ROUND(media_avaliacao) IN ($placeholders)";
        $params = array_merge($params, $avaliacao);
    }



    // Ordenação dos produtos
    if ($ordem == 'menor_preco') {
        $sql .= " ORDER BY p.preco_unitario ASC";
    } elseif ($ordem == 'maior_preco') {
        $sql .= " ORDER BY p.preco_unitario DESC";
    } else {
        $sql .= " ORDER BY p.id_produto DESC";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarCategorias($pdo)
{
    $sql = "SELECT * FROM categoria";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarMarcas($pdo)
{
    $sql = "SELECT DISTINCT marca FROM produto WHERE marca IS NOT NULL";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$produtos = buscarProdutos($pdo, $categoria, $marca, $preco_min, $preco_max, $ordem, $avaliacao, $disponibilidade);
$categorias = buscarCategorias($pdo);
$marcas = buscarMarcas($pdo);