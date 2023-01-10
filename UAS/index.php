<?php

@include 'db.php';


if (isset($_POST['login'])) {
    // $user = mysqli_real_escape_string($conn, $_POST['admin_name']);
    // $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $pass = $_POST['password'];
    // $tlp = $_POST['admin_telepon'];
    // $addres = $_POST['admin_addres'];
    // $user_type = $_POST['user_type'];

    $select = "SELECT * FROM tabel_admin WHERE admin_email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {

       $row = mysqli_fetch_assoc($result);
       if($row['user_type'] == 'admin'){
           $_SESSION['adminname'] = $row['admin_name'];
           header("location:halaman.php");

       }else if($row['user_type'] == 'user'){
              $_SESSION['username'] = $row['admin_name'];
              header("location:pembeli.php");
        }
    }else {
        $error[] = "Username atau Password salah";
    }
};
    
?>

<!DOCTYPE html>
<html lang="en">

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

        <h2>Login Now </h2>
        <form action=" " method="POST">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>

            <font size=1>
                <div class="box-login">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="admin_email" placeholder="Masukkan email" required>
                </div>


                <div class="box-login">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="password" required>
                </div>

                <button type="submit" name="login" class="btn-login">Login Now</button>
                <div class="bottom">
                    <p>Don't have an account? <a href="register.php">Register<p></a>

                </div>
    </div>
    </font>
    </form>





</body>

</html>