<?php session_start();?>
<?php if ($_SESSION['leveluser'] == 'admin'){ ?>
    
    <?php
        include '../../config/conn.php';
        $id         = decrypt($_GET['id']);
        $saldo      = $_POST['txtSaldo'];
        $jml        = $_POST['txtJml'];
        $jml_saldo  = $saldo + $jml;
        $tgl        = date('YY-mm-dd');
        $idTrans    = $_POST['txtIDtrans'];
        $idNasabah  = $_POST['txtIDnasabah'];
        $ket        = $_POST['txtKeterangan'];


        mysqli_query($conn,"INSERT INTO transaksi SET
                                  id_transaksi  = '$idTrans',
                                  id_nasabah    = '$idNasabah',
                                  tanggal       = '$tgl',
                                  debit         = '$jml',
                                  kredit        = '0',
                                  keterangan    = '$ket'");                                             
        mysqli_query($conn,"UPDATE nasabah SET saldo = $jml_saldo WHERE no_rekening = '$id'");

        echo "<script language='javascript'>document.location='?module=transaksi';</script>";
    ?>

<?php } ?>
<?php if ($_SESSION['leveluser'] == 'nasabah'){ ?>
    Yang Kepooooooooo.........
<?php } ?>




