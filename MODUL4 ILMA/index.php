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
                    
        if(mysqli_num_rows($select) == 0){
            echo "error";
        } elseif(mysqli_num_rows($select) == 1){
            if(isset($_POST['btn1'])){
                $insert = mysqli_query($conn, "INSERT INTO cart(user_id, nama_barang, harga)
                        VALUES ('$id_user', 'Yuja Niacin', 169000)");                 
            } elseif(isset($_POST['btn2'])){
                $insert = mysqli_query($conn, "INSERT INTO cart(user_id, nama_barang, harga)
                        VALUES ('$id_user', 'Snail Truecica', 180000)");                
            } elseif(isset($_POST['btn3'])){
                $insert = mysqli_query($conn, "INSERT INTO cart(user_id, nama_barang, harga)
                        VALUES ('$id_user', 'Miracle Toner', 108000)");                
            }
        }                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAD Beauty</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="assets\style.css"> -->
    <style>
        p {
            font-size: smaller;
        }
        #card-catalog {
            width: 50rem;
        }
    </style>
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
    <form action="" method="post">
    <div class="d-flex justify-content-center">
    <div class="card mt-2" id="card-catalog">
        <div class="card-header text-center">
            <h2>WAD Beauty</h2>
            <p>Tersedia Skin Care dengan harga murah tapi bukan murahan dan berkualitas</p>
        </div>    
        <div class="card-group">    
            <div class="card">
                <img src="assets\yuja.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">YUJA NIACIN 30 DAYS BLEMISH CARE SERUM</h6>
                    <p class="card-text">Produk terbaru dari somebymi yang memiliki manfaat untuk Whitening + blemish care + Anti-wrinkle,
                        sangat recommended untuk masalah kulit kusam, kulit kering dan bekas jerawat atau FLEK hitam
                    </p>                    
                    <hr>                    
                    <h5>Rp169.000</h5>
                </div>
                <div class="card-footer bg-transparent">
                    <button type="submit" class="btn btn-primary" name="btn1">Tambahkan ke Keranjang</button>
                </div>
            </div>
            <div class="card">
                <img src="assets\snail.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">SOMEBYMI Snail Truecica Miracle Repair Cream</h6>
                    <p class="card-text">Sebagai pelembab, krim ini mampu memberikan kelembaban yang menyeluruh dan tahan lama bagi kulit,
                        sehingga terasa halus, lembab, dan kenyal. Mencerahkan, menghambar penuaan seperti keriput dan garis halus, juga menenangkan
                        kulit yang iritasi, dengan kandungan 420,000ppm Snail Truecica.</p>      
                    <hr>                    
                    <h5>Rp180.000</h5>                    
                </div>
                <div class="card-footer bg-transparent">
                    <button type="submit" class="btn btn-primary text-small" name="btn2">Tambahkan ke Keranjang</button>
                </div>
            </div>
            <div class="card">
                <img src="assets\thirty.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">30 DAYS MIRACLE TONER</h6>
                    <p class="card-text">Dengan kandungan AHA, BHA, dan PHA bekerja secara efektif untuk membuat kulit lebih bersih dan lebih
                        bersinar, mengandung 10.000 ppm ekstrak pohon teh alami yang secara efektif meningkatkan elastisitas dan menutrisi kulit
                        Anda tanpa efek iritasi karena tidak megandung 20 bahan 500 dan pewarna berbahaya.</p>                    
                    <hr>                    
                    <h5>Rp108.000</h5>                    
                </div>
                <div class="card-footer bg-transparent">
                    <button type="submit" class="btn btn-primary" name="btn3">Tambahkan ke Keranjang</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>    
</body>
</html>