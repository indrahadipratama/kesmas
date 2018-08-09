	<?php
    include "../config/database.php";
    include "../config/library.php";
    
    //---------------------------------------------profil
    if($_GET['a']=='hapusprofil'){
    	if($_GET['namagambar'] !='')
    		unlink("../gbr_profil/$_GET[namagambar]");
    	$id = $_GET['id'];
    	$where = array("id_profil" => $id);

        $db->delete_data("profil", $where);	
    }
    if($_GET['a']=='tambahprofil'){
    	$lokasi_gambar = $_FILES['image-file']['tmp_name'];
    	$tipe_gambar = $_FILES['image-file']['type'];
    	$namagambar = $_FILES['image-file']['name'];
    	$acak = rand(1,999);
    	$gambar = $acak.$namagambar;

    	if(!empty($lokasi_gambar)){
    		move_uploaded_file($lokasi_gambar, "../gbr_profil/$gambar");
    		$data = array("nm_profil" => $_POST['nama'], "isi_profil" => $_POST['editor1'], "gambar" => $gambar);
    		$db->insert_data("profil",$data);
    	}else{
    		$data = array("nm_profil" => $_POST['nama'], "isi_profil" => $_POST['editor1']);
    		$db->insert_data("profil",$data);
    	}
    }
    if($_GET['a']=='editprofil'){
    	$lokasi_gambar = $_FILES['image-file']['tmp_name'];
    	$tipe_gambar = $_FILES['image-file']['type'];
    	$namagambar = $_FILES['image-file']['name'];
    	$acak = rand(1,999);
    	$gambar = $acak.$namagambar;
        $id = $_POST['id'];
        $where = array("id_profil" => $id);
    	if(!empty($lokasi_gambar)){
    		move_uploaded_file($lokasi_gambar, "../gbr_profil/$gambar");
            $data = array("nm_profil" => $_POST['nama'], "isi_profil" => $_POST['editor1'], "gambar" => $gambar);
            $db->update_data("profil",$where,$data);
    	}else{
    		 $data = array("nm_profil" => $_POST['nama'], "isi_profil" => $_POST['editor1']);
            $db->update_data("profil",$where,$data);
    	}
    }

    //---------------------------------KATEGORI AKADEMIK----------------------------------------------------------
    if($_GET['a']=='tambahkatakademik')
    	$db->insert_data("kat_akademik", $data = array("nm_kat_akademik" => $_POST['nama']));

    if($_GET['a']=='editkatakademik')
    	$db->update_data("kat_akademik",$where = array("id_kat_akademik" => $_POST['id']),$data = array("nm_kat_akademik" => $_POST['nama'], "aktif" => $_POST['aktif']));

    if($_GET['a']=='hapuskatakademik')
    	$db->delete_data("kat_akademik", $where = array("id_kat_akademik" => $_GET['id']));

    //---------------------------------AKADEMIK----------------------------------------------------------
    if($_GET['a']=='tambahakademik'){
    	 //untuk gambar
         $lokasi_gambar = $_FILES['image-file']['tmp_name'];
         $tipe_gambar = $_FILES['image-file']['type'];
         $nama_gambar = $_FILES['image-file']['name'];
         $acakgambar = rand(1,999);
         $gambar = $acakgambar.$nama_gambar;
     //untuk file
         $lokasi_file = $_FILES['ffile']['tmp_name'];
         $tipe_file = $_FILES['ffile']['type'];
         $nama_file = $_FILES['ffile']['name'];
         $acakfile = rand(1,999);
         $nfile = $acakfile.$nama_file;

         if((!empty($lokasi_gambar))&&(!empty($lokasi_file))){
                  move_uploaded_file($lokasi_gambar,"../file_akademik/$gambar");
                  move_uploaded_file($lokasi_file,"../file_akademik/$nfile");
               $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "file_dokumen" => $nfile, "username" => $_SESSION['username']);
               $db->insert_data("akademik", $data);
          }elseif((empty($lokasi_gambar))&&(!empty($lokasi_file))){
                   move_uploaded_file($lokasi_file,"../file_akademik/$nfile");
                $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "file_dokumen" => $nfile, "username" => $_SESSION['username']);
               $db->insert_data("akademik", $data);
          }elseif((!empty($lokasi_gambar))&&(empty($lokasi_file))){
                   move_uploaded_file($lokasi_gambar,"../file_akademik/$gambar");
                 $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "username" => $_SESSION['username']);
               $db->insert_data("akademik", $data);
          }else{
               $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "username" => $_SESSION['username']);
               $db->insert_data("akademik", $data);
          }
    }

    if($_GET['a']=='editakademik'){
    	 //untuk gambar
          $lokasi_gambar = $_FILES['fgambar']['tmp_name'];
          $tipe_gambar = $_FILES['fgambar']['type'];
          $nama_gambar = $_FILES['fgambar']['name'];
          $acakgambar = rand(1,999);
          $gambar = $acakgambar.$nama_gambar;
         //untuk file
          $lokasi_file = $_FILES['ffile']['tmp_name'];
          $tipe_file = $_FILES['ffile']['type'];
          $nama_file = $_FILES['ffile']['name'];
          $acakfile = rand(1,999);
          $nfile = $acakfile.$nama_file;
          
          $id = $_POST['id'];
          $where = array("id_akademik" => $id);

          if((!empty($lokasi_gambar))&&(!empty($lokasi_file))){
                move_uploaded_file($lokasi_gambar,"../file_akademik/$gambar");
                move_uploaded_file($lokasi_file,"../file_akademik/$file");
                $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "file_dokumen" => $nfile, "username" => $_SESSION['username']);
                $db->update_data("akademik",$where,$data);
           }elseif((empty($lokasi_gambar))&&(!empty($lokasi_file))){
                move_uploaded_file($lokasi_file,"../file_akademik/$file");
                 $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "file_dokumen" => $nfile, "username" => $_SESSION['username']);
                  $db->update_data("akademik",$where,$data);
           }elseif((!empty($lokasi_gambar))&&(empty($lokasi_file))){
                move_uploaded_file($lokasi_gambar,"../file_akademik/$gambar");
                 $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "username" => $_SESSION['username']);
                 $db->update_data("akademik",$where,$data);
            }else{
    
                  $data = array("id_kat_akademik" => $_POST['kat'], "nm_akademik" => $_POST['nama'], "isi_akademik" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "username" => $_SESSION['username']);
                  $db->update_data("akademik",$where,$data);
            }
    }

    if($_GET['a']=='hapusakademik'){
    	if($_GET['namagambar'] !='')
    		unlink("../file_akademik/$_GET[namagambar]");
    	if($_GET['namafile'] !='')
    		unlink("../file_akademik/$_GET[namafile]");

    	$id = $_GET['id'];
    	$where = array("id_akademik" => $id);

        $db->delete_data("akademik", $where);	
    }


  header("location:".$_GET['page']);
?>