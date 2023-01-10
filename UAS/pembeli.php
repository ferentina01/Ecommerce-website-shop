<?php
include 'db.php';


$kontak = mysqli_query($conn, "SELECT admin_telepon, admin_email, admin_addres FROM tabel_admin WHERE admin_id= 5");
$a = mysqli_fetch_object($kontak);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="stylelogin.css" />

    <script type="module" src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="menu-toggle"></div>
            <ul class="list">
                <li class="list-item active" style="--color:#f44336"><a href="pembeli.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Dashboard</span>
                    </a></li>


                <li class="list-item" style="--color:#2196f3"><a href="produk_pembeli.php">
                        <span class="icon">
                            <ion-icon name="folder-open"></ion-icon>
                        </span>
                        <span class="text"> Produk</span>
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

    </form>
    <header>
        <h3><a href="pembeli.php">Toko Online</a></h3>
        </form>
    </header>
    <!--search-->
    <div class="search">
        <form action="produk_pembeli.php"><input type="text" name="search" placeholder="Cari produk">
            <input type="submit" name="cari" value="Cari">


        </form>

    </div>

    <!-- kategori -->

    <div class="secti">
        <div class="cont">
            <h4>Kategori</h4>
            <div class="boxx">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY kategori_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {

                ?>
                        <a href="produk_pembeli.php?id=<?php echo $k['kategori_id']; ?>">
                            <div class="col-5">
                                <img src="foto/p.png" width="50px" height="50px">
                                <p><?php echo $k['kategori_nama'] ?></p>
                            </div>
                        </a>
                    <?php
                    }
                } else { ?>
                    <p> "Tidak ada kategori"</p>
                    }
                <?php } ?>
            </div>
        </div>
    </div>



    <!-- <p><a href="pembeli.php?kategori=pakaian wanita">Pakaian Wanita</a> </p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Pakaian Pria</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Elektronik</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Aksesoris</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Perawatan dan kecantikan</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Olahraga </p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Sepatu</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Tas</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Perlengkapan rumah</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Makanan</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Sayuran</p>
                </div>

                <div class="col-5">
                    <img src="foto/p.png" width="50px" height="50px">
                    <p>Minuman</p>
                </div>

            </div>
        </div> -->

    <!-- produk -->
    <div class="sect">
        <div class="cont">
            <h4>Produk Terbaru</h4>
            <div class="boxx">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE produk_status = 1 ORDER BY produk_id DESC LIMIT 12");
                if (mysqli_num_rows($produk) > 0) {
                    while ($row = mysqli_fetch_array($produk)) {
                ?>
                        <a href="detail_produk.php?id=<?php echo $row['produk_id']; ?>">
                            <div class="col-4">
                                <img src="foto/<?php echo $row['produk_image']; ?>"><a href="detail_produk.php?id=<?php echo $row['produk_id']; ?>">
                                    <p class="nama"><?php echo substr($row['produk_nama'], 0, 30)  ?>
                                    </p>
                                    <p class="harga ">Rp.<?php echo number_format($row['produk_harga']);  ?></p>
                            </div>
                        </a>
                <?php
                    }
                } else {
                    echo "Tidak ada produk";
                }

                ?>
            </div>
        </div>

    </div>

    <!-- footer -->
    <div class="footer">
        <div class="cont">
            <hr size=3px width="100%" align="left" color="#000000" />
            <h5>Alamat</h5>
            <p><?php echo $a->admin_addres ?></p>

            <h5>Email</h5>
            <p><?php echo $a->admin_email ?></p>

            <h5>No.Telp</h5>
            <p><?php echo $a->admin_telepon ?></p>

            <small>Copyright &copy; 2022- toko online by feren</small>
        </div>

    </div>
</body>

</html>