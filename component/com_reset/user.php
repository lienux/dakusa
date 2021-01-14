<?php include '../../config/conn.php'; ?>

<?php 
    $sqlTampil = "SELECT * FROM nasabah ORDER BY id_nasabah"; 
    $qryTampil = mysqli_query($conn, $sqlTampil) or die ("Gagal query".mysqli_error()); 
    $dataTampil= mysqli_fetch_array($qryTampil);
?>

<?php
    $id_nasabah=$dataTampil['id_nasabah'];
    $no_rekening=$dataTampil['no_rekening'];
    $tanggal_lahir=$dataTampil['tanggal_lahir'];

    mysqli_query($conn,"UPDATE nasabah SET 
                        username    = '$no_rekening',
                        password    = '$tanggal_lahir'");

    echo "<script language='javascript'>
            document.location='?module=transaksi';
          </script>";
?>
