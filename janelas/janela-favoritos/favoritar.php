<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id'];

if (!isset($_SESSION['favoritos'])) {
    $_SESSION['favoritos'] = [];
}

if (in_array($id, $_SESSION['favoritos'])) {
    $_SESSION['favoritos'] = array_diff($_SESSION['favoritos'], [$id]);
} else {
    $_SESSION['favoritos'][] = $id;
}

header('Location: ' . $_SERVER['HTTP_REFERER'] . '#mais-vendidos');
exit;