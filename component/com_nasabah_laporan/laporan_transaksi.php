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
                    $query_piutang=mysqli_query($conn,"SELECT SUM(nominal) as jumlah_nominal FROM piutang");
                    $row_piutang=mysqli_fetch_array($query_piutang);
                    $piutang= $row_piutang['jumlah_nominal'] ;

                    $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi");
                    $row_saldo=mysqli_fetch_array($query_saldo);
                    $saldo_keseluruhan= ($row_saldo['jumlah_debit'] - $row_saldo['jumlah_kredit'])-$piutang;

                    $bulan = date('m');
                    $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi WHERE DATE_FORMAT((tanggal),'%m') like '%$bulan%'");
                    $saldo = mysqli_fetch_array($query_saldo);
                    $saldo_bulan= $saldo['jumlah_debit'] - $saldo['jumlah_kredit'];

                    $hari = date('d');
                    $query_hari=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi WHERE DATE_FORMAT((tanggal),'%d') like '%$hari%'");
                    $saldo_h = mysqli_fetch_array($query_hari);
                    $saldo_hari= $saldo_h['jumlah_debit'] - $saldo_h['jumlah_kredit'];
                    ?>

                    <div class="x_content" style="padding: 20px; text-align: center;  ">
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_keseluruhan);?></h1>
                                <p>Saldo Keseluruhan</p>               
                            </div>              
                        </div>
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_bulan);?></h1>
                                <p>Saldo Bulan ini</p>               
                            </div>              
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
                        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"></div>
                                <h1>Rp. <?php echo rupiah($saldo_hari);?></h1>
                                <p>Saldo Hari ini</p>                           
                            </div>                          
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
                    $query_saldo=mysqli_query($conn,"SELECT SUM(debit) as jumlah_debit, SUM(kredit) as jumlah_kredit FROM transaksi WHERE id_nasabah='$idnasabah' ");
                    $row_saldo=mysqli_fetch_array($query_saldo);
                    $saldo_keseluruhan= $row_saldo['jumlah_debit'] - $row_saldo['jumlah_kredit'];
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Dapatkan Tiket Untuk Transfer</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-3 col-sm-12 col-xs-12" style="margin-left: 0px;">
                                    <h4><small>Saldo antum : </small>Rp. <?php echo rupiah($saldo_keseluruhan);?></h4>
                                </div>
                                <div class="x_content">                    
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="20">Tipe</th>
                                                <th>Tanggal</th>
                                                <th>No Transaksi</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th width="110">Saldo</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no = 0;
                                            $idnasabah = $_SESSION['nasabah'];
                                            $query=mysqli_query($conn,"SELECT * FROM transaksi WHERE id_nasabah='$idnasabah' order by id_transaksi ASC");
                                            $count = 2 ;
                                            while($row=mysqli_fetch_array($query)){
                                            $no++;
                                        ?>
                                        <tr style="background: <?php if ($row['kredit'] == 0){ ?>
                                            #defff1;
                                            <?php }else{ ?>
                                            #feeeea;
                                            <?php } ?>">
                                            <td>
                                                <?php 
                                                    if ($row['kredit'] == 0){ 
                                                ?>
                                                <a  class="btn btn-success btn-xs" >
                                                    <i class="glyphicon glyphicon-save-file"></i>
                                                </a>
                                                <?php 
                                                    }
                                                    else{ 
                                                ?> 
                                                <a  class="btn btn-danger btn-xs" >
                                                    <i class="glyphicon glyphicon-open-file"></i>
                                                </a>
                                                <?php 
                                                    } 
                                                ?>
                                            </td> 
                                            <td><?php echo $row['tanggal'];?></td>
                                            <td><?php echo $row['id_transaksi'];?></td> 

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
                                            </td>
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
                                            </td>
                                            <td><?php echo $row['keterangan'];?></td>
                                        </tr>                                         
                                        <?php } ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>