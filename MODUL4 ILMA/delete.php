<?php
    include('config.php');
    $id_barang = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM cart WHERE id = '$id_barang'");                
    header("Location: cart.php");
?>