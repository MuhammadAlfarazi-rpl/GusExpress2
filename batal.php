<?php
include 'config.php';
session_start();

if(isset($_POST['delete'])) {
    $pengirimanID = $_POST['pengirimanID'];
    $exec = mysqli_query($conn, "DELETE FROM pengiriman WHERE pengiriman_id = '$pengirimanID'");
    
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
    header('Location: dashboard.php');
}