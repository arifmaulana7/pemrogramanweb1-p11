<?php
include("koneksi/connect.php");
?>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="update.php">
          <input type="hidden" id="editId" name="id">

          <div class="mb-3">
            <label for="editNama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="editNama" name="nama">
          </div>
          <div class="mb-3">
            <label for="editKategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="editKategori" name="kategori">
          </div>
          <div class="mb-3">
            <label for="editHargaJual" class="form-label">Harga Jual</label>
            <input type="text" class="form-control" id="editHargaJual" name="harga_jual">
          </div>
          <div class="mb-3">
            <label for="editHargaBeli" class="form-label">Harga Beli</label>
            <input type="text" class="form-control" id="editHargaBeli" name="harga_beli">
          </div>
          <div class="mb-3">
            <label for="editStok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="editStok" name="stok">
          </div>
          <div class="mb-3">
            <label for="editGambar" class="form-label">Gambar Barang</label>
            <input type="file" class="form-control" id="editGambar" name="file_gambar">
            <img id="editGambarPreview" src="" alt="Preview" class="img-thumbnail mt-2" width="150">
          </div>
          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $gambar = $_FILES['file_gambar']['name'];

  if ($gambar) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($gambar);
    move_uploaded_file($_FILES['file_gambar']['tmp_name'], $target_file);
  } else {
    $gambar = $_POST['existing_gambar'];
  }

  $sql_update = "UPDATE tb_barang SET nama='$nama', kategori='$kategori', harga_jual='$harga_jual', 
                   harga_beli='$harga_beli', stok='$stok', gambar='$gambar' WHERE id=$id";
  mysqli_query($conn, $sql_update);

  header("Location: index.php");
}
?>