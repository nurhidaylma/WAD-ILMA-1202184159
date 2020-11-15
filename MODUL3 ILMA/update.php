<?php
    include 'config.php';
    $id_event = $_POST['id_event'];
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
		    mysqli_query($conn, "UPDATE event_table SET 
                name='$name', deskripsi='$deskripsi', gambar='$xx', kategori='$kategori', 
                tanggal='$tanggal', mulai='$mulai', berakhir='$berakhir', tempat='$tempat', 
                harga='$harga', benefit='$benefit'
                WHERE id='$id_event'");                            
    		header("location:buat_event.php?alert=berhasil");
    	}else{
	    	header("location:buat_event.php?alert=gagal_ukuran");
	    }
    }
?>