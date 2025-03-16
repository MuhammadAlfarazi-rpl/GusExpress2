<?php

include '.includes/header.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_pengiriman.php" enctype="multipart/form-data">
                        <!-- Nama Pengirim -->
                         <div class="mb-3">
                            <label for="post_title" class="form-label">Nama Pengirim</label>
                            <div>
                            <?php
                            
                            if (isset($_SESSION['nama'])) {
                                echo  $_SESSION['nama'];
                            } else {
                                echo "Not logged in.";
                            }

                            ?>
                            </div>
                         </div>

                         <!-- Paket -->
                         <label class="form-label">Pilih Paket</label>
                         <select class="form-select" name="paket">
                         <?php
                                require 'config.php'; 
                                $query = "SELECT * FROM paket";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                      echo "<option value='" . $row["paket_id"] . "'>" . $row["nama_paket"] . "</option>";
                                    }
                                }
                        ?>
                        </select>

                        <!-- Deskripsi -->
                         <div class="mb-3">
                            <label for="content" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"required></textarea>
                         </div>
                         <!-- Submit -->
                          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
        </div>
    </div>
    </div>
</div>
</div>

<?php
include '.includes/footer.php';
?>