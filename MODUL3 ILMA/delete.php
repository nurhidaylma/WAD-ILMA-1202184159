<?php
    include 'config.php';
    $id_event = $_GET['id'];

    $query = "DELETE FROM event_table";
    $delete = mysqli_query($conn, $query);

    header("Location:home.php")
?>