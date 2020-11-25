<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets\style.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand text-secondary">WAD Beauty</a>
        <form class="form-inline">
            <a href="#" class="text-secondary p-2">Login</a>    
            <a href="form_register.php" class="p-2 text-secondary" type="submit">Register</a>
        </form>
    </nav>

    <?php        
        if(isset($_POST['btnLogin'])){
            include('config.php');

            $email = $_POST['inputEmail'];
            $pass = $_POST['inputPass'];               

            //cek email apakah sudah terdaftar
            $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
            $data_user = $cek_email->fetch_array();

            //cek password
            $cek_password = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' and password = '$pass'");            

            if (mysqli_num_rows($cek_email) == 0){
                echo "<div class='alert alert-warning' role='alert'>
                        Email belum terdaftar!
                    </div>";
            } elseif (mysqli_num_rows($cek_email) == 1){                
                if($cek_password){                    
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $pass;
                    $_SESSION['id'] = $data_user['id'];
                    $_SESSION['nama'] = $data_user['nama'];
                    //cookie
                    if(isset($_POST['chRemember'])) {                        
                        setcookie ('email', $email, time()+ 0);
                        setcookie ('password', $pass, time()+ 0);                                                
                    }                    
                    header("Location: login.php");
                } else {
                    echo "<div class='alert alert-warning' role='alert'>
                        Email atau kata sandi anda salah!
                    </div>";                                        
                }
            }            
        }
        
    ?>

    <!-- konten -->  
    <div class="mt-4 d-flex justify-content-center">    
        <div class="card shadow border-0" style="width: 25rem;">            
            <div class="card-body px-5">            
                <h5 class="card-title text-center">Login</h5>        
                <hr>
                <form method="post" action="">                    
                    <div class="form-group">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" required
                            value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>"
                        >
                    </div>                    
                    <div class="form-group">
                        <label for="inputPass">Kata Sandi</label>
                        <input type="password" class="form-control" id="inputPass" name="inputPass" required
                            value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>"
                        >
                    </div>                     
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="chRemember" id="chRemember">
                        <label class="form-check-label" for="chRemember">Remember me</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
                    </div>
                    <p class="text-center p-2"> Belum punya akun? <a href="form_register.php">Registrasi</a> </p>
                </form>            
            </div>
        </div>
    </div>   
</body>
</html>