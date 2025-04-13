<?php
include("config.php");
session_start();

if (isset($_POST['simpan'])) {

    $namaBarang = $_POST['nama_barang'];
    $beratBarang = $_POST['berat'];
    $satuan = $_POST['satuan_id'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['biaya'];
    $detail = $_POST['detail'];
    $pelangganID = $_SESSION["pelanggan_id"];

    $query = "INSERT INTO paket (nama_paket, berat, satuan_id, tujuan, biaya, detail, pelanggan_id) VALUES ('$namaBarang','$beratBarang','$satuan','$tujuan','$biaya','$detail','$pelangganID')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Paket berhasil ditambahkan.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Paket gagal ditambahkan'
        ];
    }
    header('Location: paket.php');
}

if (isset($_POST["delete"])) {
    $paketId = $_POST['paket_id'];
    $execute = mysqli_query($conn, "DELETE FROM paket WHERE paket_id='$paketId'");

    if ($execute) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Paket berhasil dihapus.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus paket'
        ];
    }
    header('Location: paket_list.php');
}