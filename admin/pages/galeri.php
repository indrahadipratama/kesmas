<?php
if((!isset($_GET['ct']))||(isset($_GET['ct'])=='')){
    ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Galeri</h4>
                <div class="d-flex align-items-center"></div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="home">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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
                        <h4 class="card-title">Data Galeri</h4>
                        <a href="galeri-tambahgaleri" class="btn btn-info btn-rounded"><i class="fa fa-plus"></i> Tambah Data Galeri</a><br /><br />
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Album</th>
                                    <th>Galeri</th>
                                    <th>Keterangan</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $data = $db->show_data("galeri");
                                foreach ($data as $d) {
                                    //table kategoori
                                    $kat = $db->select_data("album", $where = array("id_album" => $d['id_album']));
                                    echo"<tr><td>$no</td><td>$kat[nm_album]</td><td>$d[nm_galeri]</td><td>$d[ket]</td>
                                         <td>
                                             <div class='btn-group'>
                                                 <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
                                                 <div class='dropdown-menu animated flipInX'>
                                                     <a class='dropdown-item' href='galeri-editgaleri-$d[id_galeri]'>Edit Data</a>
                                                     <div class='dropdown-divider'></div>
                                                     <a onclick=\"javascript:if(!(confirm('Anda Yakin?'))) return false;\" class='dropdown-item' href='aksi.php?page=galeri&a=hapusgaleri&namagambar=$d[gbr_galeri]&id=$d[id_galeri]'>Hapus Data</a>
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
}elseif((isset($_GET['ct'])!='')&&($_GET['ct']=='tambahgaleri')){
    ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Galeri</h4>
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
                                <a href="galeri">Galeri</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Galeri</li>
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
                        <h4 class="card-title">Tambah Galeri</h4>
                    </div>
                    <hr />
                    <form class="form-horizontal" action='aksi.php?page=galeri&a=tambahgaleri' method="POST" enctype="multipart/form-data" novalidate>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kat" class="col-sm-3 text-right control-label col-form-label">Album</label>
                                <div class="col-sm-5 controls">
                                    <select name="album" class="select2 form-control custom-select" style="width: 100%; height: 36px;">
                                        <?php
                                        $kat = $db->show_data("album");
                                        foreach ($kat as $k) {
                                            echo"<option value='$k[id_album]'>$k[nm_album]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Galeri</label>
                                <div class="col-sm-9 controls">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Galeri" required data-validation-required-message="This Field is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editor1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
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
}elseif((isset($_GET['ct'])!='')&&($_GET['ct']=='editgaleri')){
    $id = $_GET["id"];
    $where = array(
        "id_galeri" => $id
    );
    $e = $db->select_data("galeri",$where);
    ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Galeri</h4>
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
                                <a href="galeri">Galeri</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Galeri</li>
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
                        <h4 class="card-title">Edit Galeri</h4>
                    </div>
                    <hr />
                    <form class="form-horizontal" action='aksi.php?page=galeri&a=editgaleri' method="POST" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="id" value="<?php echo $e['id_galeri'];?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="album" class="col-sm-3 text-right control-label col-form-label">Album</label>
                                <div class="col-sm-5 controls">
                                    <select name="album" class="select2 form-control custom-select" style="width: 100%; height: 36px;">
                                        <?php
                                        $kat = $db->show_data("album");
                                        foreach ($kat as $k) {
                                            if($k['id_album']==$e['id_album'])
                                                echo"<option value='$k[id_album]' selected>$k[nm_album]</option>";
                                            else
                                                echo"<option value='$k[id_album]'>$k[nm_album]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Galeri</label>
                                <div class="col-sm-9 controls">
                                    <input type="text" value="<?php echo $e[nm_galeri];?>" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Galeri" required data-validation-required-message="This Field is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="editor1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="editor1" id="editor1" class="form-control">value="<?php echo $e[ket];?>"</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9 controls">
                                    <?php
                                    if($e['gambar']=='')
                                        echo"<img src='assets/images/place.jpg' widht='150' height='120'>";
                                    else
                                        echo"<img src='../gbr_galeri/$e[gbr_galeri]' width='150' height='120'>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fgambar" class="col-sm-3 text-right control-label col-form-label">Ganti Gambar</label>
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