<?php 
$no_sidemenu = true;
include 'header.php';

$pelangganID = $_SESSION['pelanggan_id'];
$query = "SELECT * FROM pelanggan WHERE pelanggan_id= $pelangganID";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $pelanggan = $result->fetch_assoc();
} else {
  exit();
}

?>

<!-- Card User Profile -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-body d-flex flex-column flex-lg-row text-sm-start text-center mb-8">

          <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
            <img src="assets\img\avatars\1.png" alt="user image" class="d-block h-auto ms-0 w-75 ms-sm-2 rounded-3 user-profile-img">
          </div>
            
          <div class="flex-grow-1 mt-6 mt-lg-5">
            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start flex-md-row flex-column gap-4">
              <div class="user-profile-info">
                <h4 class="mb-2 mt-lg-7"><?php echo $username?></h4>
                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                    <li class="list-inline-item d-flex align-items-center">
                        <i class="icon-base bx bx-tag-alt me-2"></i>
                            <span class="fw-medium">Nama Asli: <?php echo $nama?></span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center">
                        <i class="icon-base bx bx-hash me-2"></i>
                            <span class="fw-medium">User ID: <?php echo $user_id?></span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center">
                        <i class="icon-base bx bx-map-pin me-2"></i>
                            <span class="fw-medium">Alamat:  <?php echo $pelanggan['alamat']?></span>
                    </li>
              </div>
              <a href="settings.php" class="btn btn-primary mb-1"> <i class="icon-base bx bx-pencil icon-sm me-2"></i>Edit </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mb-4"></div>

  <!-- Navbar PIll -->
  <div class="row">
    <div class="col-md-12">
      <div class="nav-align-top">
        <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
          <?php if (!isset($default) || !$default): ?>
            <li class="nav-item">
              <a class="nav-link" href="profil_default.php"><i class="icon-base bx bx-package me-1_5 icon-sm"></i> List Paket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="profil_settings.php"><i class="icon-base bx bx-cog me-1_5 icon-sm"></i> Settings</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link active" href="profil_default.php"><i class="icon-base bx bx-package me-1_5 icon-sm"></i> List Paket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profil_settings.php"><i class="icon-base bx bx-cog me-1_5 icon-sm"></i> Settings</a>
            </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>

  