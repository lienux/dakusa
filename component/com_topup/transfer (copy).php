
<?php include '../../config/conn.php'; ?>

<!-- page content -->
    <div class="col" role="main">
        <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title" style="text-transform: capitalize;">
                        <h2 >Data <?php echo $_GET['module'];?> <small></small></h2>                
                        <div class="clearfix"></div>
                    </div>

                    <div>
                        <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan"  enctype="multipart/form-data" method="POST">
                            <?php
                                $query  = "SELECT max(kode_unik) as maxID FROM tiket ";
                                $hasil  = mysqli_query($conn,$query);
                                $data   = @mysqli_fetch_array($hasil);
                                $idMax  = $data['maxID'];
                                $noUrut = (int) substr($idMax, 1, 9);
                                $noUrut++;
                                $tgl    = 31;
                                $tgl2   = date('d');
                                $u1     = $tgl-$tgl2;
                                $newID  = $u1.sprintf("%02s", $noUrut);                                                   
                            ?>
                            <label for="id">Kode Unik Anda Hari ini :</label>
                            <input type="text"  class="form-control" disabled value="<?php echo $newID;?>"  />
                            <input type="hidden"  class="form-control" name="txtKDunik" value="<?php echo $newID;?>"  />
                            <br>

                            <label for="tf">Jumlah Transfer * :</label>
                            <input type="text" name="txtTF" class="form-control"/>
                            <br>                          
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success btn-sm">Buat Tiket Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->