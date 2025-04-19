<?php

$default = false;
$no_sidemenu = true;
include '.includes/profil.php';

?>

<div class="card mt-4">
    <div class="card-body pt-4">
          <form>
            <div class="row g-6">
              <div class="col-md-6 form-control-validation fv-plugins-icon-container">
                <label class="form-label">Username</label>
                <input class="form-control" type="text" autofocus="">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
              <div class="col-md-6 form-control-validation fv-plugins-icon-container">
                <label class="form-label">Nama Asli</label>
                <input class="form-control" type="text">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
              <div class="col-md-6 mb-4">
                <label class="form-label">Alamat</label>
                <input class="form-control" type="text">
              </div>
              
            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-3">Simpan</button>
            </div>
          <input type="hidden"></form>
        </div>
    </div>
</div>