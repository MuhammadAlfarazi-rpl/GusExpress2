<?php
session_start();

$username = $_SESSION["username"];
$role = $_SESSION["role"];
$nama = $_SESSION["nama"];
$user_id = $_SESSION["pelanggan_id"];

$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}

if (empty($_SESSION["username"]) || empty($_SESSION["role"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silakan login terlebih dahulu!'
    ];
    header('Location: ./auth/login.php');
    exit();
}