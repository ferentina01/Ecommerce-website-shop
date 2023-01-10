<?php
include 'db.php';

$select = "SELECT * FROM tabel_admin";

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
                        <span class="text">profil</span>
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
        <h3>Home</h3>
    </header>
    <!-- content -->
    <div class="section">
        <h4>Selamat Datang Di halaman Admin</h4>

    </div>
</body>

</html>