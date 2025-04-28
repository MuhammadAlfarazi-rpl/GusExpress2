<?php
include("config.php");
session_start();

if (isset($_POST['simpan'])) {

    $namaBarang = $_POST['nama_barang'];
    $beratBarang = $_POST['berat'];
    $satuan = $_POST['satuan_id'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['id_harga'];
    $detail = $_POST['detail'];
    $pelangganID = $_SESSION["pelanggan_id"];

    $query = "INSERT INTO paket (nama_paket, berat, satuan_id, tujuan, id_harga, detail, pelanggan_id) VALUES ('$namaBarang','$beratBarang','$satuan','$tujuan','$biaya','$detail','$pelangganID')";

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
    header('Location: profil_default.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {

    $paketId = $_POST['id_paket'];
    $namaBarang = $_POST['nama_barang'];
    $beratBarang = $_POST['berat'];
    $satuan = $_POST['satuan_id'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['id_harga'];
    $detail = $_POST['detail'];
    $pelangganID = $_SESSION["pelanggan_id"];

    $queryUpdate = "UPDATE paket SET nama_paket = '$namaBarang', berat = '$beratBarang', satuan_id = '$satuan', tujuan = '$tujuan', id_harga = '$biaya', pelanggan_id = '$pelangganID', detail = '$detail' WHERE paket_id = '$paketId'";

    if($conn->query($queryUpdate) === TRUE){
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Paket berhasil diperbarui.'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui paket'
        ];
    }
    header('Location: profil_default.php');


    
}

$conn->close();
?>