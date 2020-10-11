<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>  
<div class="container-fluid">
  <div class="row ">
    <div class="col-md-12 text-center" style="background-color: rgb(48, 113, 242);">
      <nav class="navbar navbar-expand-lg navbar-light ">                    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="home.php">Home</a>
            <a class="nav-link active" href="#">Booking<span class="sr-only">(current)</span></a>                                                        
          </div>
        </div>
      </nav>                
    </div>            
  </div>  
        
  <div class="row" style="margin-top: 50px;">
    <div class="col-md-6 d-flex flex-row-reverse"  >
    <form style="width: 400px;" action="my_booking.php" method="$_POST">            
    <div class="form-group ">
      <label for="inputNama">Name</label>
      <input type="text" class="form-control" name="nama" id="inputNama" required>
    </div>        
    <div class="form-group ">
      <label for="inputDate">Check-in</label>
      <div class="input-container">
        <i class="fa fa-calendar icon"></i>
        <input type="date" class="form-control" name="date" id="inputDate" required>                      
      </div>            
    </div>
    <div class="form-group ">
      <label for="inputDuration">Duration</label>
      <input type="text" class="form-control" name="durasi" id="inputDuration" required>
      <p style="font-size:x-small;">Day(s)</p> 
    </div>
    <div class="form-group">
      <label for="inputType">Room Type</label>
      <?php  
        if (isset($_POST['btnStandard'])) {
          echo '<input class="form-control" type="text" value="Standard" readonly>';          
        } elseif (isset($_POST['btnSuperior'])) {
          echo '<input class="form-control" type="text" value="Superior" readonly>';
        } elseif (isset($_POST['btnLuxury'])) {
          echo '<input class="form-control" type="text" value="Luxury" readonly>';
        } else { ?>
          <select class="custom-select" required> 
            <option selected value="standard">Standard</option>
            <option value="superior">Superior</option>
            <option value="luxury">Luxury</option>                
          </select>          
        <?php } 
      ?>                              
    </div>
    <div class="form-group">
      <label for="service">Add Service(s)</label> <br>
      <label for="service" style="font-size: x-small;">$ 20/Service</label> <br>
      <div class="custom-control custom-checkbox" >                
        <input type="checkbox" class="custom-control-input" id="service" name="service">
        <label class="custom-control-label" for="service">Room Service</label>              
      </div>            
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="breakfast" name="breakfast">
        <label class="custom-control-label" for="breakfast">Breakfast</label>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPhone">Phone Number</label>
      <input type="text" class="form-control" name="phone" id="inputPhone" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Sign in</button>      
    </div>
  </form>
    </div>
    <div class="col-md-6">
      <?php  
        if (isset($_POST['btnStandard'])) {
          echo '<img src="assets\standard.jpg">';          
        } elseif (isset($_POST['btnSuperior'])) {
          echo '<img src="assets\superior_room.jpg">';
        } elseif (isset($_POST['btnLuxury'])) {
          echo '<img src="assets\luxury.jpg">';
        } else {
          echo '<img src="assets\standard.jpg">';          
        }
      ?>      

    </div>
  </div>
  
</div>
</body>
</html>