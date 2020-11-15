<?php
    $dbhost = "localhost";
    $dbuser = "root";    
    $dbpass ="";
    $dbname = "wad_modul3_ilma";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$conn){
        echo "<script>
                alert('Failed connect to database')
            </script>";
    }

?>