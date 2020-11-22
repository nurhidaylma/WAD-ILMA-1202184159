<?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    
    include('config.php');
    $user = $_SESSION['email'];        
    $select = mysqli_query($conn, "SELECT * FROM user WHERE email = '$user'");        
    $data_user = $select->fetch_array();
    $id_user = $data_user['id'];

    $cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$id_user'");
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
    <title>Cart</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a href="index.php" class="navbar-brand text-secondary">WAD Beauty</a>
        <form class="form-inline">
            <a href="#" class="pr-2 btn-light">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>            
            </a>
            Selamat Datang,
            <div class="btn-group">
                <a type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $data_user['nama']; ?>
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

    <!-- konten -->
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-8 col-sm-8 col-xl-8">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <form action="" method="get">
        <tbody>
            <?php
                if($cart->num_rows > 0){
                    while ($data = mysqli_fetch_array($cart)){ ?>
            <tr>
                <td hidden><?= $data['id'] ?></td>
                <td>
                    <?php 
                        $no = 1;                        
                        echo $no++;
                    ?>
                </td>
                <td><?= $data['nama_barang'] ?></td>  
                <td><?php echo "Rp".$data['harga']; ?></td>                
                <td>
                    <a href="delete.php?id=<?= $data['id']; ?>" type="submit" class="btn btn-danger">Hapus</a>
                </td>                          
            </tr>  
            <?php }
            } ?>
            <tr>
                <th>Total</th>
                <th colspan="3">
                    <?php                                                
                        if($cart->num_rows > 0){
                            $sum = mysqli_query($conn, "SELECT SUM(harga) AS total_harga FROM cart WHERE user_id = '$id_user'");
                            $row = mysqli_fetch_assoc($sum);
                            $result = $row['total_harga'];
                            echo "Rp".$result;
                        } else {
                            echo "Rp0";
                        }
                        
                    ?>
                </th>
            </tr>                      
        </tbody>
        </form>
        </table>
        </div>
    </div>
    <p class="text-center">2020 Copyright: 
        <a href="index.php">WAD Beauty</a>
    </p>                
</body>
</html>