<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAD Beauty</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    
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
            <a href="login.php" class="text-secondary p-2">Login</a>    
            <a href="register.php" class="p-2 text-secondary" type="submit">Register</a>
        </form>
    </nav>

    <!-- konten -->
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
                    <button class="btn btn-primary">Tambahkan ke Keranjang</button>
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
                    <button class="btn btn-primary text-small">Tambahkan ke Keranjang</button>
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
                    <button class="btn btn-primary">Tambahkan ke Keranjang</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>