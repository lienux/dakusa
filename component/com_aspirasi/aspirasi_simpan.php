<?php
    //include '../../config/conn.php';
    $idn        = $_SESSION['nasabah'];
    $txtJudul   = $_POST['txtJudul'];
    $txtIsi     = $_POST['txtIsi'];    
    $tgl        = date('Y-m-d');

    $sql="INSERT INTO kotak_aspirasi SET 
        id_nasabah      = '$idn',
        judul           = '$txtJudul',
        isi             = '$txtIsi',
        tanggal         = '$tgl'";
    if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Aspirasi antum suksess terkirim!, Insya Allah kritik dan saran antum akan membangun pondok menjadi lebih baik.');document.location='index.php';</script>";
    } else {
          echo "<script>alert('Gagal!');history.go(-1);</script>";
    }
    mysqli_close($conn);
?>