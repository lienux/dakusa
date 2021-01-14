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
                        
                        <!-- <div class="divider-dashed" style="padding: 40px;"></div> -->
                        <?php 
                            $query_pegawai=mysqli_query($conn,"SELECT *  FROM pegawai");
                            $num_pegawai = mysqli_num_rows($query_pegawai);
                            $query_nasabah=mysqli_query($conn,"SELECT *  FROM nasabah");
                            $num_nasabah = mysqli_num_rows($query_nasabah);
                        ?>

                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1><?php echo $num_nasabah;?></h1>
                                <p>Data Santri</p>                           
                            </div>        
                        </div>

                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_tabungan);?></h1>
                                <p>Jumlah Saldo</p>                            
                            </div>        
                        </div>

                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1><?php echo $num_pegawai;?></h1>
                                <p>Total Debit</p>         
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1><?php echo $num_pegawai;?></h1>
                                <p>Total Kredit</p>         
                            </div>
                        </div>                        

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
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
                        
                    </div>
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
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo);?></h1>
                                <p><h4>Total Saldo </h4></p>               
                            </div>              
                        </div>

                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_kantin);?></h1>
                                <p><h4>Total Transaksi </h4></p>               
                            </div>              
                        </div>                        
                    </div>
                    
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
