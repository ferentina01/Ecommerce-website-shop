<?php

use function PHPSTORM_META\type;


include 'db.php';


$produk = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE produk_id = '" . $_GET['idp'] . "'");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>("produk tidak ditemukan");window.location="produk.php"</script>';
}
$p = mysqli_fetch_object($produk);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>profil</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="style.css" />
    <script type="module" src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
</head>

<body>

    <div class="container">
        <div class="navigation">
            <div class="menu-toggle"></div>
            <ul class="list">
                <li class="list-item active" style="--color:#f44336"><a href="halaman.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Dashboard</span>
                    </a></li>

                <li class="list-item" style="--color:#ffa117"><a href="profil.php">
                        <span class="icon">
                            <ion-icon name="alert-outline"></ion-icon>
                        </span>
                        <span class="text">My Profil</span>
                    </a></li>



                <li class="list-item" style="--color:#2196f3"><a href="produk.php">
                        <span class="icon">
                            <ion-icon name="folder-open"></ion-icon>
                        </span>
                        <span class="text">Data Produk</span>
                    </a></li>

                <li class="list-item" style="--color:#0fc70f"><a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="text">Keluar</span>
                    </a></li>

            </ul>
        </div>
    </div>
    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.navigation');
        menuToggle.onclick = () => {
            navigation.classList.toggle('open');
        }

        const listItems = document.querySelectorAll('.list-item');
        listItems.forEach(item => {
            item.onclick = () => {
                listItems.forEach(item => item.classList.remove('active'));
                item.classList.add('active');
            }
        })
    </script>

    <header>
        <h3>Edit Data Produk</h3>
    </header>
    <!-- content -->
    <div class="section">
        <div class="box">
            <h4>Edit Produk</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Kategori</td>
                        <td><select name="kategori" class="input-control" required>
                                <option value="">-----Pilih Kategori-----</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY kategori_id DESC");
                                while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $k['kategori_id']?>"<?php echo ($k['kategori_id'] == $p->kategori_id)? 'selected':'';?>><?php echo $k['kategori_nama']; ?></option>
                                <?php } ?>
                            </select></td>


                    </tr>

                    <tr>
                        <td>Nama Produk</td>
                        <td><input type="text" name="nama" placeholder="Masukkan Nama Produk" value="<?php echo $p->produk_nama ?> " class="input-control" required></td>

                    </tr>

                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="harga" placeholder="Masukkan Harga Produk" value="<?php echo $p->produk_harga ?> " class="input-control" required></td>
                    </tr>

                    <tr>
                        <td>Deskripsi</td>
                        <td><textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->produk_descripsi ?></textarea></td>

                    </tr>
                    <script>
                        CKEDITOR.replace('deskripsi');
                    </script>

                    <tr>
                        <td>Gambar</td>
                        <td><img src="foto/<?php echo $p->produk_image ?>" width="100px" height="100px"><input type="hidden" name="foto" value="<?php echo $p->produk_image ?>"><input type="file" name="gambar" class="input-control"></td>

                    </tr>







                    <tr>
                        <td>Status</td>
                        <td><select class="input-control" name="status">
                                <option value="">----Pilih Status-----</option>
                                <option value="1" <?php echo ($p->produk_status == 1) ? 'selected' : ''; ?>>Aktif</option>
                                <option value="0" <?php echo ($p->produk_status == 2) ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select></td>
                    </tr>



                    <tr>
                        <td></td>
                        <td></td>
                        
                        <td>
                            <input type="submit" name="submit" value="Edit Produk" class="btn-submit">
                        </td>

                    </tr>
                </table>
            </form>
            <?php
            if (isset($_POST['submit'])) {

                // print_r($_FILES['gambar']);

                $kategori = $_POST['kategori'];
                $nama = $_POST['nama'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                $foto = $_POST['foto'];

                //tampung input form
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];


                if ($$filename != ' ') {
                    $type = explode('.', $filename);
                    $type1 = $type[1];

                    $path = 'foto' . time() . '.' . $type1;

                    $tipe_valid = array('jpg', 'jpeg', 'png');

                    if (!in_array($type1, $tipe_valid)) {
                        echo '<script>alert("Tipe File Tidak Valid")</script>';
                    } else {
                        //jika admin tidak ganti gambar
                        unlink('foto/' . $foto);
                        move_uploaded_file($tmp_name, './foto/' . $path);
                        $namagambar = $path;
                    }
                } else {
                    $namagambar = $foto;
                }



                //update data ke database
                $updute = mysqli_query($conn, "UPDATE tabel_produk SET kategori_id='$kategori', produk_nama='$nama', produk_harga='$harga', produk_descripsi='$deskripsi', produk_image='$namagambar', produk_status='$status' WHERE produk_id='" . $p->produk_id . "'  ");

                if ($updute) {
                    echo "<script>alert('Data Berhasil Diubah');</script>";
                    echo "<script>location='produk.php?page=produk';</script>";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ?>

          


        </div>




    </div>
</body>

</html>