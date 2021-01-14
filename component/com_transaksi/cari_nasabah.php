<div class="col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-9">
                <div class="x_panel">
                    <div class="x_title" style="text-transform: capitalize;">
                        <h2 >Transaksi :</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="?module=penarikan" class="form-horizontal form-label-left" method="POST">
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-12 col-xs-12 ">
                                    <div class="input-group">
                                        <input type="text" class="typeahead form-control" placeholder="Tulis ID nasabah" required name="no_rekening" autofocus="autofocus" autocomplete="off">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Cari</button>
                                        </span>
                                    </div>                             
                                </div>
                            </div>
                        </form>                        
                    </div>
<pre>
Tanggal = <?php echo date('Y-m-d'); ?>
<p>----------------------------------------------------------------------------------
ID Transaksi                 Nama                                    Jumlah
----------------------------------------------------------------------------------
<?php 
    $no = 0;
    $tgl = date('Y-m-d');
    $query=mysqli_query($conn,"SELECT * FROM transaksi_k JOIN nasabah ON transaksi_k.id_nasabah=nasabah.id_nasabah WHERE tanggal='$tgl'");
    $count = 2 ;
    while($row=mysqli_fetch_array($query)){
    $no++;
?><table>
    <tr>
        <td width="200"><?php echo $row['id_transaksi'];?></td>
        <td width="350"><?php echo $row['nama'];?></td>
        <td><?php echo "Rp.".rupiah($row['jumlah']);?></td>
    </tr>                                            
<?php } ?>
</table>----------------------------------------------------------------------------------
</pre>
                </div>
            </div>
        </div>
    </div>
</div>






