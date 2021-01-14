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
                    <h2 >Data Setting Kelas <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                 

                 <a  class="btn btn-success btn-sm" href="?module=<?php echo $_GET['module'];?>&aksi=tambah"><i class="glyphicon glyphicon-plus"></i> Tambah</a>

                  <div class="divider-dashed"></div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="50">No</th>
                          <th>Kelas</th>
                          <th width="220">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM setting_kelas a JOIN kelas b ON a.id_kelas=b.id_kelas   GROUP BY a.id_kelas ORDER BY id_setting asc");
                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $row['nama_kelas'];?></td>
                          <td>
                            <a  class='open_modal btn  btn-default btn-xs' href="?module=<?php echo $_GET['module'];?>&aksi=detail&id=<?php echo encrypt($row[id_kelas]);?>"><i class="glyphicon glyphicon-search"></i> Detail Nasabah</a> 
                           
                            <a class="btn  btn-danger btn-xs"  onclick="confirm_modal('?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo encrypt($row[id_kelas]);?>');"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
              <div class="col-md-12">
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
    $nasabah = $_POST['id_nasabah'];
    $jumlah_dipilih = count($nasabah);
 
    for($x=0;$x<$jumlah_dipilih;$x++){

    mysqli_query($conn,"INSERT INTO setting_kelas(id_kelas,id_nasabah) VALUES('$_POST[id_kelas]','$nasabah[$x]')");

    }


    echo "<script language='javascript'>document.location='?module=".$module."';</script>";
  }
  elseif ($_GET['aksi'] == 'simpan_edit') {
    $module = $_GET['module'];
    mysqli_query($conn,"UPDATE kelas SET nama_kelas = '$_POST[kelas]', status ='$_POST[status]' WHERE id_kelas = '$_POST[id]'");
    echo "<script language='javascript'>document.location='?module=".$module."';</script>";
  }
  elseif ($_GET['aksi'] == 'tambah'){?>
  
   <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Tambah  Setting Kelas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan"  enctype="multipart/form-data" method="POST">
                    <div class="row">
                      

                      <label for="nama">Kelas :</label>
                      <select id="heard" class="form-control" required name="id_kelas">
                            <option value=0 selected>- Pilih Kelas -</option>
                            <?php
                            $query  = mysqli_query($conn,"SELECT * FROM kelas WHERE status='Y' ORDER BY nama_kelas");
                            while($r=mysqli_fetch_array($query)){
                              echo "<option value=\"$r[id_kelas]\">$r[nama_kelas]</option>";
                            }
                            ?>
                        </select>
                      <br>
                      <label for="nama">Pilih Nasabah :</label>
                      <table  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="50">#</th>
                          <th width="50">No</th>
                          <th>ID Nasabah</th>
                          <th>No Rekening</th>
                          <th>Nama</th>
                          <th>Orang Tua</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $no = 0;
                          $query2=mysqli_query($conn,"SELECT * FROM nasabah WHERE NOT EXISTS (SELECT * FROM setting_kelas WHERE nasabah.id_nasabah = setting_kelas.id_nasabah)");
                          while($row2=mysqli_fetch_array($query2)){
                          $no++;
                      ?>
                        <tr>
                          <td><input  type="checkbox" name="id_nasabah[]"  value="<?php echo $row2['id_nasabah'];?>" ></td>
                          <td><?php echo $no;?></td>
                          <td>
                            <?php echo $row2['id_nasabah'];?>
                           
                          </td>
                          <td><?php echo $row2['no_rekening'];?></td>
                          <td><?php echo $row2['nama'];?></td>
                          <td><?php echo $row2['orang_tua'];?></td>
                         
                        </tr>
                      <?php } ?>  
                      </tbody>
                    </table>
                      

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

 
<?php  }elseif ($_GET['aksi'] == 'detail') {?>
<div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <?php
                      $idd= $_GET[id];
                      $id = decrypt($idd);

                      $query=mysqli_query($conn,"SELECT * FROM kelas WHERE id_kelas='$id'");
                      $r=mysqli_fetch_array($query);
                    ?>
                    <h2 >Data Setting Kelas <?php echo $r['nama_kelas'];?> </i> <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                 <a  class="btn btn-success btn-sm" href="?module=<?php echo $_GET['module'];?>"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                  <div class="divider-dashed"></div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="50">No</th>
                          <th>ID Nasabah</th>
                          <th>No Rekening</th>
                          <th>Nama</th>
                          <th>Orang Tua</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $idd= $_GET[id];
                          $id = decrypt($idd);
                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM setting_kelas a JOIN nasabah b ON a.id_nasabah=b.id_nasabah WHERE id_kelas='$id' ");
                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $row['id_nasabah'];?></td>
                          <td><?php echo $row['no_rekening'];?></td>
                          <td><?php echo $row['nama'];?></td>
                          <td><?php echo $row['orang_tua'];?></td>
                          
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

<?php } elseif ($_GET['aksi'] == 'hapus') {
  $module = $_GET['module'];  
  $idd= $_GET[id];
  $id = decrypt($idd);
  $query=mysqli_query($conn,"Delete FROM setting_kelas WHERE id_kelas='$id'");
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


