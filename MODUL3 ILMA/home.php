<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets\style.css">
    <?php
        include('config.php');                        
        $select = mysqli_query($conn, "SELECT * FROM event_table");
    ?>
</head>
<body>        
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">EAD Events</a>
        <form class="form-inline">
            <a href="#" class="p-2">Home</a>    
            <a href="buat_event.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buat Event</a>
        </form>
    </nav>

    <!-- konten -->
    <div class="row">
        <div class="col text-center p-3">
            <h5>WELCOME TO EAD EVENTS!</h5>
        </div>
    </div>      
    
    <?php                
        if($select->num_rows > 0){  //cek apakah ada isinya di table
            while($data = mysqli_fetch_array($select)){ ?>
                <!-- card -->
                <div class="card shadow rounded mb-2" style="width: 15rem;">
                    <img src="gambar/<?php echo $data['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['name'] ?></h5>
                        <div class="input-container">
                            <i class="fa fa-calendar icon"></i>
                            <p><?= $data['tanggal'] ?></p>
                        </div> 
                        <div class="input-container">
                            <i class="fa fa-calendar icon"></i>
                            <p><?= $data['tempat'] ?></p>
                        </div> 
                        <p class="card-text">Kategori : Event <?= $data['kategori'] ?></p>
                    </div>
                    <div class="card-footer bg-light d-flex align-items-end">
                        <a href="detail_event.php" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            <?php }
        } else {
            echo "<p class='ml-10'>No Events Found</p>";

        }
        $conn->close();        
    ?>
</body>
</html>