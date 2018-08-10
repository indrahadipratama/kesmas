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

    //-------------------------------------------------KATEGORI PENGUMUMAN--------------------------
    if($_GET['a']=='tambahkatpengumuman')
        $db->insert_data("kat_pengumuman", $data = array("nm_kat_pengumuman" => $_POST['nama']));

    if($_GET['a']=='editkatpengumuman')
        $db->update_data("kat_pengumuman",$where = array("id_kat_pengumuman" => $_POST['id']),$data = array("nm_kat_pengumuman" => $_POST['nama'], "aktif" => $_POST['aktif']));

    if($_GET['a']=='hapuskatpengumuman')
        $db->delete_data("kat_pengumuman", $where = array("id_kat_pengumuman" => $_GET['id']));

    //----------------------------------------PENGUMUMAN---------------------------------------------------
    if($_GET['a']=='tambahpengumuman'){
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
            move_uploaded_file($lokasi_gambar,"../file_pengumuman/$gambar");
            move_uploaded_file($lokasi_file,"../file_pengumuman/$nfile");
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "file_pengumuman" => $nfile, "username" => $_SESSION['username']);
            $db->insert_data("pengumuman", $data);
        }elseif((empty($lokasi_gambar))&&(!empty($lokasi_file))){
            move_uploaded_file($lokasi_file,"../file_pengumuman/$nfile");
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "file_pengumuman" => $nfile, "username" => $_SESSION['username']);
            $db->insert_data("pengumuman", $data);
        }elseif((!empty($lokasi_gambar))&&(empty($lokasi_file))){
            move_uploaded_file($lokasi_gambar,"../file_pengumuman/$gambar");
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "username" => $_SESSION['username']);
            $db->insert_data("pengumuman", $data);
        }else{
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "username" => $_SESSION['username']);
            $db->insert_data("pengumuman", $data);
        }
    }

    if($_GET['a']=='editpengumuman'){
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
        $where = array("id_pengumuman" => $id);

        if((!empty($lokasi_gambar))&&(!empty($lokasi_file))){
            move_uploaded_file($lokasi_gambar,"../file_pengumuman/$gambar");
            move_uploaded_file($lokasi_file,"../file_pengumuman/$file");
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "file_pengumuman" => $nfile, "username" => $_SESSION['username']);
            $db->update_data("pengumuman",$where,$data);
        }elseif((empty($lokasi_gambar))&&(!empty($lokasi_file))){
            move_uploaded_file($lokasi_file,"../file_pengumuman/$file");
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "file_pengumuman" => $nfile, "username" => $_SESSION['username']);
            $db->update_data("pengumuman",$where,$data);
        }elseif((!empty($lokasi_gambar))&&(empty($lokasi_file))){
            move_uploaded_file($lokasi_gambar,"../file_pengumuman/$gambar");
            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "username" => $_SESSION['username']);
            $db->update_data("pengumuman",$where,$data);
        }else{

            $data = array("id_kat_pengumuman" => $_POST['kat'], "nm_pengumuman" => $_POST['nama'], "isi_pengumuman" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "username" => $_SESSION['username']);
            $db->update_data("pengumuman",$where,$data);
        }
    }

    if($_GET['a']=='hapuspengumuman'){
        if($_GET['namagambar'] !='')
            unlink("../file_pengumuman/$_GET[namagambar]");
        if($_GET['namafile'] !='')
            unlink("../file_pengumuman/$_GET[namafile]");

        $id = $_GET['id'];
        $where = array("id_pengumuman" => $id);

        $db->delete_data("pengumuman", $where);
    }

    //--------------------------------------------KATEGORI AKTIVITAS-----------------------------------------------------
    if($_GET['a']=='tambahkataktivitas')
        $db->insert_data("kat_aktivitas", $data = array("nm_kat_aktivitas" => $_POST['nama']));

    if($_GET['a']=='editkataktivitas')
        $db->update_data("kat_aktivitas",$where = array("id_kat_aktivitas" => $_POST['id']),$data = array("nm_kat_aktivitas" => $_POST['nama'], "aktif" => $_POST['aktif']));

    if($_GET['a']=='hapuskataktivitas')
        $db->delete_data("kat_aktivitas", $where = array("id_kat_aktivitas" => $_GET['id']));

    //-----------------------------------------------AKTIVITAS---------------------------------------------------------
    if($_GET['a']=='tambahaktivitas'){
        //untuk gambar
        $lokasi_gambar = $_FILES['image-file']['tmp_name'];
        $tipe_gambar = $_FILES['image-file']['type'];
        $nama_gambar = $_FILES['image-file']['name'];
        $acakgambar = rand(1,999);
        $gambar = $acakgambar.$nama_gambar;

        if(!empty($lokasi_gambar)){
            move_uploaded_file($lokasi_gambar,"../file_aktivitas/$gambar");
            $data = array("id_kat_aktivitas" => $_POST['kat'], "nm_aktivitas" => $_POST['nama'], "isi_aktivitas" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "username" => $_SESSION['username']);
            $db->insert_data("aktivitas", $data);
        }else{
            $data = array("id_kat_aktivitas" => $_POST['kat'], "nm_aktivitas" => $_POST['nama'], "isi_aktivitas" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "username" => $_SESSION['username']);
            $db->insert_data("aktivitas", $data);
        }
    }

    if($_GET['a']=='editaktivitas'){
        //untuk gambar
        $lokasi_gambar = $_FILES['fgambar']['tmp_name'];
        $tipe_gambar = $_FILES['fgambar']['type'];
        $nama_gambar = $_FILES['fgambar']['name'];
        $acakgambar = rand(1,999);
        $gambar = $acakgambar.$nama_gambar;

        $id = $_POST['id'];
        $where = array("id_aktivitas" => $id);

        if(!empty($lokasi_gambar)){
            move_uploaded_file($lokasi_gambar,"../file_aktivitas/$gambar");
            $data = array("id_kat_aktivitas" => $_POST['kat'], "nm_aktivitas" => $_POST['nama'], "isi_aktivitas" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "gambar" => $gambar, "username" => $_SESSION['username']);
            $db->update_data("aktivitas",$where,$data);
        }else{

            $data = array("id_kat_aktivitas" => $_POST['kat'], "nm_aktivitas" => $_POST['nama'], "isi_aktivitas" => $_POST['isi'], "tgl_posting" => $tgl_skarang, "jam" => $jam_sekarang, "hari" => $hari_ini, "username" => $_SESSION['username']);
            $db->update_data("aktivitas",$where,$data);
        }
    }

    if($_GET['a']=='hapusaktivitas'){
        if($_GET['namagambar'] !='')
            unlink("../file_aktivitas/$_GET[namagambar]");


        $id = $_GET['id'];
        $where = array("id_aktivitas" => $id);

        $db->delete_data("aktivitas", $where);
    }

    //---------------------------------------------ALBUM----------------------------------------------------------------
    if($_GET['a']=='tambahalbum'){
        //untuk gambar
        $lokasi_gambar = $_FILES['image-file']['tmp_name'];
        $tipe_gambar = $_FILES['image-file']['type'];
        $nama_gambar = $_FILES['image-file']['name'];
        $acakgambar = rand(1,999);
        $gambar = $acakgambar.$nama_gambar;

        if(!empty($lokasi_gambar)){
            move_uploaded_file($lokasi_gambar,"../gbr_album/$gambar");
            $data = array("nm_album" => $_POST['nama'], "gbr_album" => $gambar);
            $db->insert_data("album", $data);
        }else{
            $data = array("nm_album" => $_POST['nama']);
            $db->insert_data("album", $data);
        }
    }

    if($_GET['a']=='editalbum'){
        //untuk gambar
        $lokasi_gambar = $_FILES['image-file']['tmp_name'];
        $tipe_gambar = $_FILES['image-file']['type'];
        $nama_gambar = $_FILES['image-file']['name'];
        $acakgambar = rand(1,999);
        $gambar = $acakgambar.$nama_gambar;

        $id = $_POST['id'];
        $where = array("id_album" => $id);

        if(!empty($lokasi_gambar)){
            move_uploaded_file($lokasi_gambar,"../gbr_album/$gambar");
            $data = array("nm_album" => $_POST['nama'], "gbr_album" => $gambar, "aktif" => $_POST['aktif']);
            $db->update_data("album",$where,$data);
        }else{
            $data = array("nm_album" => $_POST['nama'], "aktif" => $_POST['aktif']);
            $db->update_data("album",$where,$data);
        }
    }

    if($_GET['a']=='hapusalbum'){
        if($_GET['namagambar'] !='')
            unlink("../gbr_album/$_GET[namagambar]");


        $id = $_GET['id'];
        $where = array("id_album" => $id);

        $db->delete_data("album", $where);
    }

    //-----------------------------------------------GALERI--------------------------------------------------------
    if($_GET['a']=='tambahgaleri'){
        //untuk gambar
        $lokasi_gambar = $_FILES['image-file']['tmp_name'];
        $tipe_gambar = $_FILES['image-file']['type'];
        $nama_gambar = $_FILES['image-file']['name'];
        $acakgambar = rand(1,999);
        $gambar = $acakgambar.$nama_gambar;

        if(!empty($lokasi_gambar)){
            move_uploaded_file($lokasi_gambar,"../gbr_galeri/$gambar");
            $data = array("id_album" => $_POST['album'], "nm_galeri" => $_POST['nama'], "gbr_galeri" => $gambar, "ket" => $_POST['editor1']);
            $db->insert_data("galeri", $data);
        }else{
            $data = array("id_album" => $_POST['album'], "nm_galeri" => $_POST['nama'], "ket" => $_POST['editor1']);
            $db->insert_data("galeri", $data);
        }
    }

    if($_GET['a']=='editgaleri'){
        //untuk gambar
        $lokasi_gambar = $_FILES['image-file']['tmp_name'];
        $tipe_gambar = $_FILES['image-file']['type'];
        $nama_gambar = $_FILES['image-file']['name'];
        $acakgambar = rand(1,999);
        $gambar = $acakgambar.$nama_gambar;

        $id = $_POST['id'];
        $where = array("id_galeri" => $id);

        if(!empty($lokasi_gambar)){
            move_uploaded_file($lokasi_gambar,"../gbr_galeri/$gambar");
            $data = array("id_album" => $_POST['album'], "nm_galeri" => $_POST['nama'], "gbr_galeri" => $gambar, "ket" => $_POST['editor1']);
            $db->update_data("galeri",$where,$data);
        }else{
            $data = array("id_album" => $_POST['album'], "nm_galeri" => $_POST['nama'], "ket" => $_POST['editor1']);
            $db->update_data("galeri",$where,$data);
        }
    }

    if($_GET['a']=='hapusgaleri'){
        if($_GET['namagambar'] !='')
            unlink("../gbr_galeri/$_GET[namagambar]");


        $id = $_GET['id'];
        $where = array("id_galeri" => $id);

        $db->delete_data("galeri", $where);
    }

    //-------------------------------------------------------KATEGORI BERITA ------------------------------------
    if($_GET['a']=='tambahkatberita')
        $db->insert_data("kat_berita", $data = array("nm_kat_berita" => $_POST['nama']));

    if($_GET['a']=='editkatberita')
        $db->update_data("kat_berita",$where = array("id_kat_berita" => $_POST['id']),$data = array("nm_kat_berita" => $_POST['nama'], "aktif" => $_POST['aktif']));

    if($_GET['a']=='hapuskatberita')
        $db->delete_data("kat_berita", $where = array("id_kat_berita" => $_GET['id']));

  header("location:".$_GET['page']);
?>