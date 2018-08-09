<?php
if((!isset($_GET['ct']))||(isset($_GET['ct'])=='')){
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Profil</h4>
            <div class="d-flex align-items-center"></div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
   <div class="row">
   	  <div class="col-12">
   	  	  <div class="card">
   	  	  	 <div class="card-body">
   	  	  	 	 <h4 class="card-title">Data Profil</h4>
   	  	  	 	 <a href="profil-tambahprofil" class="btn btn-info btn-rounded"><i class="fa fa-plus"></i> Tambah Data Profil</a><br /><br />
   	  	  	 	 <div class="table-responsive">
   	  	  	 	 	<table id="file_export" class="table table-striped table-bordered display">
   	  	  	 	 		<thead>
   	  	  	 	 			<tr>
   	  	  	 	 				<th>No</th>
   	  	  	 	 				<th>Nama Profil</th>
   	  	  	 	 				<th></th>
   	  	  	 	 			</tr>
   	  	  	 	 		</thead>
   	  	  	 	 		<tbody>
   	  	  	 	 			<?php
   	  	  	 	 			   $no = 1;
                               $data = $db->show_data("profil");
                               foreach ($data as $d) {
                               	echo"<tr><td>$no</td><td>$d[nm_profil]</td>
                                         <td>
                                             <div class='btn-group'>
                                                 <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
                                                 <div class='dropdown-menu animated flipInX'>
                                                     <a class='dropdown-item' href='profil-editprofil-$d[id_profil]'>Edit Data</a>
                                                     <div class='dropdown-divider'></div>
                                                     <a onclick=\"javascript:if(!(confirm('Anda Yakin?'))) return false;\" class='dropdown-item' href='aksi.php?page=profil&a=hapusprofil&namagambar=$d[gambar]&id=$d[id_profil]'>Hapus Data</a>
                                                 </div>
                                             </div>
                                         </td>
                               	     </tr>";
                               	$no++;
                               }
   	  	  	 	 			?>
   	  	  	 	 		</tbody>
   	  	  	 	 	</table>
   	  	  	 	 </div>
   	  	  	 </div>
   	  	  </div> 
   	  </div>

   </div>
</div>

<?php	
}elseif((isset($_GET['ct'])!='')&&($_GET['ct']=='tambahprofil')){
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Profil</h4>
            <div class="d-flex align-items-center"></div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                           <a href="profil">Profil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
   <div class="row">
   	  <div class="col-12">
   	  	  <div class="card">
   	  	  	 <div class="card-body">
   	  	  	 	 <h4 class="card-title">Tambah Profil</h4>
   	  	  	 </div>
             <hr />
   	  	  	 <form class="form-horizontal" action='aksi.php?page=profil&a=tambahprofil' method="POST" enctype="multipart/form-data" novalidate>
   	  	  	    <div class="card-body">
   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Profil</label>
   	  	  	    		<div class="col-sm-5 controls">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Profil" required data-validation-required-message="This Field is required">
   	  	  	    		</div>
   	  	  	    	</div>
   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="editor1" class="col-sm-3 text-right control-label col-form-label">Isi Profil</label>
   	  	  	    		<div class="col-sm-9 controls">
                           <textarea name="editor1" id="editor1" class="form-control"></textarea>
   	  	  	    		</div>
   	  	  	    	</div>
   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="fgambar" class="col-sm-3 text-right control-label col-form-label">Gambar</label>
   	  	  	    		<div class="col-sm-5 controls">
   	  	  	    			<div class="imageupload">
                               <div class="file-tab">
                                     <label class="btn btn-default btn-file">
                                         <span>Browse</span>
                                        <!-- The file is stored here. -->
                                        <input type="file" name="image-file">
                                     </label>
                                     <button type="button" class="btn btn-default">Remove</button>
                                </div>
                            </div>
   	  	  	    	   </div>
   	  	  	    	</div>
   	  	  	    </div>	
   	  	  	    <hr />
   	  	  	    <div class="card-body">
   	  	  	    	<div class="form-group m-b-0 text-right">
   	  	  	    	<button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
   	  	  	    	<button type="reset" onclick="self.history.back();" class="btn btn-dark waves-effect waves-light">Batal</button>
   	  	  	        </div>
   	  	  	    </div>
   	  	  	 </form>
             
   	  	  </div> 
   	  </div>

   </div>
</div>
<?php
}elseif((isset($_GET['ct'])!='')&&($_GET['ct']=='editprofil')){
	$id = $_GET["id"];
	$where = array(
                    "id_profil" => $id
	               );
   $e = $db->select_data("profil",$where);
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Profil</h4>
            <div class="d-flex align-items-center"></div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                           <a href="profil">Profil</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
   <div class="row">
   	  <div class="col-12">
   	  	  <div class="card">
   	  	  	 <div class="card-body">
   	  	  	 	 <h4 class="card-title">Edit Profil</h4>
   	  	  	 </div>
             <hr />
   	  	  	 <form class="form-horizontal" action='aksi.php?page=profil&a=editprofil' method="POST" enctype="multipart/form-data" novalidate>
   	  	  	 	<input type="hidden" name="id" value="<?php echo $e['id_profil'];?>">
   	  	  	    <div class="card-body">
   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Profil</label>
   	  	  	    		<div class="col-sm-5 controls">
                            <input type="text" value="<?php echo $e['nm_profil'];?>" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Profil" required data-validation-required-message="This Field is required">
   	  	  	    		</div>
   	  	  	    	</div>
   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="editor1" class="col-sm-3 text-right control-label col-form-label">Isi Profil</label>
   	  	  	    		<div class="col-sm-9 controls">
                           <textarea name="editor1" id="editor1" class="form-control" required><?php echo $e['isi_profil'];?></textarea>
   	  	  	    		</div>
   	  	  	    	</div>
   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="" class="col-sm-3 text-right control-label col-form-label">Gambar Profil</label>
   	  	  	    		<div class="col-sm-9 controls">
                          <?php
                             if($e['gambar']=='')
                             	echo"<img src='assets/images/place.jpg' widht='150' height='120'>";
                             else
                             	echo"<img src='../gbr_profil/$e[gambar]' width='150' height='120'>";
                          ?>
   	  	  	    		</div>
   	  	  	    	</div>

   	  	  	    	<div class="form-group row">
   	  	  	    		<label for="fgambar" class="col-sm-3 text-right control-label col-form-label"> Ganti Gambar</label>
   	  	  	    		<div class="col-sm-5 controls">
   	  	  	    			<div class="imageupload">
                               <div class="file-tab">
                                     <label class="btn btn-default btn-file">
                                         <span>Browse</span>
                                        <!-- The file is stored here. -->
                                        <input type="file" name="image-file">
                                     </label>
                                     <button type="button" class="btn btn-default">Remove</button>
                                </div>
                            </div>
   	  	  	    	   </div>
   	  	  	    	</div>
   	  	  	    </div>	
   	  	  	    <hr />
   	  	  	    <div class="card-body">
   	  	  	    	<div class="form-group m-b-0 text-right">
   	  	  	    	<button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
   	  	  	    	<button type="reset" onclick="self.history.back();" class="btn btn-dark waves-effect waves-light">Batal</button>
   	  	  	        </div>
   	  	  	    </div>
   	  	  	 </form>
             
   	  	  </div> 
   	  </div>

   </div>
</div>
<?php
}
?>