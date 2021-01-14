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
                        <h2 >Kotak Aspirasi</h2>
                        <div class="clearfix"></div>
                    </div>                        
                    <div class="divider-dashed"></div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>No Rekening</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Isi Aspirasi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    $query=mysqli_query($conn,"SELECT * FROM kotak_aspirasi JOIN nasabah ON kotak_aspirasi.id_nasabah=nasabah.id_nasabah ORDER BY tanggal DESC");
                                    while($row=mysqli_fetch_array($query)){
                                    $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row['no_rekening'];?></td>
                                    <td><?php echo $row['nama'];?></td>
                                    <td><?php echo $row['tanggal'];?></td>
                                    <td><?php echo $row['judul'];?></td>
                                    <td><?php echo $row['isi'];?></td>
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


