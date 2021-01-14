<?php session_start();?>

<?php if ($_SESSION['leveluser'] == 'admin'){ ?>
    <?php 
        include '../../config/conn.php';         
        $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi");
        $row_saldo=mysqli_fetch_array($query_saldo);
        $saldo_keseluruhan= $row_saldo['jumlah_debit'] - $row_saldo['jumlah_kredit'];
    ?>

    <?php
        $query = "SELECT max(id_transaksi) as maxID FROM transaksi ";
        $hasil = mysqli_query($conn,$query);
        $data = @mysqli_fetch_array($hasil);
        $idMax = $data['maxID'];

        $noUrut = (int) substr($idMax, 1, 9);
        $noUrut++;
        $char = "T";
        $newID = $char.sprintf("%04s", $noUrut); 

        $id= $_GET['id'];
        $query=mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$id'");
        $r=mysqli_fetch_array($query);
        $saldo=$r['saldo'];
        $emoney=$r['emoney'];
    ?>

    <!-- page content -->
    <div class="col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title" style="text-transform: capitalize;">
                            <h2 >Penarikan Tunai</h2>                    
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="?module=transaksi_aksi&act=penarikan&id=<?php echo $r[no_rekening];?>"  enctype="multipart/form-data" method="POST" >
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="id">ID Transaksi :</label>
                                        <input type="text"  class="form-control" disabled value="<?php echo $newID;?>"  />
                                        <input type="hidden"  class="form-control" name="txtIDtrans" value="<?php echo $newID;?>"  />


                                        <label for="nama">Nomor Rekening :</label>
                                        <input type="hidden"  class="form-control" name="txtIDnasabah" value="<?php echo $r['id_nasabah'];?>"  />
                                        <input type="text" disabled class="form-control"  value="<?php echo $r['no_rekening'];?>" />

                                        <label for="alamat">Nama :</label>
                                        <input class="form-control" disabled  value="<?php echo $r['nama'];?>"  >

                                        <label for="telephone">Tempat, Tanggal Lahir :</label>
                                        <input type="text" disabled class="form-control" value="<?php echo $r['tempat_lahir'];?>, <?php echo $r['tanggal_lahir'];?>"  />  
                                        <input type="hidden" class="form-control" name="tanggal" value="<?php echo date('Y-m-d');?>"   />


                                        <label for="username">Alamat :</label>
                                        <input type="text" disabled class="form-control"  value="<?php echo $r['alamat'];?>" disabled /> 

                                        <label for="password">Orang Tua :</label>
                                        <input type="text"  class="form-control"  value="<?php echo $r['orang_tua'];?>" disabled  />
                                        <br>
                                    </div>

                                    <div class="col-md-6">
                                        <label>
                                            <h3><small>Saldo : </small>Rp. <?php echo rupiah($saldo);?></h3>
                                        </label>                                        
                                        <input type="hidden" name="txtSaldo" value="<?php echo $saldo;?>"><br>

                                        <label>
                                            <h3><small>Saldo di Kantin : </small>Rp. <?php echo rupiah($emoney);?></h3>
                                        </label>
                                        <input type="hidden" name="txtSaldoKantin" value="<?php echo $emoney;?>"><br>
                                      
                                        <label>Jumlah Penarikan :</label>
                                        <div ng-app="myApp" ng-controller="myCtrl">
                                            <h3>{{jml | currency : "Rp. "}}</h3>
                                            <input ng-model="jml" type="text" class="form-control" name="txtJml" required />
                                        </div>                                        

                                        <label for="alamat">Keterangan :</label>
                                        <textarea class="form-control" name="txtKeterangan" ></textarea>

                                        <br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>
                                                Batal
                                            </button>
                                            
                                            <button type="submit" name="tunai" class="btn btn-success btn-sm">
                                                Tarik Saldo
                                            </button>
                                            <br>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>





<?php if ($_SESSION['leveluser'] == 'nasabah'){ ?>
    Yang Kepooooooooo.........
<?php } ?>





<?php if ($_SESSION['leveluser'] == 'kantin'){ ?>
    <?php 
        include '../../config/conn.php';         
        $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi");
        $row_saldo=mysqli_fetch_array($query_saldo);
        $saldo_keseluruhan= $row_saldo['jumlah_debit'] - $row_saldo['jumlah_kredit'];
    
        $id=$_POST['no_rekening'];
        $query=mysqli_query($conn,"SELECT * FROM nasabah WHERE no_rekening='$id'");
        $r=mysqli_fetch_array($query);
        $emoney=$r['emoney'];
    ?>

    <!-- page content -->
    <div class="col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title" style="text-transform: capitalize;">
                            <h2 >Transaksi</h2>                    
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="?module=transaksi_aksi&act=penarikan_k&id=<?php echo $r[no_rekening];?>"  enctype="multipart/form-data" method="POST" >
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="nama">Nomor Rekening :</label>
                                        <input type="hidden"  class="form-control" name="txtIDnasabah" value="<?php echo $r['id_nasabah'];?>"  />
                                        <input type="text" disabled class="form-control"  value="<?php echo $r['no_rekening'];?>" />

                                        <label for="alamat">Nama :</label>
                                        <input class="form-control" disabled  value="<?php echo $r['nama'];?>"  >

                                        <label for="telephone">Tempat, Tanggal Lahir :</label>
                                        <input type="text" disabled class="form-control" value="<?php echo $r['tempat_lahir'];?>, <?php echo $r['tanggal_lahir'];?>"  />  
                                        <input type="hidden" class="form-control" name="tanggal" value="<?php echo date('Y-m-d');?>"   />


                                        <label for="username">Alamat :</label>
                                        <input type="text" disabled class="form-control"  value="<?php echo $r['alamat'];?>" disabled /> 

                                        <label for="password">Orang Tua :</label>
                                        <input type="text"  class="form-control"  value="<?php echo $r['orang_tua'];?>" disabled  />
                                        <br>
                                    </div>

                                    <div class="col-md-6">                                        
                                        <label>
                                            <h3><small>Saldo E-money : </small>Rp. <?php echo rupiah($emoney);?></h3>
                                        </label>
                                        <input type="hidden" name="txtSaldoKantin" value="<?php echo $emoney;?>"><br>
                                      
                                        <label>Jumlah Transaksi :</label>
                                        <div ng-app="myApp" ng-controller="myCtrl">
                                            <h3>{{jml | currency : "Rp. "}}</h3>
                                            <input ng-model="jml" type="text" class="form-control" name="txtJml" required />
                                        </div>                         
                                        
                                        <input type="hidden" name="txtKeterangan" value="Jajan di kantin">

                                        <br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>Batal</button>
                                            <?php 
                                                if ($emoney <= 0) {
                                                    echo "Santri tidak bisa transaksi jika E-money mereka 0 (nol).!";
                                                    } 
                                            
                                                else { ?>
                                                    <button type="submit" name="tunai" class="btn btn-success btn-sm">Tarik Saldo</button>
                                            <?php } ?>
                                            <br>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




