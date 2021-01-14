<?php    
    $idn            = $_SESSION['nasabah'];
    $passwd         = md5($_POST['txtPasswd']);
   
    $sql = "UPDATE nasabah SET password='$passwd' WHERE id_nasabah='$idn'";
    if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Ubah password suksess!');document.location='index.php';</script>";
    } else {
          echo "<script>alert('Gagal!');history.go(-1);</script>";
    }
    mysqli_close($conn);
   
    // echo "<script language='javascript'>document.location='index.php';</script>";
?>