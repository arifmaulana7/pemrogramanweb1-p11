<?php
if (isset($_POST['submit'])) {
  include("koneksi/connect.php");

  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $gambar = $_FILES['file_gambar']['name'];

  $target_dir = "gambar/";
  $target_file = $target_dir . basename($_FILES["file_gambar"]["name"]);
  move_uploaded_file($_FILES["file_gambar"]["tmp_name"], $target_file);

  $sql_insert = "INSERT INTO tb_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
                   VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";
  mysqli_query($conn, $sql_insert);
  header("Location: index.php");
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="barangName" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="barangName" name="nama" placeholder="Nama barang">
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori barang">
          </div>
          <div class="mb-3">
            <label for="hargaJual" class="form-label">Harga Jual</label>
            <input type="text" class="form-control" id="hargaJual" name="harga_jual" placeholder="Harga Jual">
          </div>
          <div class="mb-3">
            <label for="hargaBeli" class="form-label">Harga Beli</label>
            <input type="text" class="form-control" id="hargaBeli" name="harga_beli" placeholder="Harga Beli">
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Jumlah Stok">
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" class="form-control" id="gambar" name="file_gambar">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>