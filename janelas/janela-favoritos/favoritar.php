<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id'];

if (!isset($_SESSION['favoritos'])) {
    $_SESSION['favoritos'] = [];
}

if (in_array($id, $_SESSION['favoritos'])) {
    // remove
    $_SESSION['favoritos'] = array_diff($_SESSION['favoritos'], [$id]);
} else {
    // adiciona
    $_SESSION['favoritos'][] = $id;
}

// volta pra página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;