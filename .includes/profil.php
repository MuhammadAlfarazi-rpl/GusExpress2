<?php 

$no_sidemenu = true;
include 'header.php';


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
                            <span class="fw-medium">Alamat: </span>
                    </li>
              </div>
              <a href="settings.php" class="btn btn-primary mb-1"> <i class="icon-base bx bx-pencil icon-sm me-2"></i>Edit </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="nav-align-top">
        <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-user.html"><i class="icon-base bx bx-user me-1_5 icon-sm"></i> Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="icon-base bx bx-group me-1_5 icon-sm"></i> Teams</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-projects.html"><i class="icon-base bx bx-grid-alt me-1_5 icon-sm"></i> Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-connections.html"><i class="icon-base bx bx-link-alt me-1_5 icon-sm"></i> Connections</a>
          </li>
        </ul>
      </div>
    </div>
  </div>