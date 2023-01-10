<?php

 include 'db.php';
if (isset($_POST['login'])) { 
    $user = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $pass = $_POST['password'];
    $tlp = $_POST['admin_telepon'];
    $addres = $_POST['admin_addres'];
    $user_type = $_POST['user_type'];

   $select = "SELECT * FROM tabel_admin WHERE admin_email='" . $email . "' AND password= '" . $pass . "'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = "user sudah terdaftar silahkan login";
        echo '<script>window.location="index.php" ;</script>';
    } else {
        $insert = "INSERT INTO tabel_admin (admin_name, username, password, admin_telepon, admin_email, admin_addres, user_type) VALUES ('$user', '$username', '$pass', '$tlp', '$email', '$addres', '$user_type')";
        mysqli_query($conn, $insert);
        if ($insert) {
            echo 'Data berhasil di daftarkan silahkan login kembali';
            echo '<script>window.location="index.php" ;</script>';
        } else {
            echo 'Data gagal di daftarkan';
            echo 'mysqli_error($conn)';
           
        }
    }
};




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="stylelogin.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script type="module" src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>


    <div class="login">

        <div class="avatar">
            <i class="fa fa-user"></i>
        </div>

        <h2>Register Now </h2>
        <form action="" method="POST">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };

            ?>
            <font size=1>
                <div class="box-login">
                    <i class="fas fa-user"></i>

                    <input type="text" name="admin_name" placeholder="Nama Lengkap" required>
                </div>

                <div class="box-login">
                    <i class="fas fa-envelope-open-text"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="box-login">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="password" required>
                </div>

                <div class="box-login">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="admin_telepon" placeholder="No Handphone:+62" required>
                </div>

                <div class="box-login">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="admin_email" placeholder="Masukkan email" required>
                </div>

                <div class="box-login">
                    <i class="fas fa-map-pin"></i>
                    <input type="text" name="admin_addres" placeholder="Masukkan alamat " required>
                </div>

                <div class="box-login">
                    <i class="fas fa-users"></i>
                    <select width="100%" name="user_type" required>
                        <option value="user">Pilih Level</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>

                </div>


                <button type="submit" name="login" class="btn-login">Register Now</button>
                <div class="bottom">
                    <p>Already have an account? <a href="index.php">Login Now<p></a>

                </div>
    </div>
    </font>
    </form>


</body>

</html>