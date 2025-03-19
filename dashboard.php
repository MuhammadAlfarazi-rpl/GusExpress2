<?php

include '.includes/header.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Semua Paket</h4>
            </div>
            <div class="card-body">
                <?php

                $query = "SELECT pengiriman.*, pelanggan.nama as user_name, paket.nama_paket 
                          FROM pengiriman
                          INNER JOIN pelanggan ON pengiriman.pelanggan_id = pelanggan.pelanggan_id
                          LEFT JOIN paket ON pengiriman.paket_id = paket.paket_id
                          WHERE pengiriman.pelanggan_id = $user_id";

                $exec = mysqli_query($conn, $query);

                if (mysqli_num_rows($exec) > 0) {
                    while ($pengiriman = mysqli_fetch_assoc($exec)) {
                        echo '
                        <div role="button" class="accordion-button shadow-none align-items-center" data-bs-toggle="collapse" data-bs-target="#fleet'.$pengiriman["pengiriman_id"].'" aria-expanded="true" aria-controls="fleet'.$pengiriman["pengiriman_id"].'">
                            <div class="d-flex align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded-circle bg-label-secondary w-px-40 h-px-40">
                                            <i class="icon-base bx bx-car icon-lg"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="d-flex flex-column gap-1">
                                    <span class="text-heading">'.$pengiriman["user_name"].'</span>
                                    <span class="text-body">'.$pengiriman["nama_paket"].'</span>
                                </span>
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
