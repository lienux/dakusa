<?php
error_reporting(0);
include '../../config/conn.php';
$module = $_GET['module'];
$act    = $_GET['act'];
$tgl    = date('Y-m-d');
$id     = $_GET['id'];
?>



<?php session_start();?>
<?php if ($_SESSION['leveluser'] == 'admin'){ ?>
  <?php 
  if ( $module = 'homeaksi' AND $act =='simpan') {
    $total          = $_POST['txtTotal'];
    $bayar          = $_POST['txtBayar'];
    $total2         = $total-$bayar;
    if ($bayar > $total) {
      echo "<script>alert('Jumlah yang anda masukan terlalu besar.');history.go(-1);</script>";
    }else{
      mysqli_query($conn,"UPDATE transaksi_k_jml SET 
                                                -- total    = '$total2',
                                                bayar    = '$bayar'");
      echo "<script language='javascript'>document.location='./';</script>";
    }
  }
  ?>
<?php } ?>



<?php session_start();?>
<?php if ($_SESSION['leveluser'] == 'kantin'){ ?>
<?php 
  if ( $module = 'homeaksi' AND $act =='terima') {
    $total          = $_POST['txtTotal'];
    $bayar          = $_POST['txtBayar'];
    $total2         = $total-$bayar;
    $tgl            = date('Y-m-d');
    if ($bayar > $total) {
      echo "<script>alert('Jumlah yang anda masukan terlalu besar.');history.go(-1);</script>";
    }else{
      mysqli_query($conn,"INSERT INTO doc_setoran SET 
                                                tanggal  = '$tgl',
                                                jumlah   = '$bayar'");
      mysqli_query($conn,"UPDATE transaksi_k_jml SET 
                                                total    = '$total2',
                                                bayar    = '0'");
      echo "<script language='javascript'>document.location='./';</script>";
    }
  }
  ?>
<?php } ?>



<?php if ($_SESSION['leveluser'] == 'nasabah'){ ?>
    Yang Kepooooooooo.........
<?php } ?>