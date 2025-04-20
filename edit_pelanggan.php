<?php
include("config.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ganti'])) {
    $pelangganID = $_SESSION['pelanggan_id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE pelanggan SET username = '$username', nama = '$nama', alamat = '$alamat' WHERE pelanggan_id = '$pelangganID'";
    if($conn->query($query) === TRUE){
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Berhasil memperbarui data akun!'
        ];

    }else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui akun :('
        ];
    }
    header('Location: auth/logout.php');


} else {

}