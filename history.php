<?php

include '.includes/header.php';

?>

<?php if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') { 
    ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3><strong>Semua History</strong></h3>
            </div>
            <div class="card-body">
                <?php

                $query = "SELECT 
                        pengiriman.*, 
                        pelanggan.nama as user_name, 
                        paket.nama_paket, 
                        paket.tujuan, 
                        paket.berat, 
                        paket.satuan_id, 
                        paket.detail,
                        satuan.satuan_nama
                        FROM pengiriman
                        INNER JOIN pelanggan ON pengiriman.pelanggan_id = pelanggan.pelanggan_id
                        LEFT JOIN paket ON pengiriman.paket_id = paket.paket_id
                        LEFT JOIN satuan ON paket.satuan_id = satuan.satuan_id
                        WHERE pengiriman.status = 'selesai' AND pengiriman.pelanggan_id='$user_id'";

                $exec = mysqli_query($conn, $query);

                if (mysqli_num_rows($exec) > 0) {
                    while ($pengiriman = mysqli_fetch_assoc($exec)) {
                        $pengiriman_id = $pengiriman["pengiriman_id"];
                        echo '
                        <div class="card border border-2 rounded-3 mb-3">
                        <div class="accordion-item border-0 mb-0 shadow-none active" id="fl-'.$pengiriman_id.'">
                          <div class="accordion-header" id="fleetHeader'.$pengiriman_id.'">
                            <div role="button" class="accordion-button shadow-none align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#fleet'.$pengiriman_id.'" aria-expanded="true" aria-controls="fleet'.$pengiriman_id.'">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-4">
                                            <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40">
                                                <i class="icon-base bx bxs-truck icon-lg"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="d-flex flex-column gap-1">
                                        <span class="text-heading fw-bold fs-7"><strong>'.$pengiriman["nama_paket"].'</strong></span>
                                        <span class="text-body">Tujuan : '.$pengiriman["tujuan"].'</span>
                                    </span>
                                </div>
                            </div>
                          </div>
                          <div id="fleet'.$pengiriman_id.'" class="accordion-collapse collapse" data-bs-parent="#fleet">
                            <div class="accordion-body">
                                <span class="d-flex flex-column gap-1">
                                        <span class="text-body fw-bold fs-4"><strong>Detail :</strong></span>
                                        <span class="text-body"><strong>STATUS PAKET : </strong>'.$pengiriman["status"].'</span>
                                        <span class="text-body"><strong>ID Pelanggan : </strong>'.$pengiriman["pelanggan_id"].'</span>
                                        <span class="text-body"><strong>Nama Pelanggan : </strong>'.$pengiriman["user_name"].'</span>
                                        <span class="text-body"><strong>ID Pengiriman : </strong>'.$pengiriman["pengiriman_id"].'</span>
                                        <span class="text-body"><strong>Asal Paket : </strong></span>
                                        <span class="text-body"><strong>Tanggal Pengiriman : </strong>'.$pengiriman["tanggal_pengiriman"].'</span>
                                        <span class="text-body"><strong>Berat Barang : </strong>'.$pengiriman["berat"]." ". $pengiriman["satuan_nama"].'</span>
                                        <span class="text-body mb-3"><strong>Detail Barang : </strong>'.$pengiriman["detail"].'</span>
                                </span>

                                <form method="POST" action="proses_pengiriman.php">
                                <input type="hidden" name="pengirimanID" value="'.$pengiriman['pengiriman_id'].'">
                                <button name="deleteHistory" type="submit" class="btn btn-outline-danger me-2">Hapus History</button>
                                </form>
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
</div>

<?php } else { ?>

<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3><strong>Semua Paket</strong></h3>
    </div>
    <div class="card-body">
        <?php

        $query = "SELECT 
                pengiriman.*, 
                pelanggan.nama as user_name, 
                paket.nama_paket, 
                paket.tujuan, 
                paket.berat, 
                paket.satuan_id, 
                paket.detail,
                satuan.satuan_nama
                FROM pengiriman
                INNER JOIN pelanggan ON pengiriman.pelanggan_id = pelanggan.pelanggan_id
                LEFT JOIN paket ON pengiriman.paket_id = paket.paket_id
                LEFT JOIN satuan ON paket.satuan_id = satuan.satuan_id
                WHERE pengiriman.status = 'selesai'";

        $exec = mysqli_query($conn, $query);

        if (mysqli_num_rows($exec) > 0) {
            while ($pengiriman = mysqli_fetch_assoc($exec)) {
                $pengiriman_id = $pengiriman["pengiriman_id"];
                echo '
                <div class="card border border-2 rounded-3 mb-3">
                <div class="accordion-item border-0 mb-0 shadow-none active" id="fl-'.$pengiriman_id.'">
                  <div class="accordion-header" id="fleetHeader'.$pengiriman_id.'">
                    <div role="button" class="accordion-button shadow-none align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#fleet'.$pengiriman_id.'" aria-expanded="true" aria-controls="fleet'.$pengiriman_id.'">
                        <div class="d-flex align-items-center">
                            <div class="avatar-wrapper">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40">
                                        <i class="icon-base bx bxs-truck icon-lg"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="d-flex flex-column gap-1">
                                <span class="text-heading fw-bold fs-7"><strong>'.$pengiriman["nama_paket"].'</strong></span>
                                <span class="text-body">Tujuan : '.$pengiriman["tujuan"].'</span>
                            </span>
                        </div>
                    </div>
                  </div>
                  <div id="fleet'.$pengiriman_id.'" class="accordion-collapse collapse" data-bs-parent="#fleet">
                    <div class="accordion-body">
                        <span class="d-flex flex-column gap-1">
                                <span class="text-body fw-bold fs-4"><strong>Detail :</strong></span>
                                <span class="text-body"><strong>STATUS PAKET : </strong>'.$pengiriman["status"].'</span>
                                <span class="text-body"><strong>ID Pelanggan : </strong>'.$pengiriman["pelanggan_id"].'</span>
                                <span class="text-body"><strong>Nama Pelanggan : </strong>'.$pengiriman["user_name"].'</span>
                                <span class="text-body"><strong>ID Pengiriman : </strong>'.$pengiriman["pengiriman_id"].'</span>
                                <span class="text-body"><strong>Asal Paket : </strong></span>
                                <span class="text-body"><strong>Tanggal Pengiriman : </strong>'.$pengiriman["tanggal_pengiriman"].'</span>
                                <span class="text-body"><strong>Berat Barang : </strong>'.$pengiriman["berat"]." ". $pengiriman["satuan_nama"].'</span>
                                <span class="text-body mb-3"><strong>Detail Barang : </strong>'.$pengiriman["detail"].'</span>
                        </span>

                        <form method="POST" action="proses_pengiriman.php">
                        <input type="hidden" name="pengirimanID" value="'.$pengiriman['pengiriman_id'].'">
                        <button name="delete" type="submit" class="btn btn-outline-danger me-2">Hapus History</button>
                        </form>
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
</div>

<?php }

include '.includes/footer.php';
?>