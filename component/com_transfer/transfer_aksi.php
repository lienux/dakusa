<?php
    error_reporting(0);
    include '../../config/conn.php';
    $module     = $_GET['module'];
    $txtTF      = $_POST['txtTF'];
    $txtKDunik  = $_POST['txtKDunik'];
    $jumlahTF   = $txtTF+$txtKDunik;
    $txtHP      = $_POST['txtHP'];
    $txtEmail   = $_POST['txtEmail'];
    $tgl        = date('Y-m-d');
    $status     = 'belum ditransfer';

    $sql="INSERT INTO tiket SET 
        id_nasabah      = '$_SESSION[nasabah]',
        nope            = '$txtHP',
        email           = '$txtEmail',
        tanggal         = '$tgl',
        jumlah_TF       = '$jumlahTF',
        kode_unik       = '$_POST[txtKDunik]',
        status          = '$status'";
    if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Tiket transfer suksess!');document.location='index.php';</script>";
    } else {
          echo "<script>alert('Gagal!');history.go(-1);</script>";
    }
    mysqli_close($conn);
    // header ("location:index.php";);
    // echo "<script language='javascript'>document.location='index.php';</script>";
?>