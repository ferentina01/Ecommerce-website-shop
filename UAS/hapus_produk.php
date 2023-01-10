<?php

use function PHPSTORM_META\type;


include 'db.php';

  

   //hapus produk
   if (isset($_GET['idp'])) {
    $idp = $_GET['idp'];
    $sql = "DELETE FROM tabel_produk WHERE produk_id = '$idp'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script>("produk berhasil dihapus");window.location="produk.php"</script>';
    } else {
        echo '<script>("produk gagal dihapus");window.location="produk.php"</script>';
    }
  

      //hapus gambar
      $sql = "SELECT * FROM produk_image WHERE tabel_produk = '$idp'";
      $query = mysqli_query($conn, $sql);
      $p = mysqli_fetch_object($query);
      $gambar = $p->produk_gambar;
      $path = "foto/$gambar";
      unlink($path);
      }
?>