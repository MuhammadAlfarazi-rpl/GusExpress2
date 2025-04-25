<?php
include 'config.php';
session_start();

if (isset($_POST["promote"])) {
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

if (isset($_POST["demote"])) {
    $user = "user";
    $pelangganID = $_POST['pelanggan_id'];

    $sql = "UPDATE pelanggan SET role = '$user' WHERE pelanggan_id = '$pelangganID'";
    $result = $conn->query($sql);

    if($result) {
        $_SESSION["notification"] = [
            'type' => 'primary',
            'message' => 'Demosi admin berhasil.'
        ];
    
    } else {
        $_SESSION["notification"] = [
            'type' => 'danger',
            'message' => 'Gagal mendemosi admin.'
        ];
    }
    header('Location: list_user.php');
}

if (isset($_POST["delete"])) {
    $pelangganID = $_POST['pelanggan_id'];

    $cekAdmnQuery = "SELECT role FROM pelanggan WHERE pelanggan_id = '$pelangganID'";
    $cekResult = $conn->query($cekAdmnQuery);


    if ($cekResult && $cekResult->num_rows > 0) {
        $cekAdmn = $cekResult->fetch_assoc();
        if ($cekAdmn['role'] == 'admin') {
            $_SESSION["notification"] = [
                'type' => 'danger',
                'message' => 'Tidak bisa menghapus akun admin.'
            ];
            header('Location: list_user.php');
    } else {
        $sql = "DELETE FROM pelanggan WHERE pelanggan_id = '$pelangganID'";
        $result = $conn->query($sql);
        if($result) {
            $_SESSION["notification"] = [
                'type' => 'primary',
                'message' => 'Demosi admin berhasil.'
            ];
        
        } else {
            $_SESSION["notification"] = [
                'type' => 'danger',
                'message' => 'Gagal mendemosi admin.'
            ];
        }
        header('Location: list_user.php');
    }

    }
        
}