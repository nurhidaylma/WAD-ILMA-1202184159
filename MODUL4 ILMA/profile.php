<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <title>Profile</title>
    <?php
        $user_email = $_SESSION['email'];
        include('config.php');
        $select = mysqli_query($conn, "SELECT * FROM user WHERE email = '$user_email'");
    ?>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand text-secondary">WAD Beauty</a>
        <form class="form-inline">
            <a href="cart.php" class="pr-2 btn-light">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>            
            </a>
            Selamat Datang,
            <div class="btn-group">
                <a type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['nama']; ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>                
            </div>                        
        </form>
    </nav>
    <?php
        if(isset($_POST['submit'])){           
            $email = $_SESSION['email'];
            $nama = $_POST['nama'];
            $no_hp = $_POST['no_hp'];
            $pass = $_POST['pass'];
            $conf = $_POST['conf'];

            if($pass != $conf){
                echo "<div class='alert alert-warning' role='alert'>
                    Password doesn't match!
                </div>";
            } else {
                $update = mysqli_query($conn, "UPDATE user SET
                            nama = '$nama', no_hp = '$no_hp', password = '$pass'
                            WHERE email = '$email'");
                header("Location: profile.php");
            }
        }
    ?>

    <!-- konten -->
    <h2 class="text-center mt-5">Profile</h2>
    <?php
        if($select->num_rows > 0){
            while($data = mysqli_fetch_array($select)){ ?>

            <div class="row d-flex justify-content-center">
                <div class="col-md-8 pt-3">
                    <form action="" method="POST">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label>                    
                                </div>                                        
                            </div>
                            <div class="col-md-5">                                        
                                <label><?= $data['email'] ?>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-3">
                                <div class="form-group">                        
                                    <label for="nama">Nama</label>                                    
                                </div>                                        
                            </div>
                            <div class="col-md-5">                                        
                                <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>">               
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-3">
                                <div class="form-group">                                                
                                    <label for="no_hp">Nomor Handphone</label>                                                        
                                </div>                                        
                            </div>
                            <div class="col-md-5">                                        
                                <input type="text" name="no_hp" id="no_hp" value="<?= $data['no_hp'] ?>">                                
                            </div>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pass">Password</label>                                                    
                                </div>                                        
                            </div>
                            <div class="col-md-5">                                        
                                <input type="password" name="pass" id="pass">            
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="conf">Password Confirm</label>                                                           
                                </div>                                        
                            </div>
                            <div class="col-md-5">                                        
                                <input type="password" name="conf" id="conf" >               
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Warna Navbar</label>       
                                </div>                                        
                            </div>
                            <div class="col-md-5">                                        
                                <select class="" name="room_type" required> 
                                    <option selected value="light">Light</option>
                                    <option value="dark">Dark</option>                        
                                </select>
                            </div>
                        </div>
                        <div class="row  justify-content-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>      
                            </div>                        
                        </div>                        
                        <div class="row  justify-content-center">
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-info">Cancel</button>      
                            </div>                        
                        </div>
                    </form>
                </div>
            </div>
            <?php }
        } ?>        
</body>
</html>