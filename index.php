<?php
    require 'functions.php';
    // Session
    session_start();

    if(isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password' ");
        
        $cek = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            // Cek apakah password benar
            $row = mysqli_fetch_assoc($result);
            
            // Cek jika user login sebagai admin
            if($row['hak'] == "admin" ) {
                $_SESSION['username'] = $username;
                $_SESSION['hak'] = "admin";
                $_SESSION['login'] = true;
                
                header("location:admin/");
                
            } else if($row['hak'] == "user") {
                $_SESSION['username'] = $username;
                $_SESSION['hak'] = "user";
                $_SESSION['login'] = true;
                
                header("location:user/");
            }
            $error = true;
        }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
        <?php if(isset($error)) : ?>
            <script>alert('Username atau password salah');</script>
            <?php endif;?>
    <img class="wave" src="img/wave.png" />
    <div class="container">
        <div class="img">
            <img src="img/bg.svg" />
        </div>
        <div class="login-content">
            <form action="" method="post">
                <img src="img/avatar.svg" />
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" />
                    </div>
                </div>

                <input type="submit" class="btn" name="submit" />
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>