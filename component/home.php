<!-- page content -->
<div class="col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title" style="text-transform: capitalize;">
                        <h2 >Selamat datang, <?php echo $_SESSION['namalengkap'];?> (<?php echo $_SESSION['leveluser'];?>)  No Rek: <?php echo $_SESSION['norek'];?></h2>            
                        <div class="clearfix"></div>
                    </div>                    

                    <?php
                    if ($_SESSION['leveluser'] == 'admin'){
                    ?>

                    <?php
                        session_start();
                    
                        $query_total=mysqli_query($conn,"SELECT * FROM transaksi_k_jml");
                        $total_tr=mysqli_fetch_array($query_total);
                    
                        $query_saldo=mysqli_query($conn,"SELECT SUM(saldo) as jml_saldo FROM nasabah");
                        $row_saldo=mysqli_fetch_array($query_saldo);
                        $saldo_tabungan= $row_saldo['jml_saldo'];

                        $query_emoney=mysqli_query($conn,"SELECT SUM(emoney) as jml_emoney FROM nasabah");
                        $row_emoney=mysqli_fetch_array($query_emoney);
                        $saldo_emoney= $row_emoney['jml_emoney'];

                        $qsaldok=mysqli_query($conn,"SELECT SUM(saldo_kantin) as jumlah_saldok FROM nasabah");
                        $row_saldok=mysqli_fetch_array($qsaldok);
                        $saldo_kantin= $row_saldok['jumlah_saldok'];

                        $qtopup=mysqli_query($conn,"SELECT SUM(jml) as jml_topup FROM topup");
                        $row_topup=mysqli_fetch_array($qtopup);
                        $jmltopup= $row_topup['jml_topup'];
                    ?>

                    <div class="x_content" style="padding: 20px; text-align: center;  ">
                        
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_tabungan+$saldo_emoney);?></h1>
                                <p>Jumlah Saldo Tabungan + Saldo E-money</p>               
                            </div>              
                        </div>

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="text-success tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_tabungan);?></h1>
                                <p>Jumlah Saldo Tabungan</p>               
                            </div>              
                        </div>

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="text-warning tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_emoney);?></h1>
                                <p>Jumlah Saldo E-money</p>               
                            </div>              
                        </div>

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="text-danger tile-stats">
                                <h2>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Belum disetor ke kantin</td>
                                        <td>Siap disetor ke kantin</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Rp. <?php echo rupiah($total_tr['total']);?></td>
                                        <td>Rp. <?php echo rupiah($total_tr['bayar']);?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#editBayar" data-toggle="modal">
                                                <button class="btn btn-xs btn-danger">
                                                    <i class="ace-icon fa fa-edit bigger-120"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                </h2>          
                            </div>                         

                            <!-- Modal -->
                            <div class="modal fade" id="editBayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-left" id="myModalLabel">Input Jumlah Setoran</h4>
                                        </div>
                                        <div class="modal-body">          
                                            <form action="?module=homeaksi&act=simpan" class="form-horizontal form-label-left" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jumlah Setoran : </label>
                                                <div class="col-sm-7">
                                                    <div ng-app="myApp" ng-controller="myCtrl">
                                                        <h3 align="left">{{jml | currency : "Rp. "}}</h3>
                                                        <input type="text" ng-model="jml" value="<?php echo $total_tr['bayar'];?>" class="form-control" placeholder="Tulis jumlah uang yg akan disetor" required name="txtBayar" autofocus />

                                                        <input type="hidden" name="txtTotal" value="<?php echo $total_tr['total'];?>">
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="modal-footer">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-save"></i>
                                                        Simpan
                                                    </button>
                                                </span>
                                            </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /modal -->                                          
                        </div>

                        <div class="divider-dashed" style="padding: 40px;"></div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <?php 
                                    $query_pegawai=mysqli_query($conn,"SELECT *  FROM pegawai");
                                    $num_pegawai = mysqli_num_rows($query_pegawai);
                                    $query_nasabah=mysqli_query($conn,"SELECT *  FROM nasabah");
                                    $num_nasabah = mysqli_num_rows($query_nasabah);
                                    ?>
                                    <div class="icon"></div>
                                    <h1><?php echo $num_pegawai;?></h1>
                                    <p>Data Pegawai</p>         
                                </div>
                            </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1><?php echo $num_nasabah;?></h1>
                                <p>Data Nasabah</p>                           
                            </div>        
                        </div>

                    </div>
                    <?php } ?>





                    <?php                    
                    if ($_SESSION['leveluser'] == 'kantin'){
                    
                    $query_tr=mysqli_query($conn,"SELECT * FROM transaksi_k_jml");
                    $total_tr=mysqli_fetch_array($query_tr);

                    ?>

                    <div class="x_content" style="padding: 20px; text-align: center;  ">
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="text-danger tile-stats">
                                <div class="icon"></div>
                                <h2>Rp. <?php echo rupiah($total_tr['total']);?></h2>
                                <p><h4>Total Transaksi</h4></p>
                                <?php 
                                $total = $total_tr['total'];
                                $bayar = $total_tr['bayar'];
                                $bayarRp = rupiah($total_tr['bayar']);
                                if ($bayar > 0) {
                                    echo "
                                    <a class='btn btn-success btn-sm' data-toggle='modal' data-target='#terima' data-toggle='modal'>
                                        <i class='fa fa-money'></i>
                                        TERIMA UANG Rp. $bayarRp DARI TOTAL TRANSAKSI ?
                                    </a>";} 
                                ?>                                              
                            </div>            
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="terima" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-left" id="myModalLabel">Terima Uang</h4>
                                </div>
                                <div class="modal-body">          
                                    <form action="?module=homeaksi&act=terima" class="form-horizontal form-label-left" method="POST">
                                    <div class="form-group">
                                        <label class="col-sm-7 control-label " for="form-field-1-1">Terima Uang <h1>Rp. <?php echo $bayarRp;?></h1></label>
                                    </div> 
                                    <input type="hidden" name="txtTotal" value="<?php echo $total;?>">
                                    <input type="hidden" name="txtBayar" value="<?php echo $bayar;?>">
                                    <div class="modal-footer">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="ace-icon fa fa-floppy-o bigger-120"></i>
                                            Terima
                                        </button>
                                        <a href="./" class="btn btn-sm btn-danger">
                                            <i class="ace-icon fa fa-times bigger-120"></i>
                                            Batal
                                        </a>
                                        
                                    </div>
                                    </form>                      
                                </div>
                            </div>
                        </div>
                    </div> <!-- /modal -->
                    <?php } ?>
                    








                    <!-- Jika Level Adalah Nasabah -->
                    <?php
                        if ($_SESSION['leveluser'] == 'nasabah'){
                    ?>

                    <?php
                    include '../../config/conn.php';
                    $idnasabah = $_SESSION['nasabah'];
                    $query=mysqli_query($conn,"SELECT * FROM nasabah WHERE id_nasabah='$idnasabah'");
                    $r=mysqli_fetch_array($query);
                    $saldo=$r['saldo'];
                    $saldo_kantin=$r['saldo_kantin'];

                    $query_tiket=mysqli_query($conn,"SELECT jumlah_TF FROM tiket WHERE id_nasabah='$idnasabah'");                    
                    ?>
                    
                    <div class="x_content" style="padding: 20px; text-align: center;  ">
                        <?php 
                        while($tikett=mysqli_fetch_array($query_tiket)){
                        ?>
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="text-danger tile-stats">
                                <div class="icon"></div>
                                <p><h4>Tiket </h4></p>
                                <h2>Rp. <?php echo rupiah($tikett['jumlah_TF']);?></h2>
                                <p><h4>Belum diTransfer </h4></p>             
                            </div>              
                        </div>
                        <?php } ?>

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo);?></h1>
                                <p><h4>Saldo Keseluruhan </h4></p>               
                            </div>              
                        </div>

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_kantin);?></h1>
                                <p><h4>Saldo di Kantin </h4></p>               
                            </div>              
                        </div>                        
                    </div>
                    
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
