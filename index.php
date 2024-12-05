<?php
include("koneksi/connect.php");

$sql = "SELECT * FROM tb_barang";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
  .img-thumbnail {
    max-width: 90px;
    max-height: 90px;
    object-fit: cover;
  }

  .text-center {
    text-align: center;
  }
  </style>
</head>

<body>
  <div class="container mt-4">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah Barang Baru
    </button>

    <?php include("create.php");
    ?>

    <?php include("update.php"); ?>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Gambar</th>
          <th scope="col" class="text-center">Nama Barang</th>
          <th scope="col" class="text-center">Kategori</th>
          <th scope="col" class="text-center">Harga Jual</th>
          <th scope="col" class="text-center">Harga Beli</th>
          <th scope="col" class="text-center">Stok</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
        <?php $counter = 1;
          ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <th scope="row" class="text-center"><?php echo $counter++; ?></th>
          <td class="text-center">
            <img src="gambar/<?php echo $row['gambar']; ?>" class="img-thumbnail" alt="<?php echo $row['nama']; ?>">
          </td>
          <td class="text-center"><?php echo $row['nama']; ?></td>
          <td class="text-center"><?php echo $row['kategori']; ?></td>
          <td class="text-center"><?php echo $row['harga_jual']; ?></td>
          <td class="text-center"><?php echo $row['harga_beli']; ?></td>
          <td class="text-center"><?php echo $row['stok']; ?></td>
          <td class="text-center">
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"
              data-id="<?php echo $row['id']; ?>" data-nama="<?php echo $row['nama']; ?>"
              data-kategori="<?php echo $row['kategori']; ?>" data-harga_jual="<?php echo $row['harga_jual']; ?>"
              data-harga_beli="<?php echo $row['harga_beli']; ?>" data-stok="<?php echo $row['stok']; ?>"
              data-gambar="<?php echo $row['gambar']; ?>">
              <i class="bi bi-pencil"></i> Edit
            </button>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
              onclick="return confirm('Are you sure you want to delete?')">
              <i class="bi bi-trash"></i> Delete
            </a>
          </td>
        </tr>
        <?php endwhile; ?>
        <?php else: ?>
        <tr>
          <td colspan="8" class="text-center">No data available</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

  <script>
  const editButtons = document.querySelectorAll('.btn-warning');
  editButtons.forEach(button => {
    button.addEventListener('click', () => {
      const id = button.getAttribute('data-id');
      const nama = button.getAttribute('data-nama');
      const kategori = button.getAttribute('data-kategori');
      const hargaJual = button.getAttribute('data-harga_jual');
      const hargaBeli = button.getAttribute('data-harga_beli');
      const stok = button.getAttribute('data-stok');
      const gambar = button.getAttribute('data-gambar');

      document.getElementById('editId').value = id;
      document.getElementById('editNama').value = nama;
      document.getElementById('editKategori').value = kategori;
      document.getElementById('editHargaJual').value = hargaJual;
      document.getElementById('editHargaBeli').value = hargaBeli;
      document.getElementById('editStok').value = stok;
      document.getElementById('editGambarPreview').src = 'gambar/' + gambar;
    });
  });
  </script>
</body>

</html>