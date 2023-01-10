<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Login Page</title>
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

        <h2>Login </h2>
        <form action="" method="POST">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };

            ?>
            <div class="box-login">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="email" placeholder="Masukkan email anda" required>
            </div>

            <div class="box-login">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Masukkan password anda" required>
            </div>

            <button type="submit" name="login" class="btn-login">Login</button>
            <div class="bottom">
                <a href="register.php">Register</a>

            </div>
    </div>
    </form>

    <?php
    if (isset($_POST['login'])) {
        session_start();

        include 'db.php';
        $nama = mysqli_real_escape_string($conn, $_POST['admin_name']);
        $email = mysqli_real_escape_string($conn, $_POST['admin_email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $user_type= $_POST['user_type'];    

        $cek = mysqli_query($conn, "SELECT * FROM tabel_admin WHERE admin_email='" . $email . "' AND password= '" . $pass . "'");


        if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_object($cek);
            if ($cek['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $user;
                header("location:halaman.php");
            } elseif ($cek['user_type'] == 'user') {
                $_SESSION['username'] = $user;
                header("location: pembeli.php");
            }
        } else {
            $error[] = "Username atau Password salah";



            // $_SESSION['status_login'] = true;
            // $_SESSION['a_global'] = $d;
            // $_SESSION['id'] = $d->admin_id;



        }
    };




    ?>

</body>

</html>