<?php
include 'config.php';

$admin = "admin";
$pelangganID = $_POST['pelanggan_id'];

$query = "UPDATE pelanggan SET role = '$admin' WHERE pelanggan_id = '$pelangganID'";
$result = $conn->query($query);

if (isset($_POST["ubah"])) {
    $result;
    header('Location: list_user.php');
} else {
    
}
