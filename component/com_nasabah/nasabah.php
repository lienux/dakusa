<?php 
include '../../config/conn.php';
?>

<?php 
if ($_SESSION['leveluser'] == 'admin'){ ?>
    <?php
    if ($_GET['aksi']==''){ ?>
    <div class="col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title" style="text-transform: capitalize;">
                            <h2 >Data Nasabah</h2>
                            <div class="clearfix"></div>
                        </div>
                        <a  class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd">
                            <i class="glyphicon glyphicon-plus"></i>
                            Tambah Nasabah
                        </a>
                        <div class="divider-dashed"></div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>ID Nasabah</th>
                                        <th>No Rekening</th>
                                        <th>Nama</th>
                                        <th>Nama Orangtua</th>
                                        <th>Saldo</th>
                                        <th width="110">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query=mysqli_query($conn,"SELECT * FROM nasabah ORDER BY id_nasabah DESC");
                                        while($row=mysqli_fetch_array($query)){
                                        $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row['id_nasabah'];?></td>
                                        <td><?php echo $row['no_rekening'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['orang_tua'];?></td>
                                        <td>Rp. <?php echo rupiah($row['saldo']);?></td>
                                        <td>
                                            <a  class='open_modal btn  btn-default btn-xs' href="?module=<?php echo $_GET['module'];?>&aksi=edit&id=<?php echo $row[id_nasabah];?>">
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </a>
                                            <!-- <a class="btn  btn-danger btn-xs"  onclick="confirm_modal('?module=<?php //echo $_GET['module'];?>&aksi=hapus&id=<?php //echo encrypt($row[id_nasabah]);?>');">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                Hapus
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php } ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan"  enctype="multipart/form-data" method="POST">
                        <?php
                            $query = "SELECT max(id_nasabah) as maxID FROM nasabah ";
                            $hasil = mysqli_query($conn,$query);
                            $data = @mysqli_fetch_array($hasil);
                            $idMax = $data['maxID'];

                            $noUrut = (int) substr($idMax, 1, 9);
                            $noUrut++;
                            $char = "N";
                            $newID = $char.sprintf("%06s", $noUrut); 

                            $tahun = date('Y');

                            $query_2 = "SELECT max(no_rekening) as maxREK FROM nasabah ";
                            $hasil_2 = mysqli_query($conn,$query_2);
                            $data_2 = @mysqli_fetch_array($hasil_2);
                            $idMax_2 = $data_2['maxREK'];

                            $noUrut_2 = (int) substr($idMax_2, 6, 9);
                            $noUrut_2++;
                            $char_2 = $tahun;
                            $newID_2 = $char_2.sprintf("%06s", $noUrut_2);  
                        ?>
                        <label for="id">ID Nasabah * :</label>
                        <input type="text"  class="form-control" disabled value="<?php echo $newID;?>"  />
                        <input type="hidden"  class="form-control" name="id" value="<?php echo $newID;?>"  />

                        <label for="nama">No Rekening * :</label>
                        <input type="text"  class="form-control"  disabled value="<?php echo $newID_2;?>" />
                        <input type="hidden"  class="form-control" autocomplete="off"  name="no_rekening"  value="<?php echo $newID_2;?>" />

                        <label for="alamat">Nama * :</label>
                        <input type="text"  class="form-control" autocomplete="off"  name="nama"  required />

                        <label for="telephone">Alamat * :</label>  
                        <textarea class="form-control" name="alamat" autocomplete="off"  requerid  > </textarea>

                        <label >Tempat Lahir * :</label>
                        <input type="text"  class="form-control"  autocomplete="off" name="tempat_lahir"  required />

                        <label f>Tanggal Lahir * :</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </div>
                            <input type="text" class="form-control " value="<?php echo date("d-m-Y");?>" id="tanggal"   name="tanggal_lahir">
                        </div>

                        <label >Nama Panggilan :</label>
                        <input type="text"  class="form-control" autocomplete="off" name="orang_tua"  required />

                        <label>Status *:</label>
                        <select id="heard" class="form-control" required name="status">
                            <option value="">- Pilih Status -</option>
                            <option value="Y">Aktif</option>
                            <option value="T">Tidak Aktif</option>
                        </select>
                        <br>                          
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php }
    elseif ($_GET['aksi'] == 'edit') {
        $idd= $_GET[id];
        $id = $idd;
        $query=mysqli_query($conn,"SELECT * FROM nasabah WHERE id_nasabah='$id'");
        $r=mysqli_fetch_array($query);
        $tgl = date('d-m-Y', strtotime($r[tanggal_lahir]));
    ?>

    <div class="col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title" style="text-transform: capitalize;">
                        <h2 >Edit Data <?php echo $_GET['module'];?></h2>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        <form action="?module=nasabah&aksi=simpan_edit"  enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id">ID Nasabah :</label>
                                    <input type="text"  class="form-control" disabled value="<?php echo $r['id_nasabah'];?>"  />
                                    <input type="hidden"  class="form-control" name="id" value="<?php echo $r['id_nasabah'];?>"  />

                                    <label for="id">No Rekening :</label>
                                    <input type="text"  class="form-control" disabled value="<?php echo $r['no_rekening'];?>"  />
                                    <input type="hidden"  class="form-control" name="no_rekening" value="<?php echo $r['no_rekening'];?>"  />

                   
                                    <label for="nama">Nama :</label>
                                    <input type="text"  class="form-control" name="nama"  value="<?php echo $r['nama'];?>" />

                                    <label for="nama">Tempat Lahir :</label>
                                    <input type="text"  class="form-control" name="tempat_lahir"  value="<?php echo $r['tempat_lahir'];?>" />

                                    <label for="nama">Tanggal Lahir :</label>
                
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control " value="<?php echo $tgl;?>" id="tanggal"   name="tanggal_lahir"  >
                                    </div>

                                    <label>Kelas :</label>
                                    <select id="heard" class="form-control" required name="kelas">
                                        <?php 
                                        if ($r['id_kelas']==0){
                                        ?>
                                        <option value="0" selected>- Pilih Kelas -</option>
                                        <?php 
                                        }
                                        $query2  = "SELECT * FROM kelas where status='Y' ORDER BY nama_kelas";
                                        $tampil2 = mysqli_query($conn, $query2);
                                        while($w=mysqli_fetch_array($tampil2)){
                                        if ($r['id_kelas']==$w['id_kelas']){
                                        echo "<option value=\"$w[id_kelas]\" selected>$w[nama_kelas]</option>";
                                        }
                                        else{
                                            echo "<option value=\"$w[id_kelas]\">$w[nama_kelas]</option>";
                                            }
                                        }
                                        ?>
                                    </select>

                                    <label>Username :</label>
                                    <input type="text"  class="form-control" name="username" disabled value="<?php echo $r['username'];?>" />

                                    
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Password :</label>
                                    <input type="password"  class="form-control" disabled value="<?php echo $r['nama'];?>" />

                                    <label>Ganti Password :</label>
                                    <input type="password"  class="form-control" name="password"   />
                                    <p>*) Kosongkan apabila password tidak diganti</p>

                                    <label>Alamat :</label>
                                    <textarea class="form-control" name="alamat" requerid  ><?php echo $r['alamat'];?></textarea>

                                    <label>Nama Orangtua :</label>
                                    <input type="text"  class="form-control" name="orang_tua"  value="<?php echo $r['orang_tua'];?>" />

                                    <label>No. HP :</label>
                                    <input type="text"  class="form-control" name="txtHP"  value="<?php echo $r['hp'];?>" />

                                    <label>Email :</label>
                                    <input type="text"  class="form-control" name="txtEmail"  value="<?php echo $r['email'];?>" />

                                    <label>Status :</label>
                                    <select id="heard" class="form-control" required name="status">
                                        <?php if ($r[status] == 'Y'){?>
                                        <option value=Y selected >Aktif</option>
                                        <option value=N >Tidak Aktif</option>
                                         <?php }else{?>
                                        <option value=Y  >Aktif</option>
                                        <option value=N selected >Tidak Aktif</option>
                                         <?php }?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="ln_solid"></div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Simpan
                                    </button>
                                    <br>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php }
    elseif ($_GET['aksi'] == 'simpan'){
        $module = $_GET['module'];
        $tanggal = $_POST[tanggal_lahir];
        $tgl = date('Y-m-d', strtotime($tanggal));
        $password   = md5('1924');
        $level      = 'nasabah';
        mysqli_query($conn,"INSERT INTO nasabah SET id_nasabah      = '$_POST[id]',
                                                    no_rekening     = '$_POST[no_rekening]',
                                                    username        = '$_POST[no_rekening]',
                                                    password        = '$password',
                                                    nama            = '$_POST[nama]',
                                                    alamat          = '$_POST[alamat]',
                                                    tempat_lahir    = '$_POST[tempat_lahir]',
                                                    tanggal_lahir   = '$tgl',
                                                    orang_tua       = '$_POST[orang_tua]',
                                                    level           = '$level',
                                                    Status          = '$_POST[status]'");

        echo "<script language='javascript'>document.location='?module=".$module."';</script>";
      
    }

    elseif ($_GET['aksi'] == 'simpan_edit'){
        $module = $_GET['module'];
        $tanggal = $_POST[tanggal_lahir];
        $password   = md5($_POST[password]);
        $tgl = date('Y-m-d', strtotime($tanggal));
        if (empty($_POST['password'])) {
        mysqli_query($conn,"UPDATE nasabah SET nama = '$_POST[nama]',
                                        id_kelas = '$_POST[kelas]',
                                        alamat = '$_POST[alamat]',
                                        tempat_lahir = '$_POST[tempat_lahir]',
                                        tanggal_lahir = '$tgl',
                                        orang_tua = '$_POST[orang_tua]',
                                        hp = '$_POST[txtHP]',
                                        email = '$_POST[txtEmail]',
                                        status = '$_POST[status]' 
                                        WHERE id_nasabah = '$_POST[id]'");

        }else{

        mysqli_query($conn,"UPDATE nasabah SET nama = '$_POST[nama]',
                                        password = '$password',
                                        id_kelas = '$_POST[kelas]',
                                        alamat = '$_POST[alamat]',
                                        tempat_lahir = '$_POST[tempat_lahir]',
                                        tanggal_lahir = '$tgl',
                                        orang_tua = '$_POST[orang_tua]',
                                        hp = '$_POST[txtHP]',
                                        email = '$_POST[txtEmail]',
                                        status = '$_POST[status]' 
                                        WHERE id_nasabah = '$_POST[id]'");

        }
        echo "<script language='javascript'>document.location='?module=".$module."';</script>";

    }

    elseif ($_GET['aksi'] == 'hapus'){
        $module = $_GET['module'];  
        $idd= $_GET[id];
        $id = decrypt($idd);
        $query=mysqli_query($conn,"Delete FROM nasabah WHERE id_nasabah='$id'");
        echo "<script language='javascript'>document.location='?module=".$module."';</script>"; 
    ?>

    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini ?</h4>
                </div>     
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <?php }


    elseif ($_GET['aksi'] == 'transaksi') { ?>
        <div class="col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title" style="text-transform: capitalize;">
                            <h2 >Data Nasabah</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="25">No</th>
                                        <th>No Rekening</th>
                                        <th>Nama</th>
                                        <th>Saldo</th>
                                        <th>Emoney</th>
                                        <th width="230">Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query=mysqli_query($conn,"SELECT * FROM nasabah ORDER BY no_rekening ASC");
                                        while($row=mysqli_fetch_array($query)){
                                        $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row['no_rekening'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td>Rp. <?php echo rupiah($row['saldo']);?></td>
                                        <td>Rp. <?php echo rupiah($row['emoney']);?></td>
                                        <td>
                                            <a  class='btn  btn-success btn-xs' href="?module=setoran_tunai&id=<?php echo $row[no_rekening];?>">
                                                <i class="glyphicon glyphicon-save-file"></i>
                                                Setoran
                                            </a>
                                            <a  class="btn btn-danger btn-xs" href="?module=penarikan&id=<?php echo $row[no_rekening];?>">
                                                <i class="glyphicon glyphicon-open-file"></i> Penarikan
                                            </a>
                                            <a  class="btn btn-danger btn-xs" href="?module=topupkantin&id=<?php echo $row[no_rekening];?>">
                                                <i class="fa fa-plus"></i> emoney
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } }


elseif ($_GET['aksi'] == '4qX1qG2SaXOn0rzXqtve9Mh2FzAQmLqrj4ddTgiVVLg=') { ?>
    <div class="col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title" style="text-transform: capitalize;">
                        <h2 >Data Nasabah</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="25">No</th>
                                    <th>No Rekening</th>
                                    <th>Nama</th>                                    
                                    <th>Saldo Kantin</th>
                                    <th width="230">Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    $query=mysqli_query($conn,"SELECT * FROM nasabah ORDER BY id_nasabah DESC");
                                    while($row=mysqli_fetch_array($query)){
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row['no_rekening'];?></td>
                                    <td><?php echo $row['nama'];?></td>
                                    <td>Rp. <?php echo rupiah($row['emoney']);?></td>
                                    <td align="right">
                                        <a  class="btn btn-danger btn-xs" href="?module=penarikan&id=<?php echo $row[no_rekening];?>">
                                            <i class="glyphicon glyphicon-open-file"></i> Penarikan
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }

else{
    echo "Ciiyyeeeeeeeee..... yang kepPOOOOO ketahuan.....";
}?>



