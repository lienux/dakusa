<?php
    session_start();
    $idn=$_SESSION['nasabah'];
    $norek=$_SESSION['norek'];
?>
<div class="col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title" style="text-transform: capitalize;">
                    <h2 >Silahkan Ubah Password Anda</h2>
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content">
                    <form action="?module=ubah_passwd_simpan" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id">Username :</label>
                                <input type="text"  class="form-control" name="txtUser" disabled value="<?php echo $norek;?>"  />
                                <input type="hidden"  class="form-control" name="txtUser1" value="<?php echo $r['no_rekening'];?>"  />

                                <label for="id">Password :</label>                                
                                <input type="text" class="form-control" name="txtPasswd" required />
                            </div>
                            
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-sm" onclick=self.history.back()>
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-success btn-sm">
                                    Simpan
                                </button>
                                <br>
                            </div>
                            <br>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>