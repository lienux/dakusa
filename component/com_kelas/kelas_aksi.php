<?php
error_reporting(0);
include '../../config/conn.php';
$module = $_GET['module'];
$act    = $_GET['act'];	

  if ( $module = 'kelas' AND $act =='simpan') {
  $password = md5($_POST[password]);  
    mysqli_query($conn,"INSERT INTO kelas(id_kelas,
                                  nama_kelas) VALUES('$_POST[id]',
                                                 '$_POST[kelas]')");

    echo "<script language='javascript'>document.location='../../?module=".$module."';</script>";
  }elseif ($module = 'kelas' AND $act =='edit') {
  	
    mysqli_query($conn,"UPDATE kelas SET nama_kelas = '$_POST[kelas]'
                                    WHERE id_kelas = '$_POST[id]'");

    
    echo "<script language='javascript'>
        document.location='../../?module=".$module."';
        </script>";
  }
?>