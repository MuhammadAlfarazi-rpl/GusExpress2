<?php

include '.includes/header.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
                        <!-- Nama Barang / Paket -->
                         <div class="mb-3">
                            <label for="post_title" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" required>
                         </div>

                         <!-- Berat Barang -->
                         <label class="form-label">Berat Barang</label>
                         <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                        <button
                          class="btn btn-outline-primary dropdown-toggle"
                          type="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                          id="satuanButton"
                        >
                          Pilih Satuan
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">

                        <?php

                            require 'config.php'; 
                            $query = "SELECT * FROM satuan";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<li><a class='dropdown-item' href='#' onclick='setSatuan(\"" . $row["satuan_nama"] . "\")'>" . $row["satuan_nama"] . "</a></li>";
                                }
                            }
                        ?>
                        </ul>
                      </div>

                        <!-- Tujuan-->
                        <div class="mb-3">
                            <label for="post_title" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" required>
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
                        />
                      </div>
                         </div>


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