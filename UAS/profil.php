<?php

use LDAP\Result;

include 'db.php';
$query = mysqli_query($conn, "SELECT * FROM tabel_admin WHERE admin_id = 1");
$d = mysqli_fetch_object($query);


 



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
        <h3>Profil</h3>
    </header>
    <!-- content -->
    <div class="section">
        <div class="box">
            <h4>Ubah Data Profil</h4>
            <form action="" method="POST">
                <table>
                    
                    <tr>
                        <td>Nama</td>
                        <td><input type="text"  placeholder= "Nama"name="nama" required></td>
                    </tr>

                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="user" placeholder="Username" class="input-control" required></td>

                    <tr>
                        <td>No. HP</td>
                        <td><input type="text" name="hp" placeholder="No. HP" class="input-control" required></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Email" class="input-control" required></td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="alamat" placeholder="Alamat" class="input-control" required></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="ubah data" class="btn-submit">
                        </td>

                    </tr>
                </table>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $nama = ucwords($_POST['nama']);
                $user = $_POST['user'];
                $hp = $_POST['hp'];
                $email = $_POST['email'];
                $alamat = ucwords($_POST['alamat']);
                $query = mysqli_query($conn, "UPDATE tabel_admin SET admin_name = '$nama', username = '$user', admin_telepon = '$hp', admin_email = '$email', admin_addres = '$alamat' WHERE admin_id = '" . $_SESSION['id'] . "'");
                if ($query) {
                    echo "<script>alert('Data Berhasil Diubah');</script>";
                    echo "<script>location='profil.php';</script>";
                } else {
                    echo "<script>alert('Data Gagal Diubah');</script>";
                    echo "<script>location='profil.php';</script>";
                }
            }
            ?>

        </div>

        <div class="box">
            <h3>Ubah Password</h3>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="pass1" placeholder="Password Baru" class="input-control" required></td>
                    </tr>

                    <tr>
                        <td>Konfirmasi password</td>
                        <td><input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-control" required></td>



                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="pw" value="ubah password" class="btn-submit">
                        </td>

                    </tr>
                </table>
            </form>

            <?php
            if (isset($_POST['pw'])) {
                $pass1 = ($_POST['pass1']);
                $pass2 = $_POST['pass2'];

                if ($pass1 != $pass2) {
                    echo "<script>alert('Konfirmasi Password Tidak Sama');</script>";
                    echo "<script>location='profil.php';</script>";
                } else {
                    $pass = mysqli_query($conn, "UPDATE tabel_admin SET password = '$pass1' WHERE admin_id = '" . $_SESSION['id'] . "'");
                    if ($pass) {
                        echo "<script>alert('Data Berhasil Diubah');</script>";
                        echo "<script>location='profil.php';</script>";
                    } else {
                        echo "<script>alert('Data Gagal Diubah');</script>";
                        echo "<script>location='profil.php';</script>";
                    }
                }
            }
            ?>

        </div>


    </div>
</body>

</html>