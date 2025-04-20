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

    if($conn->query($query) === TRUE) {
        $_SESSION["notification"] = [
            'type' => 'primary',
            'message' => 'Paket berhasil ditambahkan.'
        ];

    } else {
        $_SESSION["notification"] = [
            'type' => 'danger',
            'message' => 'Paket gagal ditambahkan'
        ];
    }
    header('Location: dashboard.php');
}

if (isset($_POST["delete"])) {
    $paketId = $_POST['paket_id'];
    $deleteQuery = "DELETE FROM paket WHERE paket_id='$paketId'";

    if ($conn->query($deleteQuery) === TRUE) {
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

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {

    $namaBarang = $_POST['nama_barang'];
    $beratBarang = $_POST['berat'];
    $satuan = $_POST['satuan_id'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['biaya'];
    $detail = $_POST['detail'];
    $pelangganID = $_SESSION["pelanggan_id"];

    $queryUpdate = "UPDATE paket SET nama_paket = '$namaBarang', berat = '$beratBarang', satuan_id = '$satuan', tujuan = '$tujuan', biaya = '$biaya', pelanggan_id = '$pelangganID', detail = '$detail'";

    if($conn->query($queryUpdate) === TRUE){
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
    header('Location: dashboard.php');


    
}

$conn->close();
?>