<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="assets\style.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand text-secondary">WAD Beauty</a>
        <form class="form-inline">
            <a href="login.php" class="text-secondary p-2">Login</a>    
            <a href="#" class="p-2 text-secondary" type="submit">Register</a>
        </form>
    </nav>

    <?php
    if(isset($_POST['btnDaftar'])){
        include('config.php');

        $nama = $_POST['inputNama'];
        $email = $_POST['inputEmail'];
        $phone = $_POST['inputPhone'];
        $password = $_POST['inputPass'];
        $conf_pass = $_POST['inputKon'];

        if ($password == $conf_pass){
            $query = "INSERT INTO user (nama, email, no_hp, password)
                VALUES ('$nama', '$email', '$phone', '$password')";
            $insert = mysqli_query($conn, $query);

            if(!$insert){ ?>
                <div class="alert alert-warning" role="alert">
                    Gagal registrasi!
                </div>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    Berhasil registrasi!
                </div>
            <?php }
        } else { ?>
            <script>
                alert ('Kata sandi tidak sama!');
            </script>
        <?php }            
    }   ?>

    <!-- konten -->  
    <div class="mt-4 d-flex justify-content-center">    
        <div class="card shadow border-0" style="width: 25rem;">            
            <div class="card-body px-5">            
                <h5 class="card-title text-center">Registrasi</h5>        
                <hr>
                <form method="post" action="register.php">
                    <div class="form-group">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="inputNama" required>                    
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">No. Handphone</label>
                        <input type="text" class="form-control" id="inputPhone" name="inputPhone" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPass">Kata Sandi</label>
                        <input type="password" class="form-control" id="inputPass" name="inputPass" required>
                    </div>
                    <div class="form-group">
                        <label for="inputKon">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="inputKon" name="inputKon" required>                        
                    </div>                
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="btnDaftar">Daftar</button>
                    </div>
                    <p class="text-center p-2"> Sudah punya akun? <a href="login.php">Login</a> </p>
                </form>            
            </div>
        </div>
    </div>            
</body>
</html>

