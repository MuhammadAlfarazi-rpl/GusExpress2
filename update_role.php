<?php
include 'config.php';

$admin = "admin";

$query = "UPDATE pelanggan SET role = '$admin'";
$result = $conn->query($query);

if (isset($_POST["ubah"])) {
    $result;
    header('Location: list_user.php');
} else {
    
}
