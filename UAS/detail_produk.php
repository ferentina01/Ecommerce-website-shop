<?php

error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telepon, admin_email, admin_addres FROM tabel_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tabel_produk   WHERE produk_id = '$_GET[id]'");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
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
                <li class="list-item active" style="--color:#f44336"><a href="pembeli.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Dashboard</span>
                    </a></li>

                <li class="list-item active" style="--color:#f44336"><a href="produk_pembeli.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Produk</span>
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
        <form action="produk_pembeli.php">
            <input type="text" name="search" value="<?php echo $_GET['search'] ?>" placeholder="Cari produk">
            <input type="submit" name="cari" value="Cari">


        </form>

    </div>

    <!-- detail produk -->
    <div class="secti">
        <div class="cont">
            <form action="produk_pembeli.php">
                <h4>Detail Produk</h4>
                <div class="boxx">

                    <div class="col-2">
                        <img src="foto/<?php echo $p->produk_image ?>" width="100%">
                    </div>

                    <div class="col-2" align="left">
                        <h4><?php echo $p->produk_nama ?></h4>
                        <h5>Rp. <?php echo  number_format($p->produk_harga) ?></h5>
                        <p>Deskripsi : <br> <?php echo $p->produk_descripsi ?></p><br><br><br>


                    </div>
                    <p>
                        <center><img src="foto/wa.webp" width="40px"></center><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telepon ?>&text= Hai saya tertarik dengan produk anda." target="_blank">Hubungi via Whatsapp</a>
                    </p>






                    <!-- footer -->
                    <div class="footer">


                        <small>Copyright &copy; 2022- toko online by feren</small>
                    </div>
                </div>



        </div>

    </div>









</body>


</html>