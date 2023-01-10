
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
        <h3>PRODUK</h3>
    </header>
    <!-- content -->


    <div class="section">
        <div class="box">
            <h4>Data Produk</h4>
            <form action="" method="POST">
                <table  border="1" cellspacing="2">
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>tanggal updute</th>
                        <th>Aksi</th>



                    </tr>

                    <tbody>
                        <?php

                        include 'db.php';

                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tabel_produk LEFT JOIN tabel_kategori using(kategori_id) ORDER BY produk_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['kategori_nama']; ?></td>
                                    <td><?php echo $row['produk_nama']; ?></td>
                                    <td>Rp. <?php echo number_format($row['produk_harga']); ?></td>
                                    <td><a href="foto/<?php echo $row['produk_image']; ?>" target="blank">
                                    <img src="foto/<?php echo $row['produk_image']; ?>" width="50px"></a></td>
                                    <td><?php echo ($row['produk_status'] == 0) ? 'Tidak aktif' : 'Aktif'; ?></td>
                                    <td><?php echo $row['tanggal_buat']; ?> </td>
                                    <td>
                                        <a href="edit_produk.php?idp=<?php echo $row['produk_id'] ?> "> Edit</a> || <a href="hapus_produk.php?idp=<?php echo $row['produk_id'] ?> " onclick="return confirm('Apakah anda yakin ingin hapus?')">Hapus</a>
                                    </td>
                                </tr>

                            <?php }
                         }else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php } ?>

                    </tbody>


                </table>
                <div class="but" align="right">
                    <a href="tambah_produk.php">Tambah produk</a>
                </div>
                <!-- <tr>
                    <td colspan="3" align="right">
                        <a href="tambah_kategori.php">Tambah Kategori</a>
                    </td> -->

            </form>




        </div>
</body>

</html>