<?php

include 'db.php';



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
        <h3>Data Produk</h3>
    </header>
    <!-- content -->
    <div class="section">
        <div class="box">
            <h4>Tambah Produk</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Kategori</td>
                        <!-- <td><input type="text" name="nama" placeholder="Masukkan Nama Produk" class="input-control" required></td> -->
                        <td><select name="kategori" class="input-control" required>
                            <option value="">-----Pilih Kategori-----</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY kategori_id DESC");
                            while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                <option value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                            <?php } ?>
                                <!-- <option value="">----Pilih Kategori-----</option>
                                <option value="Pakaian_wanita">Pakaian Wanita</option>
                                <option value="Pakaian_pria">Pakaian Pria</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="aksesoris">Aksesoris</option>
                                <option value="Perawatan">Perawatan dan kecantikan</option>
                                <option value="Olahraga">Olahraga</option>
                                <option value="sepatu">Sepatu</option>
                                <option value="tas">Tas</option>
                                <option value="perlengkapan_rumah">perlengkapan rumah</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Sayuran">Sayuran</option>
                                <option value="Minuman">Minuman</option>
                                <option value="lainnya">lainnya</option> -->
                            </select></td>
                    </tr>

                    <tr>
                        <td>Nama Produk</td>
                        <td><input type="text" name="nama" placeholder="Masukkan Nama Produk" class="input-control" required></td>

                    </tr>

                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="harga" placeholder="Masukkan Harga Produk" class="input-control" required></td>
                    </tr>

                    <tr>
                        <td>Deskripsi</td>
                        <td><textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea></td>

                    </tr>
                    <script>
                        CKEDITOR.replace('deskripsi');
                    </script>

                    <tr>
                        <td>Gambar</td>
                        <td><input type="file" name="gambar" class="input-control" required></td>
                    </tr>



                    <tr>
                        <td>Status</td>
                        <td><select class="input-control" name="status">
                                <option value="">----Pilih Status-----</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select></td>
                    </tr>



                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Tambah" class="btn-submit">
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

                //tampung input form
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $type = explode('.', $filename);
                $type1 = $type[1];

                $path = 'foto' . time() . '.' . $type1;

                $tipe_valid = array('jpg', 'jpeg', 'png', 'webp');
                if (!in_array($type1, $tipe_valid)) {
                    echo "
                    <script>
                        alert('Tipe Gambar Tidak Valid');
                        document.location.href = 'tambah_produk.php';
                    </script>
                    ";
                } else {
                    move_uploaded_file($tmp_name, './foto/' . $filename);
                }

                $insert = mysqli_query($conn, "INSERT INTO tabel_produk VALUES(null,'" . $kategori . "','" . $nama . "','" . $harga . "','" . $deskripsi . "','" . $filename . "','" . $status . "', null)");
                if ($insert) {
                    echo "
                    <script>
                        alert('Data Berhasil Ditambahkan');
                        document.location.href = 'produk.php';
                        
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Data Gagal Ditambahkan');
                        document.location.href = 'produk.php';
                        mysqli_error($conn);
                    ";
                }
            }

            ?>



        </div>




    </div>
</body>

</html>