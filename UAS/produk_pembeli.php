<?php

error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telepon, admin_email, admin_addres FROM tabel_admin WHERE admin_name = '$admin_name'");
$a = mysqli_fetch_object($kontak);
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
            <input type="text" name="search" value="<?php echo $_GET['search']?>" placeholder="Cari produk">
            <input type="submit" name="cari" value="Cari">


        </form>

    </div>



    <!-- produk -->
    <div class="sect">
        <div class="cont">
            <h4>Produk</h4>
            <div class="boxx">
                <?php
                //cari produk
                if ($_GET['search'] != '' || $_GET['id']!= '') {
                    $where = "AND produk_nama LIKE '%" . $_GET['search'] . "%' AND kategori_id LIKE '%" . $_GET['id'] . "%'";
                }
                $produk = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE produk_status = 1 $where  ORDER BY produk_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($row = mysqli_fetch_array($produk)) {
                ?>
                <a href="detail_produk.php?id=<?php echo $row['produk_id'] ?>">
                        <div class="col-4">
                            <img src="foto/<?php echo $row['produk_image']; ?>"><a href="detail_produk.php?id=<?php echo $row['kategori_id']; ?>">
                                <p class="nama"><?php echo $row['produk_nama']; ?>
                                </p>
                                <p class="harga ">Rp.<?php echo number_format($row['produk_harga'])  ?></p>
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
        

            <small>Copyright &copy; 2022- toko online by feren</small>
        </div>
    </div>

</body>


</html>