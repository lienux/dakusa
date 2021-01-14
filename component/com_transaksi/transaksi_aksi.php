<?php
error_reporting(0);
include '../../config/conn.php';
$module = $_GET['module'];
$act    = $_GET['act'];
$tgl    = date('Y-m-d');
$id     = $_GET['id'];
?>

<?php session_start();?>
<?php if ($_SESSION['leveluser'] == 'admin'){
if ( $module = 'transaksi' AND $act =='simpan') { 
    if (empty($_POST['kredit'])) {
        mysqli_query($conn,"INSERT INTO transaksi(id_transaksi,
                                        id_nasabah,
                                        tanggal,
                                        debit,
                                        kredit,
                                        keterangan) VALUES('$_POST[id]',
                                                       '$_POST[id_nasabah]',
                                                       '$_POST[tanggal]',
                                                       '$_POST[debit]',
                                                       '0',
                                                       '$_POST[keterangan]')");
    }
    else{
        mysqli_query($conn,"INSERT INTO transaksi(id_transaksi,
                                        id_nasabah,
                                        tanggal,
                                        debit,
                                        kredit,
                                        keterangan) VALUES('$_POST[id]',
                                                       '$_POST[id_nasabah]',
                                                       '$_POST[tanggal]',
                                                       '0',
                                                       '$_POST[kredit]',
                                                       '$_POST[keterangan]')");
    }
    echo "<script language='javascript'>document.location='../../?module=".$module."';</script>";
}
elseif ($module = 'nasabah' AND $act =='edit') {
    $password   = md5($_POST[password]);
    if (empty($_POST['password'])) {
    mysqli_query($conn,"UPDATE pegawai SET nama = '$_POST[nama]',
                                        alamat = '$_POST[alamat]',
                                        no_telp = '$_POST[telephone]',
                                        username = '$_POST[username]',
                                        level = '$_POST[level]',
                                        status = '$_POST[status]' 
                                        WHERE id_pegawai = '$_POST[id]'");

    }else{
    mysqli_query($conn,"UPDATE pegawai SET nama = '$_POST[nama]',
                                        alamat = '$_POST[alamat]',
                                        no_telp = '$_POST[telephone]',
                                        username = '$_POST[username]',
                                        password = '$_POST[password]',
                                        level = '$_POST[level]',
                                        status = '$_POST[status]' 
                                        WHERE id_pegawai = '$_POST[id]'");  
    }  
    echo "<script language='javascript'>
        document.location='../../?module=".$module."';
        </script>";
}

elseif ($module = 'transaksi_aksi' AND $act =='setoran') {
    // $id         = decrypt($_GET['id']);
    $saldo      = $_POST['txtSaldo'];
    $jml        = $_POST['txtJml'];
    $jml_saldo  = $saldo + $jml;
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

    echo "<script language='javascript'>document.location='?module=nasabah&aksi=transaksi';</script>";
}

elseif ($module = 'transaksi_aksi' AND $act =='penarikan') {
    $saldo      = $_POST['txtSaldo'];
    $jml        = $_POST['txtJml'];
    $jml_saldo  = $saldo - $jml;
    $idTrans    = $_POST['txtIDtrans'];
    $idNasabah  = $_POST['txtIDnasabah'];
    $ket        = $_POST['txtKeterangan'];

    if ($jml_saldo < 0) {
        echo "<script>alert('Uang Tidak Cukup');history.go(-1);</script>";
    }
    else{
        mysqli_query($conn,"INSERT INTO transaksi SET
                                      id_transaksi  = '$idTrans',
                                      id_nasabah    = '$idNasabah',
                                      tanggal       = '$tgl',
                                      debit         = '0',
                                      kredit        = '$jml',
                                      keterangan    = '$ket'");                                             
        mysqli_query($conn,"UPDATE nasabah SET saldo = $jml_saldo WHERE no_rekening = '$id'");

        echo "<script language='javascript'>document.location='?module=nasabah&aksi=transaksi';</script>";
    }
}

elseif ($module = 'transaksi_aksi' AND $act =='topup') {
    $id           = $_GET['id'];
    $saldo        = $_POST['txtSaldo'];
    $emoney       = $_POST['txtEmoney'];
    $jml          = $_POST['txtJml'];
    $sisa_saldo   = $saldo - $jml;
    $saldo_emoney = $emoney + $jml;
    $idTrans      = $_POST['txtIDtrans'];
    $idNasabah    = $_POST['txtIDnasabah'];
    $ket          = $_POST['txtKeterangan'];

    if ($sisa_saldo < 0) {
        echo "<script>alert('Uang Tidak Cukup');history.go(-1);</script>";
    }
    else{
        mysqli_query($conn,"INSERT INTO transaksi SET
                                      id_transaksi  = '$idTrans',
                                      id_nasabah    = '$idNasabah',
                                      tanggal       = '$tgl',
                                      debit         = '0',
                                      kredit        = '$jml',
                                      keterangan    = '$ket'");

        mysqli_query($conn,"UPDATE nasabah SET saldo = $sisa_saldo, emoney = $saldo_emoney WHERE no_rekening = '$id'");

        mysqli_query($conn,"INSERT INTO topup SET
                                      id_transaksi  = '$idTrans',
                                      id_nasabah    = '$idNasabah',
                                      tanggal       = '$tgl',                                    
                                      jml           = '$jml'");        

        echo "<script language='javascript'>document.location='?module=nasabah&aksi=transaksi';</script>";
    }
}
?>
<?php } ?>



<?php session_start();?>
<?php if ($_SESSION['leveluser'] == 'kantin'){ ?>
<?php
    $emoney       = $_POST['txtSaldoKantin'];
    $jml          = $_POST['txtJml'];
    $sisa_emoney  = $emoney - $jml;
    $idNasabah    = $_POST['txtIDnasabah'];
    $ket          = $_POST['txtKeterangan'];

    mysqli_query($conn,"INSERT INTO transaksi_k SET
                                  id_nasabah    = '$idNasabah',
                                  tanggal       = '$tgl',
                                  jumlah        = '$jml',
                                  keterangan    = '$ket'");                                             
    mysqli_query($conn,"UPDATE nasabah SET emoney = $sisa_emoney WHERE no_rekening = '$id'");

    echo "<script language='javascript'>document.location='?module=cari_nasabah';</script>";
?>
<?php } ?>


<?php if ($_SESSION['leveluser'] == 'nasabah'){ ?>
    Yang Kepooooooooo.........
<?php } ?>