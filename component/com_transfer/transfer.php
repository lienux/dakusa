<?php include '../../config/conn.php'; ?>

<div class="x_content">
    <form action="?module=transfer_aksi"  enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-md-6">
                <?php
                    $query  = "SELECT max(kode_unik) as maxID FROM tiket";
                    $hasil  = mysqli_query($conn,$query);
                    $data   = @mysqli_fetch_array($hasil);
                    $idMax  = $data['maxID'];
                    $noUrut = (int) substr($idMax, 1, 9);
                    $noUrut++;
                    $newID  = 100+sprintf("%03s", $noUrut);                                                   
                ?>
                <label for="id">Kode Unik Anda Hari ini :</label>
                <input type="text"  class="form-control" disabled value="<?php echo $newID;?>"  />
                <input type="hidden"  class="form-control" name="txtKDunik" value="<?php echo $newID;?>"  />
                <br>

                <label for="tf">No HP Notifikasi * :</label>
                <input type="text" name="txtHP" class="form-control"/>
                <br>

                <label for="tf">Email Notifikasi * :</label>
                <input type="text" name="txtEmail" class="form-control"/>
                <br>

                <label for="tf">Jumlah Transfer * :</label>
                <input type="text" name="txtTF" class="form-control" required/>
                <br>                
            </div>
            
            <div class="col-md-6">
                SEPUTAR CARA dan ATURAN TRANSFER
            </div>
                
        </div>
        
        <div class="ln_solid"></div>
            <div class="form-group">
                <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>
                    Batal
                </button>
                <button type="submit" class="btn btn-success btn-sm">
                    Buat Tiket Sekarang
                </button>
                <br>
            </div>
            <br>
            <br>
        </div>
    </form>
</div>