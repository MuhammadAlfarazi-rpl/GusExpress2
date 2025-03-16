<?php
include 'config.php';
session_start();

if(isset($_POST['simpan'])) {

    $nama = $_POST["nama"];
    $paket = $_POST["paket"];
    $desc = $_POST["deskripsi"];

    $query = "INSERT INTO pengiriman (pelanggan_id, paket_id, deskripsi, tanggal_pengiriman) VALUES ('$nama','$paket','$desc',NOW())";
    $exec = mysqli_query($conn, $query);
}
