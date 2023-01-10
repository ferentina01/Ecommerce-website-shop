<?php

include 'db.php';



$edit = mysqli_query($conn, "SELECT * FROM tabel_kategori WHERE kategori_id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($edit) == 0) {
    echo '<script>alert("data tidak ditemukan");window.location="kategori.php" </script>';
}
$d = mysqli_fetch_object($edit);

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
        <h3>Kategori</h3>
    </header>
    <!-- content -->
    <div class="section">
        <div class="box">
            <h4>Edit kategori</h4>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Edit Kategori</td>
                        <td><select name="kategori_nama" class="input-control" required>
                                <option value="">----Pilih Kategori-----</option>
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
                                <option value="lainnya">lainnya</option>
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
                $kategori_nama = ($_POST['kategori_nama']);
                $updute = mysqli_query($conn, "UPDATE tabel_kategori SET kategori_nama = '$kategori_nama' WHERE kategori_id = '" . $_GET['id'] . "'");
                if ($updute) {
                    echo '<script>alert("Edit kategori berhasil ditambahkan")</script>';
                    echo '<script>window.location="kategori.php"</script>';
                } else {
                    echo '<script>("Edit Kategori ditambahkan");window.location="tambah_kategori.php" </script>';
                }
            }
            ?>

        </div>




    </div>
</body>

</html>