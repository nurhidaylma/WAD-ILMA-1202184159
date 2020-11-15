<?php

    include 'config.php';
    $name = $_POST['inputNama'];
    $deskripsi = $_POST['inputDesk'];    
    $kategori = $_POST['inputKategori'];
    $tanggal = $_POST['inputTanggal'];
    $mulai = $_POST['inputMulai'];
    $berakhir = $_POST['inputAkhir'];
    $tempat = $_POST['inputTempat'];
    $harga = $_POST['inputHarga'];
    $benefit = implode(",", $_POST['inputBenefit']);
 
    // upload gambar handling
    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['inputGambar']['name'];
    $ukuran = $_FILES['inputGambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
    if(!in_array($ext,$ekstensi) ) {
	    header("location:buat_event.php?alert=gagal_ekstensi");
    }else{
	    if($ukuran < 1044070){		
    		$xx = $rand.'_'.$filename;
	    	move_uploaded_file($_FILES['inputGambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		    mysqli_query($conn, "INSERT INTO event_table(name, deskripsi, gambar, kategori, tanggal, mulai, berakhir, tempat, harga, benefit)
                VALUES('$name', '$deskripsi', '$xx', '$kategori', '$tanggal', '$mulai', '$berakhir', '$tempat', '$harga', '$benefit')");
            
    		header("location:buat_event.php?alert=berhasil");
    	}else{
	    	header("location:buat_event.php?alert=gagal_ukuran");
	    }
    }
    // include('config.php');   
    // $name = $_POST['inputNama'];
    // $deskripsi = $_POST['inputDesk'];    
    // $kategori = $_POST['inputKategori'];
    // $tanggal = $_POST['inputDate'];
    // $mulai = $_POST['inputMulai'];
    // $berakhir = $_POST['inputAkhir'];
    // $tempat = $_POST['inputTempat'];
    // $harga = $_POST['inputHarga'];
    // $benefit = $_POST['inputBenefit']; 
    
    // $rand = rand();
    // $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    // $filename = $_FILES['inputGambar']['name'];
    // $ukuran = $_FILES['inputGambar']['size'];
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // if(!in_array($ext, $ekstensi)){
    //     header("location:buat_event.php?alert=gagal_ekstensi");
    // } else {
    //     if($ukuran < 1044070){
    //         $xx = $rand.'_'.$filename;
    //         move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
    //         $query = "INSERT INTO event 
    //                 VALUES(NULL,'$name', '$deskripsi', '$xx', '$kategori', '$tanggal', '$mulai', '$berakhir', '$tempat', '$harga', '$benefit')";
	//     	mysqli_query($conn, "INSERT INTO event VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
	// 	    header("location:home.php?alert=berhasil");
	//     }else{
	// 	    header("location:home.php?alert=gagal_ukuran");	
    //     }
    // }
    // check if form submitted
    // if(isset($_POST['btnSubmit'])) {
    //     $name = $_POST['inputNama'];
    //     $deskripsi = $_POST['inputDesk'];
    //     $gambar = $_POST['inputGambar'];
    //     $kategori = $_POST['inputKategori'];
    //     $tanggal = $_POST['inputDate'];
    //     $mulai = $_POST['inputMulai'];
    //     $berakhir = $_POST['inputAkhir'];
    //     $tempat = $_POST['inputTempat'];
    //     $harga = $_POST['inputHarga'];
    //     $benefit = $_POST['inputBenefit'];

    //     $query = "INSERT INTO event(name, deskripsi, gambar, kategori, tanggal, mulai, berakhir, tempat, harga, benefit)
    //             VALUES ('$name', '$deskripsi', '$gambar', '$kategori', '$tanggal', '$mulai', '$berakhir', '$tempat', '$harga', '$benefit')";
        
    //     $insert = mysqli_query($conn, $query);

    //     echo "Successfully added";

        // $serverdb = "localhost";
        // $userdb = "root";
        // $passdb = "";
        // $dbname = "wad_modul3_ilma";

        // $conn = new mysqli($serverdb, $userdb, $passdb, $dbname);

        // if($conn->connect_error) {
        //     die("Connection failed: ".$conn->connect_error);
        // }

        // $query = "INSERT INTO event (name, deskripsi, gambar, kategori, tanggal, mulai, berakhir, tempat, harga, benefit)
        //         VALUES ()"
    // }
?>