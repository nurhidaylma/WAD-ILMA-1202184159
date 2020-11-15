<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets\style.css">
    <script src= "https://code.jquery.com/jquery-1.12.4.min.js"> </script>      
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">EAD Events</a>
        <form class="form-inline">
            <a href="home.php" class="p-2">Home</a>    
            <a href="#" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buat Event</a>
        </form>
    </nav>

    <!-- konten -->
    <div class="container-fluid">    
        <div class="row">
            <div class="col m-2">
                <h5>Buat Event</h5>
            </div>
        </div>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="row">                    
                <div class="col-md-6">
                <!-- card 1 -->                
                    <div class="card">            
                        <div class="card-header bg-danger"></div>  
                        <div class="card-body">                          
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
                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>                                    
                            </div>
                            <div class="col">
                                <button type="reset" class="btn btn-danger" name="btnCancel">Cancel</button>                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>         
        </form>
    </div>        
</body>
</html>