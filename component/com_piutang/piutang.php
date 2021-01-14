<?php 
include '../../config/conn.php';
if ($_GET['aksi']==''){?>
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Data Piutang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <a  class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                  <div class="divider-dashed"></div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="50">No</th>
                          <th>Tanggal</th>
                          <th>Nama</th>
                          <th>Nominal</th>
                          <th>Keterangan</th>
                          <th width="110">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM piutang ORDER BY id_piutang DESC");
                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $row['tanggal'];?></td>
                          <td><?php echo $row['nama_piutang'];?></td>
                          <td><?php echo "Rp.".rupiah($row['nominal']);?></td>
                          <td><?php echo $row['keterangan'];?></td>
                          <td><a  class='open_modal btn  btn-default btn-xs' href="?module=<?php echo $_GET['module'];?>&aksi=edit&id=<?php echo encrypt($row[id_piutang]);?>"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a class="btn  btn-danger btn-xs"  onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo encrypt($row[id_piutang]);?>');"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan"  enctype="multipart/form-data" method="POST">
     
                    

                      <label for="nama">Nama Piutang * :</label>
                      <input type="text"  class="form-control" name="nama_piutang" required />

                      <label for="alamat">Nominal * :</label>
                      <input type="text"  class="form-control" autocomplete="off"  name="nominal"  required />

                      <label for="telephone">Keterangan :</label>  
                      <textarea class="form-control" name="keterangan" required autocomplete="off"  requerid  > </textarea> 
                      <input type="hidden" class="form-control " value="<?php echo date("Y-m-d");?>"   name="tanggal"  >
                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php  }elseif ($_GET['aksi'] == 'edit') {
  $idd= $_GET[id];
  $id = decrypt($idd);
  $query=mysqli_query($conn,"SELECT * FROM piutang WHERE id_piutang='$id'");
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
                    <form action="?module=piutang&aksi=simpan_edit"  enctype="multipart/form-data" method="POST">
                    <div class="row">
                    <div class="col-md-6">
                       <label for="nama">Nama Piutang * :</label>
                      <input type="hidden"  class="form-control" name="id" required value="<?php echo $r['id_piutang'];?>" />
                       <input type="text"  class="form-control" name="nama_piutang" required value="<?php echo $r['nama_piutang'];?>" />

                      <label for="alamat">Nominal * :</label>
                      <input type="text"  class="form-control" autocomplete="off"  name="nominal"  required value="<?php echo $r['nominal'];?>"/>

                      <label for="telephone">Keterangan :</label>  
                      <textarea class="form-control" name="keterangan" required autocomplete="off"  requerid  ><?php echo $r['keterangan'];?> </textarea> 
                      
                      </div>
                    
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button><br>
                      </div><br><br>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

<?php } elseif ($_GET['aksi'] == 'simpan'){
  $module = $_GET['module'];
  $tanggal = $_POST[tanggal];
  $tgl = date('Y-m-d', strtotime($tanggal));
  mysqli_query($conn,"INSERT INTO piutang(nama_piutang,
                                  nominal,
                                  keterangan,
                                  tanggal) VALUES('$_POST[nama_piutang]',
                                                 '$_POST[nominal]',
                                                 '$_POST[keterangan]',
                                                 '$_POST[tanggal]')");

  echo "<script language='javascript'>document.location='?module=".$module."';</script>";
  
  } elseif ($_GET['aksi'] == 'simpan_edit'){
  $module = $_GET['module'];
      mysqli_query($conn,"UPDATE piutang SET nama_piutang = '$_POST[nama_piutang]',
                                    nominal = '$_POST[nominal]',
                                    keterangan = '$_POST[keterangan]'
                                    WHERE id_piutang = '$_POST[id]'");

   echo "<script language='javascript'>document.location='?module=".$module."';</script>";

} elseif ($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $idd= $_GET[id];
  $id = decrypt($idd);
  $query=mysqli_query($conn,"Delete FROM piutang WHERE id_piutang='$id'");
  echo "<script language='javascript'>document.location='?module=".$module."';</script>";    
}?>


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