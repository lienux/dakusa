<?php 
include '../../config/conn.php';
$aksi = "component/com_nasabah/nasabah_aksi.php";
if ($_GET['aksi']==''){?>
        <div class="col" role="main">
          <div class="">
          <div class="page-title">
              <div class="title_left">
                <h3>Catek Rekening</h3>
              </div>   
          </div>

          <div class="clearfix"></div><br>
          <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Berdasarkan Kelas <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form action="cetak.php" target="_blank"  enctype="multipart/form-data" method="GET">
                        <div class="well" style="overflow: auto">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                       
                        <label for="heard">Kelas :</label>
                         <input type="hidden"   name="p" value="3">
                        <select id="heard" class="form-control"  name="k">
                            <option value="0" selected>- Semua Kelas -</option>
                            <?php
                            $query  = mysqli_query($conn,"SELECT * FROM kelas WHERE status='Y' ORDER BY nama_kelas");
                            while($r=mysqli_fetch_array($query)){?>
                              <option value="<?php echo encrypt($r[id_kelas]);?>"><?php echo $r[nama_kelas];?></option>";
                            <?php 
                            }
                            ?>
                        </select>


                      </div>
                   
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        
                    </form>   
                         
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Berdasarkan Nasabah <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <form action="cetak.php" target="_blank"  enctype="multipart/form-data" method="GET">
                 
                       
                     <div class="well" style="overflow: auto">
                      
                     
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                         <label for="nama">No Rekening * :</label>
                         <input type="hidden"   name="p" value="4">
                      <input type="text"  class="typeahead form-control" placeholder="Tulis Nomor Rekening..." name="k" required autocomplete="off" />
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 8px;">
                      <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        
                    </form>     
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->





<?php  }elseif ($_GET['aksi'] == 'periode') {
  ?>
<!-- page content -->
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Laporan Transaksi Periode <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                   <form action="cetak.php" target="_blank" enctype="multipart/form-data" method="GET">
                    <input type="hidden"   name="p" value="1">
                   <input type="hidden"   name="t1" value="<?php echo encrypt($_POST[tanggal1]);?>">
                   <input type="hidden" name="t2" value="<?php echo encrypt($_POST[tanggal2]);?>">
                  <button type="submit"  class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</button>
                   <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                    </form>
                    
                  </div>
                  
                  <div class="x_content">
                    
                    <table id="datatable"  class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="20">Tipe</th>
                          <th>Tanggal</th>
                          <th>No Transaksi</th>
                          <th>Nasabah</th>
                          <th>Debit</th>
                          <th>Kredit</th>
                          <th width="110">Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $tanggal1 = $_POST[tanggal1];
                      $tanggal2 = $_POST[tanggal2];
                      $tgl1 = date('Y-m-d', strtotime($tanggal1 ));
                      $tgl2 = date('Y-m-d', strtotime($tanggal2 ));

                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM transaksi JOIN nasabah ON transaksi.id_nasabah=nasabah.id_nasabah WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') order by id_transaksi asc ");

                          $count = 2 ;
                          


                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>

                            <tr style="background: <?php if ($row['kredit'] == 0){ ?>
                          #defff1;
                          <?php }else{ ?>
                            #feeeea;
                            <?php } ?>">
                               <td><?php if ($row['kredit'] == 0){ ?><a  class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-save-file"></i></a> <?php }else{ ?> <a  class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-open-file"></i></a><?php } ?></td> 
                               <td><?php echo $row['tanggal'];?></td>
                               <td><?php echo $row['id_transaksi'];?></td> 
                               <td><?php echo $row['nama'];?></td>

                              <?php if($count==1){?>

                               <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                               <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                               <td>
                               <?php  
                               $debit=$row['debit'];
                               $saldo=$row['debit'];
                               echo "Rp.".rupiah($saldo);
                               ?>
                               </td>

                               <?php }else{
                                if($row['debit']!=0){ 
                                ?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $debit=$denit+$row['debit'];
                                 $saldo=$saldo+$row['debit'];
                                 echo "Rp.".rupiah($saldo);
                                 ?>


                               <?php }else{?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $kredit=$kredit+$row['kredit'];
                                  $saldo=$saldo-$row['kredit'];
                                 echo "Rp.".rupiah($saldo);
                               

                                     }


                               }
                               $count++
                               ?>

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
<!-- /page content -->

<?php 
} elseif ($_GET['aksi'] == 'nasabah'){
$id= $_POST['no_rekening'];
$query_rek=mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$id'");
$r=mysqli_fetch_array($query_rek);

?>

<!-- page content -->
        <div class="col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Laporan Transaksi Periode <small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                   <form action="cetak.php" target="_blank" enctype="multipart/form-data" method="GET">
                   <input type="hidden"   name="p" value="2">
                   <input type="hidden"   name="id" value="<?php echo encrypt($r[id_nasabah]);?>">
                   <input type="hidden"   name="t1" value="<?php echo encrypt($_POST[tanggal1]);?>">
                   <input type="hidden" name="t2" value="<?php echo encrypt($_POST[tanggal2]);?>">
                  <button type="submit"  class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</button>
                   <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                    </form>
                    
                  </div>
                  
                  <div class="x_content">
                    
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="20">Tipe</th>
                          <th>Tanggal</th>
                          <th>No Transaksi</th>
                          <th>Nasabah</th>
                          <th>Debit</th>
                          <th>Kredit</th>
                          <th width="110">Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $tanggal1 = $_POST[tanggal1];
                      $tanggal2 = $_POST[tanggal2];
                      $tgl1 = date('Y-m-d', strtotime($tanggal1 ));
                      $tgl2 = date('Y-m-d', strtotime($tanggal2 ));

                          $no = 0;
                          $query=mysqli_query($conn,"SELECT * FROM transaksi JOIN nasabah ON transaksi.id_nasabah=nasabah.id_nasabah WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') AND transaksi.id_nasabah= '$r[id_nasabah]' order by id_transaksi asc ");

                          $count = 2 ;
                          


                          while($row=mysqli_fetch_array($query)){
                          $no++;
                      ?>

                            <tr style="background: <?php if ($row['kredit'] == 0){ ?>
                          #defff1;
                          <?php }else{ ?>
                            #feeeea;
                            <?php } ?>">
                               <td><?php if ($row['kredit'] == 0){ ?><a  class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-save-file"></i></a> <?php }else{ ?> <a  class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-open-file"></i></a><?php } ?></td> 
                               <td><?php echo $row['tanggal'];?></td>
                               <td><?php echo $row['id_transaksi'];?></td> 
                               <td><?php echo $row['nama'];?></td>

                              <?php if($count==1){?>

                               <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                               <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                               <td>
                               <?php  
                               $debit=$row['debit'];
                               $saldo=$row['debit'];
                               echo "Rp.".rupiah($saldo);
                               ?>
                               </td>

                               <?php }else{
                                if($row['debit']!=0){ 
                                ?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $debit=$denit+$row['debit'];
                                 $saldo=$saldo+$row['debit'];
                                 echo "Rp.".rupiah($saldo);
                                 ?>


                               <?php }else{?>
                                <td><?php echo "Rp.".rupiah($row['debit']);?></td>
                                <td><?php echo "Rp.".rupiah($row['kredit']);?></td>
                                <td>
                                 <?php  
                                 $kredit=$kredit+$row['kredit'];
                                  $saldo=$saldo-$row['kredit'];
                                 echo "Rp.".rupiah($saldo);
                               

                                     }


                               }
                               $count++
                               ?>

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
<!-- /page content -->



<?php   } elseif ($_GET['aksi'] == 'simpan_edit'){

  $module = $_GET['module'];
   mysqli_query($conn,"UPDATE nasabah SET no_rekening = '$_POST[no_rekening]',
                                    nama = '$_POST[nama]',
                                    alamat = '$_POST[alamat]',
                                    tempat_lahir = '$_POST[tempat_lahir]',
                                    tanggal_lahir = '$_POST[tanggal_lahir]',
                                    orang_tua = '$_POST[orang_tua]',
                                    status = '$_POST[status]' 
                                    WHERE id_nasabah = '$_POST[id]'");
   echo "<script language='javascript'>
        document.location='?module=".$module."';
        </script>";

  } elseif ($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $idd= $_GET[id];

  $id = decrypt($idd);
  $query=mysqli_query($conn,"Delete FROM nasabah WHERE id_nasabah='$id'");
  echo "<script language='javascript'>document.location='?module=".$module."';</script>";    

  }?>



<!-- Modal Popup untuk delete--> 
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