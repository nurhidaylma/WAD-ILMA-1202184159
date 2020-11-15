<?php
    include 'config.php';
    $id_event = $_GET['id'];

    $query = "DELETE FROM event_table WHERE id='$id_event'";
    $delete = mysqli_query($conn, $query);

    header("Location:home.php")
?>