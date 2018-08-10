<?php
if((!isset($_GET['ct']))||(isset($_GET['ct'])=='')){
    ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Kategori</h4>
                <div class="d-flex align-items-center"></div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="home">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Kategori Aktivitas</li>
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
                        <h4 class="card-title">Data Kategori</h4>
                        <a href="kataktivitas-tambahkataktivitas" class="btn btn-info btn-rounded"><i class="fa fa-plus"></i> Tambah Data Kategori</a><br /><br />
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aktif</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $data = $db->show_data("kat_aktivitas");
                                foreach ($data as $d) {
                                    echo"<tr><td>$no</td><td>$d[nm_kat_aktivitas]</td><td>$d[aktif]</td>
                                         <td>
                                             <div class='btn-group'>
                                                 <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
                                                 <div class='dropdown-menu animated flipInX'>
                                                     <a class='dropdown-item' href='kataktivitas-editkataktivitas-$d[id_kat_aktivitas]'>Edit Data</a>
                                                     <div class='dropdown-divider'></div>
                                                     <a onclick=\"javascript:if(!(confirm('Anda Yakin?'))) return false;\" class='dropdown-item' href='aksi.php?page=kataktivitas&a=hapuskataktivitas&id=$d[id_kat_aktivitas]'>Hapus Data</a>
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
}elseif((isset($_GET['ct'])!='')&&($_GET['ct']=='tambahkataktivitas')){
    ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Kategori</h4>
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
                                <a href="kataktivitas">Kategori Aktivitas</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
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
                        <h4 class="card-title">Tambah Kategori</h4>
                    </div>
                    <hr />
                    <form class="form-horizontal" action='aksi.php?page=kataktivitas&a=tambahkataktivitas' method="POST" novalidate>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Kategori</label>
                                <div class="col-sm-5 controls">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kategori Aktivitas" required data-validation-required-message="This Field is required">
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
}elseif((isset($_GET['ct'])!='')&&($_GET['ct']=='editkataktivitas')){
    $id = $_GET["id"];
    $where = array(
        "id_kat_aktivitas" => $id
    );
    $e = $db->select_data("kat_aktivitas",$where);
    ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Kategori</h4>
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
                                <a href="kataktivitas">Kategori Aktivitas</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
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
                        <h4 class="card-title">Edit Kategoori</h4>
                    </div>
                    <hr />
                    <form class="form-horizontal" action='aksi.php?page=kataktivitas&a=editkataktivitas' method="POST" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="id" value="<?php echo $e['id_kat_aktivitas'];?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Kategori</label>
                                <div class="col-sm-5 controls">
                                    <input type="text" value="<?php echo $e['nm_kat_aktivitas'];?>" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kategori Aktivitas" required data-validation-required-message="This Field is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inlineFormCustomSelect" class="col-sm-3 text-right control-label col-form-label">Aktif</label>
                                <div class="col-sm-3 controls">
                                    <select name="aktif" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <?php
                                        if($e['aktif']=='Y')
                                            echo"<option value='Y' selected>Ya</option><option value='N'>Tidak</option>";
                                        else
                                            echo"<option value='Y'>Ya</option><option value='N' selected>Tidak</option>";
                                        ?>
                                    </select>
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