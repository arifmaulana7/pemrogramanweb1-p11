<?php
include("koneksi/connect.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql_delete = "DELETE FROM tb_barang WHERE id = $id";
  mysqli_query($conn, $sql_delete);

  header("Location: index.php");
}