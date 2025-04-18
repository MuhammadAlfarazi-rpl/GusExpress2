<?php
include 'config.php';
session_start();

if (isset($_POST["ubah"])) {
    $admin = "admin";
    $pelangganID = $_POST['pelanggan_id'];

    $query = "UPDATE pelanggan SET role = '$admin' WHERE pelanggan_id = '$pelangganID'";
   
    if($conn->query($query) === TRUE) {
        $_SESSION["notification"] = [
            'type' => 'primary',
            'message' => 'Admin berhasil di tambahkan.'
        ];
    
    } else {
        $_SESSION["notification"] = [
            'type' => 'danger',
            'message' => 'Admin gagal ditambahkan'
        ];
    }
    header('Location: list_user.php');
}