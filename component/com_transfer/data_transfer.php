<?php 
include '../../config/conn.php';
?>
<div class="col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_title" style="text-transform: capitalize;">
                        <h2 >Data Transfer</h2>
                        <div class="clearfix"></div>
                    </div>                        
                    <div class="divider-dashed"></div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>ID Nasabah</th>
                                    <th>No Rekening</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Kode Unik</th>
                                    <th width="110">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    $query=mysqli_query($conn,"SELECT * FROM tiket ORDER BY id_tiket DESC");
                                    while($row=mysqli_fetch_array($query)){
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row['id_nasabah'];?></td>
                                    <td><?php echo $row['no_rekening'];?></td>
                                    <td><?php echo $row['tanggal'];?></td>
                                    <td>
                                    	Rp. <?php echo rupiah($row['jumlah_TF']-$row['kode_unik']);?>
                                    </td>
                                    <td><?php echo $row['kode_unik'];?></td>
                                    <td>                                        
                                        <a href="?module=konfirmasi&id=<?php echo $row['id_nasabah'];?>" class="btn btn-danger btn-xs"  onclick="return confirm('Antum yakin dengan data ini ?')">
                                            <i class="glyphicon glyphicon-ok"></i>
                                            Konfirmasi
                                        </a>                                        
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal_konfirmasi">
								    <div class="modal-dialog">
								        <div class="modal-content" style="margin-top:100px;">
								            <div class="modal-header">
								            	<h4 class="modal-title" style="text-align:center;">Apakah antum yakin dengan data ini ?</h4>
								            </div>     
								            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
								                <a href="?module=konfirmasi&id=<?php echo $row['id_nasabah'];?>" class="btn btn-danger btn-sm" id="delete_link">Lanjutkan</a>
								                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
								            </div>
								        </div>
								    </div>
								</div>
                                <?php } ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


