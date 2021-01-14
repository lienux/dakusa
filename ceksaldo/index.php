<html>
    <head>
        <?php include('../ubk/config/conn.php');?>
        <?php
	    error_reporting(0);
            if(isset($_POST['save'])){

                $rek = $_POST['no_rek'];
                $query = "SELECT * FROM nasabah WHERE no_rekening='$rek'";
                $cek = mysqli_query($conn, $query);
                
                if(count($cek) == 1){
                    $n = mysqli_fetch_array($cek);
		    $norek = $n['no_rekening'];
                    $nama = $n['nama'];
                    $saldo = $n['saldo'];
		    $saldo_final = (number_format($saldo));
                }

		echo "<meta http-equiv='refresh' content='2.5'>";
                
                $_SESSION['message'] = "<div>Rekening: $norek</div>
					<div>Pemilik : $nama</div>
					<div>Saldo   : Rp. $saldo_final</div>";

		
            }
	 
        ?>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Cek Saldo Santri</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
    </head>
    <body>
	
        <br>
	<center>
		<u><h1 style="font-family:arial;"> Cek Saldo Anda Disini</h1></u>
	</center>
        <form method="post" action="index.php" enctype="multipart/form-data"> 
		<div class="input-group">
			<label>No Rekening</label>
			<input type="text" name="no_rek" autofocus="autofocus" required/>
		</div>
		
            
		<div class="input-group">
            <button class="btn" type="submit" name="save" >Cek Saldo</button>
		</div>
		
        <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);

			
		?>
	</div>
        <?php endif ?>
		
	</form>
        
    </body>    
</html>    