<?php
    session_start();
    $idn=$_SESSION['nasabah'];
?>
<div class="col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title" style="text-transform: capitalize;">
                    <h2 >KOTAK ASPIRASI DIGITAL <span class="fa fa-pencil-square-o"></span></h2>
                    <br><br>
                    <h2 >Kirimkan aspirasi / masukan anda di sini... <span class="fa fa-envelope "></span></h2>
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content">
                    <form action="?module=aspirasi_simpan" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="id">Judul :</label>
                                <input type="text"  class="form-control" name="txtJudul" />
                                <br>

                                <label for="id">Aspirasi anda :</label>
                                <textarea class="form-control" name="txtIsi" autocomplete="off"  requerid /> </textarea>                                
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
                                    <span class="fa fa-cloud-upload"></span> Kirim
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