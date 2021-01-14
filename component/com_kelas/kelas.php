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
                    <h2 >Data <?php echo $_GET['module'];?> <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <a  class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                  <div class="divider-dashed"></div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="50">No</th>
                          <th>ID Kelas</th>
                          <th>Kelas</th>
                          <th>Status</th>
                          <th width="50">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM kelas ORDER BY id_kelas asc");
                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $row['id_kelas'];?> </td>
                          <td><?php echo $row['nama_kelas'];?></td>
                           <td><?php echo $row['status'];?></td>
                          <td>
                             <a  class='open_modal btn  btn-default btn-xs' href="?module=<?php echo $_GET['module'];?>&aksi=edit&id=<?php echo encrypt($row[id_kelas]);?>"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
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
      </div><br>


<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <!-- start form for validation -->
      <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan"  enctype="multipart/form-data" method="POST">
        <?php
          $query = "SELECT max(id_kelas) as maxID FROM kelas ";
          $hasil = mysqli_query($conn,$query);
          $data = @mysqli_fetch_array($hasil);
          $idMax = $data['maxID'];

          $noUrut = (int) substr($idMax, 1, 9);
          $noUrut++;
          $char = "K";
          $newID = $char.sprintf("%04s", $noUrut); 
        ?>
                      <label for="id">ID Kelas * :</label>
                      <input type="text"  class="form-control" disabled value="<?php echo $newID;?>"  />
                      <input type="hidden"  class="form-control" name="id" value="<?php echo $newID;?>"  />

                      <label for="nama">Kelas * :</label>
                      <input type="text"  class="form-control" name="kelas" autocomplete="off"   required /><br>
                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
      </div>
      </form>
      <!-- end form for validations --> 
    </div>
  </div>
</div>


<?php  }elseif ($_GET['aksi'] == 'edit') {
  $idd= $_GET[id];
  $id = decrypt($idd);

  $query=mysqli_query($conn,"SELECT * FROM kelas WHERE id_kelas='$id'");
  $r=mysqli_fetch_array($query);
?>
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Edit Data <?php echo $_GET['module'];?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan_edit"  enctype="multipart/form-data" method="POST">
                    <div class="row">
                      <label for="id">ID Kelas :</label>
                      <input type="text"  class="form-control" disabled value="<?php echo $r['id_kelas'];?>"  />
                      <input type="hidden"  class="form-control" name="id" value="<?php echo $r['id_kelas'];?>"  />

                      <label for="nama">Kelas :</label>
                      <input type="text"  class="form-control" name="kelas"  value="<?php echo $r['nama_kelas'];?>" />

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
                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button><br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>


<?php }elseif ($_GET['aksi'] == 'simpan') {
   $module = $_GET['module']; 
    mysqli_query($conn,"INSERT INTO kelas(id_kelas,nama_kelas) VALUES('$_POST[id]','$_POST[kelas]')");
    echo "<script language='javascript'>document.location='?module=".$module."';</script>";
  
  }elseif ($_GET['aksi'] == 'simpan_edit') {
    $module = $_GET['module'];
    mysqli_query($conn,"UPDATE kelas SET nama_kelas = '$_POST[kelas]', status ='$_POST[status]' WHERE id_kelas = '$_POST[id]'");
    echo "<script language='javascript'>document.location='?module=".$module."';</script>";
  }
?>


