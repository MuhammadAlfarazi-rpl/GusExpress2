<?php

$default = false;
$no_sidemenu = true;
include '.includes/profil.php';

$pelangganID = $_SESSION['pelanggan_id'];
$query = "SELECT * FROM pelanggan WHERE pelanggan_id= $pelangganID";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $pelanggan = $result->fetch_assoc();
} else {
  exit();
}
?>

<div class="card mt-4">
    <div class="card-body pt-4">
          <form method="POST" action="edit_pelanggan.php">
            <div class="row g-6">
              <div class="col-md-6 form-control-validation fv-plugins-icon-container">
                <label class="form-label">Username</label>
                <input class="form-control" type="text" autofocus="" value="<?php echo $pelanggan['username']?>" name="username">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
              <div class="col-md-6 form-control-validation fv-plugins-icon-container">
                <label class="form-label">Nama Asli</label>
                <input class="form-control" type="text" value="<?php echo $pelanggan['nama']?>" name="nama">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
              <div class="col-md-6 mb-4">
                <label class="form-label">Alamat</label>
                <input class="form-control" type="text" name="alamat" value="<?php 
                if ($pelanggan['alamat'] == TRUE) {
                  echo $pelanggan['alamat'];
                } else {
                  echo "Silahkan isi alamatnya terlebih dahulu :D";
                } ?>">
              </div>
              
            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-3" name="ganti">Simpan</button>
            </div>
          <input type="hidden"></form>
        </div>
    </div>
</div>