<?php
include 'config.php';
include '.includes/header.php';

$paketEdit = $_GET['paket_id'];

$query = "SELECT * FROM paket WHERE paket_id = $paketEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $paket = $result->fetch_assoc();
} else {
    echo "Tidak ada paket..";
    exit();
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_paket.php" enctype="multipart/form-data">
                        <!-- Nama Barang / Paket -->
                         <div class="mb-3">
                            <label for="post_title" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" value="<?php echo $paket['nama_paket']?>">
                         </div>

                         <!-- Berat Barang -->
                         <label class="form-label">Berat Barang</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="berat" value="<?php echo $paket['berat']?>" required />

                        <select class="form-select" name="satuan_id" required>
                        <option value="" selected disabled>Pilih Satuan</option>
                        <?php

                            require 'config.php'; 
                            $querySatuan = "SELECT * FROM satuan";
                            $resultSatuan = $conn->query($querySatuan);
                            if ($resultSatuan->num_rows > 0) {
                                while ($row = $resultSatuan->fetch_assoc()) {
                                    $selected = ($row['satuan_id'] == $paket['satuan_id']) ? "selected" : "";
                                    echo "<option value='" . $row["satuan_id"] . "'$selected>" . $row["satuan_nama"] . "</option>";
                                }
                        }
                        ?>
                        </select>
                        </div>


                        <!-- Tujuan-->
                        <div class="mb-3">
                            <label for="post_title" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" value="<?php echo $paket['tujuan']?>"required>
                         </div>

                        <!-- Nama Biaya -->
                        <div class="mb-3">
                        <label for="post_title" class="form-label">Biaya</label>    
                        <div class="input-group">                   
                        <span class="input-group-text" id="basic-addon11">Rp.</span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="x.xxx.xxx"
                          aria-describedby="basic-addon11"
                          name="biaya"
                          value="<?php echo $paket['biaya']?>"
                        />
                      </div>
                         </div>


                        <!-- Deskripsi -->
                         <div class="mb-3">
                            <label for="content" class="form-label">Detail Barang</label>
                            <textarea class="form-control" name="detail" required><?php echo $paket['detail']?>
                            </textarea>
                         </div>
                         <!-- Submit -->
                          <button type="submit" name="update" class="btn btn-primary">Update</button>
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