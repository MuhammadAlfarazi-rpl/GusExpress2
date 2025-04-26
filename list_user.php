<?php

include 'config.php';
include '.includes/header.php'; 

?>

<?php
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') { ?>

<?php } else {  ?>    
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><strong>All User</strong></h3>
            </div>
            <div class="card-body">
                <?php

                $query = "SELECT * FROM pelanggan";

                $exec = mysqli_query($conn, $query);

                if (mysqli_num_rows($exec) > 0) {
                    while ($pelanggan = mysqli_fetch_assoc($exec)) {
                        $pelanggan_id = $pelanggan ["username"];
                        echo '
                        <div class="card border border-2 rounded-3 mb-3">
                        <div class="card border-0 mb-0 shadow-none active" id="fl-'.$pelanggan_id.'">
                          <div class="card-header" id="fleetHeader'.$pelanggan_id.'">
                            
                                <div class="d-flex align-items-center w-100">
                                    <div class="avatar-wrapper d-flex align-items-center">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40">
                                                <i class="icon-base bx bx-user icon-lg"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column ms-2">
                                        <span class="text-heading fw-bold fs-7"><strong>'.$pelanggan["username"].'</strong></span>
                                        <span class="text-body">Nama Asli : '.$pelanggan["nama"].'</span>
                                    </div>

                                    <div class="dropdown ms-auto">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                                        '.$pelanggan["role"].'
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <form action="update_role.php" method="POST" class="dropdown-item p-0">
                                                    <input type="hidden" name="pelanggan_id" value="'.$pelanggan["pelanggan_id"].'?>
                                                    <input type="hidden" name="role" value="admin">
                                                    <button type="submit" class="dropdown-item" name="promote"><i class="bx bx-shield me-1"></i> Ubah jadi Admin</button>
                                                </form>
                                            </li>
                                            
                                            <li>
                                                <form action="update_role.php" method="POST" class="dropdown-item p-0">
                                                    <input type="hidden" name="pelanggan_id" value="'.$pelanggan["pelanggan_id"].'?>
                                                    <input type="hidden" name="role" value="user">
                                                    <button type="submit" class="dropdown-item" name="demote"><i class="bx bx-user me-1"></i> Ubah jadi User</button>
                                                </form>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li>
                                                <form action="update_role.php" method="POST" class="dropdown-item p-0">
                                                    <input type="hidden" name="pelanggan_id" value="'.$pelanggan["pelanggan_id"].'?>
                                                    <input type="hidden" name="role" value="admin">
                                                    <button type="submit" class="dropdown-item text-danger" name="delete"><i class="bx bx-trash me-1"></i> Hapus Akun</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                 </div>

                          </div>
                          </div>
                        </div>';
                    }
                } else {
                    echo '<p class="text-center text-muted">No data found.</p>';
                }

                ?>
            </div>
        </div>
    </div>
</div>

<?php include '.includes/footer.php'; 
}
?>
