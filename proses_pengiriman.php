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

if(isset($_POST['delete'])) {
    $pengirimanID = $_POST['pengirimanID'];
    $exec = mysqli_query($conn, "DELETE FROM pengiriman WHERE pengiriman_id = '$pengirimanID'");
    
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Paket berhasil dihapus.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Paket gagal ditambahkan'
        ];
    }
    header('Location: dashboard.php');
}

if (isset($_POST['selesai'])) {
    $pengirimanID = $_POST['pengirimanID'];

    $queryHistory = "UPDATE pengiriman SET status = 'selesai' WHERE pengiriman_id = '$pengirimanID'";
    $result = $conn->query($queryHistory);

    if ($result) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Paket telah sampai tujuan.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Paket belum sampai'
        ];
    }
    header('Location: dashboard.php');
}

if(isset($_POST['deleteHistory'])) {
    $pengirimanID = $_POST['pengirimanID'];
    $exec = mysqli_query($conn, "DELETE FROM pengiriman WHERE pengiriman_id = '$pengirimanID' AND status = 'selesai'");
    
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'History berhasil dihapus.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus history.'
        ];
    }
    header('Location: dashboard.php');
}
