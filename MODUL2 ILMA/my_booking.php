<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        $nama = $_POST['nama'];
        $checkin = $_POST['date'];
        $durasi = $_POST['durasi'];
        $room_type = $_POST['room_type'];
        $phone = $_POST['phone'];    

        
        function cek_room($room_type){
            global $room_type, $price;
            if ($room_type == 'Standard'){
                return $price = 90;
            } elseif ($room_type == 'Superior') {
                return $price = 150;
            } elseif ($room_type == 'Luxury') {
                return $price = 200;
            }
        }
        $price = 0;
    ?>

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
                            <a class="nav-link" href="booking.php">Booking</a>                                                        
                        </div>
                    </div>
                </nav>                
            </div>            
        </div>

        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-md-8">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Booking Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Check-in</th>
                            <th scope="col">Check-out</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Service</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                
                            <th><?php echo rand(100000, 999999); ?></th>                                        
                            <td><?= $nama ?></td>                            
                            <td><?php echo date('d/m/Y', strtotime($checkin)) ?></td>                            
                            <td>
                                <?php                                                
                                    echo date('d/m/Y', strtotime($checkin.  ' + '.$durasi. ' days'));   
                                ?>                
                            </td>                                
                            <td><?= $room_type ?></td>                            
                            <td><?= $phone ?></td>                        
                            <td>
                                <?php                        
                                    if(!empty($_PSOT['service'])){
                                        foreach (($_POST['service']) as $selected){
                                            echo '<ul>
                                                <li>'.$selected. '</li>
                                                </ul>';
                                        }               
                                    } else {
                                        echo "No service";
                                    }                                                
                                ?>                    
                            </td>     
                            <td>
                                <?php                                    
                                    function total_price(){
                                        global $durasi, $room_type;
                                        if(!empty($_POST['service'])){
                                            return $durasi * (cek_room($room_type) + (20 * count($_POST['service'])));
                                        } elseif (empty(($_POST['service']))) {
                                            return $durasi * cek_room($room_type);
                                        }                                                                                           
                                    }
                                    echo "$ ".total_price();
                                ?>
                            </td>           
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body> 
</html>