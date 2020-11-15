<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets\style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
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
            <a href="home.php" class="p-2">Home</a>    
            <a href="buat_event.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buat Event</a>
        </form>
    </nav>

    <!-- konten -->
    <div class="row">
        <div class="col text-center p-3">
            <h5>Detail Event!</h5>
        </div>
    </div>      
    
    <?php                
        if($select->num_rows > 0){  //cek apakah ada isinya di table
            while($data = mysqli_fetch_array($select)){ ?>
                <!-- card -->
                <div class="card shadow rounded mb-2" style="width: 50rem;">
                    <img src="gambar/<?php echo $data['gambar'] ?>" class="card-img-top" alt="..." style="width: 50rem; height:20rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['name'] ?></h5>                        
                        <h6>Deskripsi</h6>
                        <p><?= $data['deskripsi'] ?></p> 
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Informasi Event</h6>                                                                    
                                <p><?= $data['tanggal'] ?></p>                                                                                                    
                                <p><?= $data['tempat'] ?></p>                                                                                            
                                <p><?php echo $data['mulai'].' - '.$data['berakhir'] ?></p>                                
                            </div>
                            <div class="col-md-6">
                                <h6>Benefit</h6>
                                <ul>
                                    <li><?= $data['benefit'] ?></li>
                                </ul>
                            </div>
                        </div>                       
                        <div class="row">
                            <div class="col-md-2">
                                <h6>Kategori : </h6>
                            </div>
                            <div class="col-md-2">
                                <?= $data['kategori'] ?>
                            </div>
                        </div>                        
                        <h6>HTM Rp. <?= $data['harga'] ?></h6>
                    </div>                    
                    <div class="row">
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Edit</button>                            
                        </div>
                        <div class="col-md-2">
                            <a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>                                        
                </div>


                <?php                    
                    if(isset($_POST['btnUpdate'])){
                        $id_event = $_GET['id_event'];
                    }
                    

                    $query = "SELECT * FROM event_table WHERE id='$id_event'";
                    $update = mysqli_query($conn, $query);
                    $display = mysqli_fetch_assoc($update);
                ?>
                <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Content Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="row">                    
                            <div class="col-md-6">
                                <!-- card 1 -->                
                                <div class="card">            
                                    <div class="card-header bg-danger"></div>  
                                    <div class="card-body">        
                                        <input type="text" name="id_event" id="id_event" value="<?= $display['id'] ?>" hidden>                  
                                        <div class="form-group">
                                            <label for="inputNama">Name</label>
                                            <input type="text" class="form-control" id="inputNama" name="inputNama" required >
                                        </div>                
                                        <div class="form-group">
                                            <label for="inputDesk">Deskripsi</label>
                                            <textarea class="form-control" id="inputDesk" name="inputDesk" required></textarea>
                                        </div>                    
                                        <div class="form-group">
                                            <label for="">Upload Gambar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGambar" name="inputGambar" required>
                                                <label class="custom-file-label" for="inputGambar">Choose file...</label>                                    
                                            </div>                
                                        </div>         
                                        <!-- untuk mengubah nama selected file -->
                                        <script type="application/javascript">
                                            $('input[type="file"]').change(function(e){
                                                var fileName = e.target.files[0].name;
                                                $('.custom-file-label').html(fileName);
                                            });
                                        </script>

                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="inputKategori" id="online" value="online">
                                                        <label class="form-check-label" for="online">Online</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="inputKategori" id="offline" value="offline">
                                                        <label class="form-check-label" for="offline">Offline</label>
                                                    </div>
                                                </div>                
                                            </div>
                                        </div>                                   
                                    </div>
                                </div>
                            </div>                        

                            <div class="col-md-6">
                                <!-- card 2 -->
                                <div class="card">
                                    <div class="card-header bg-primary"></div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputTanggal">Tanggal</label>
                                            <div class="input-container">
                                                <i class="fa fa-calendar icon"></i>
                                                <input type="date" class="form-control" name="inputTanggal" id="inputTanggal" required>                      
                                            </div>            
                                        </div>                
                                        <div class="form-group">
                                            <div class="form-row">
                                                <label for="inputMulai" class="col-6 col-form-label">Jam Mulai</label>
                                                <label for="inputAkhir" class="col-6 col-form-label">Jam Berakhir</label>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-6">
                                                    <input class="form-control" type="time" value="13:45" id="inputMulai" name="inputMulai" required>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="time" value="13:45" id="inputAkhir" name="inputAkhir" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputTempat">Tempat</label>
                                            <input type="text" class="form-control" id="inputTempat" name="inputTempat" required>
                                        </div>     
                                        <div class="form-group">
                                            <label for="inputHarga">Harga</label>
                                            <input type="number" class="form-control" id="inputHarga" name="inputHarga" required>
                                        </div>     
                                        <div class="form-group">
                                            <label for="">Benefit</label>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="inputBenefit[]" id="snack" value="snack">
                                                        <label class="form-check-label" for="snack">Snacks</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="inputBenefit[]" id="sertifikat" value="sertifikat">
                                                        <label class="form-check-label" for="sertifikat">Sertifikat</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="inputBenefit[]" id="souvenir" value="souvenir">
                                                        <label class="form-check-label" for="souvenir">Souvenir</label>
                                                    </div>
                                                </div>                
                                            </div>
                                        </div>                                          
                                    </div>                        
                                </div>                    
                            </div>
                        </div>         
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  name="btnUpdate" type="submit" class="btn btn-primary">Save changes</button>
                </div>
                                        </form>
            </div>
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