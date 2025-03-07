<?php
include("config.php");
session_start();

if (isset($_POST['simpan'])) {

    $namaBarang = $_POST['nama_barang'];
    $beratBarang = $_POST['berat_barang'];
    $satuan = $_POST['satuan_name'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['biaya'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO paket (nama_paket, berat, satuan, tujuan, biaya, deskripsi) VALUES ('$namaBarang','$beratBarang','$satuan','$tujuan','$biaya','$deskripsi')";
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