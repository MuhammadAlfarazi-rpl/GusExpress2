<?php
include 'config.php';
session_start();

if(isset($_POST['simpan'])) {

    $pelangganId = $_SESSION["pelanggan_id"];
    $paket = $_POST["paket"];
    $desc = $_POST["deskripsi"];

    $query = "INSERT INTO pengiriman (pelanggan_id, paket_id, deskripsi, tanggal_pengiriman) VALUES ('$pelangganId','$paket','$desc',NOW())";

    if ($conn->query($query) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Berhasil menambahkan pengiriman.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Pengiriman gagal ditambahkan'
        ];
    }
    header('Location: dashboard.php');
}