<?php include '../../config/conn.php'; ?>

<?php 
    $ID = $_GET['id'];
    $sqlTampil = "SELECT * FROM tiket WHERE id_nasabah='$ID'"; 
    $qryTampil = mysqli_query($conn, $sqlTampil) or die ("Gagal query".mysqli_error()); 
    $dataTampil= mysqli_fetch_array($qryTampil);
?>

<?php
    $query = "SELECT max(id_transaksi) as maxID FROM transaksi ";
    $hasil = mysqli_query($conn,$query);
    $data = @mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];

    $noUrut = (int) substr($idMax, 1, 9);
    $noUrut++;
    $char = "T";
    $newID = $char.sprintf("%04s", $noUrut); 
?>

<?php
    $id_nasabah=$dataTampil['id_nasabah'];
    $no_rekening=$dataTampil['no_rekening'];
    $nope=$dataTampil['nope'];
    $email=$dataTampil['email'];
    $tanggal=$dataTampil['tanggal'];
    $jumlah_TF=$dataTampil['jumlah_TF'];
    $kode_unik=$dataTampil['kode_unik'];

    $tgl=date('Y-m-d');
    $jumlah=$dataTampil['jumlah_TF']-$dataTampil['kode_unik'];

    mysqli_query($conn,"INSERT INTO transaksi SET 
                        id_transaksi  = '$newID',
                        id_nasabah    = '$id_nasabah',
                        tanggal       = '$tgl',
                        debit         = '$jumlah',
                        kredit        = '0',
                        keterangan    = 'menggunakan aplikasi'");

    mysqli_query($conn,"INSERT INTO backup_tiket SET                        
                        id_nasabah      = '$id_nasabah',
                        no_rekening     = '$no_rekening',
                        nope            = '$nope',
                        email           = '$email',
                        tanggal         = '$tanggal',
                        jumlah_TF       = '$jumlah_TF',
                        kode_unik       ='$kode_unik'");

    $query=mysqli_query($conn,"DELETE FROM tiket WHERE id_nasabah='$ID'");

    echo "<script language='javascript'>
            document.location='?module=transaksi';
          </script>";
?>
