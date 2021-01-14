<?php session_start();?>
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <?php
        if ($_SESSION['leveluser'] == 'admin'){
        ?>
        <div class="menu_section">
            <ul class="nav side-menu">             
                <li>
                    <a href="./">
                        <i class="fa fa-home"></i>
                        Beranda
                    </a>
                </li>
                
                <li>
                    <a>
                        <i class="fa fa-book"></i>
                        Data Master
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                        <li><a href="?module=pegawai">Data Pegawai</a></li>
                        <li><a href="?module=kelas">Data Kelas</a></li>
                        <li><a href="?module=nasabah">Data Nasabah</a></li>
                        <li><a href="?module=setting_kelas">Setting Kelas</a></li>
                    </ul>
                </li>

                <li>
                    <a href="?module=nasabah&aksi=transaksi">
                        <i class="fa fa-users"></i>
                        Transaksi
                    </a>
                </li>

                <li>
                    <a href="?module=transaksi">
                        <i class="fa fa-dollar"></i>
                        Data Transaksi
                    </a>
                </li>

                <li class="<?php if($module=="transfer"){echo "active";}?>">
                    <a href="?module=data_transfer">
                        <i class="fa fa-credit-card"></i>
                        Data Transfer
                    </a>
                </li>
                
                <li>
                    <a href="?module=piutang">
                        <i class="fa fa-list"></i>
                        Piutang
                    </a>
                </li>
                
                <li>
                    <a>
                        <i class="fa fa-print"></i>
                        Laporan
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                        <li>
                            <a href="?module=laporan-transaksi">Laporan Transaksi</a>
                        </li>
                        <li>
                            <a href="?module=cetak-rekening">Cetak Rekening</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php if($module=="aspirasi"){echo "active";}?>">
                    <a href="?module=aspirasi"><i class="fa fa-comment"></i>Kotak Aspirasi</a>
                </li>               
                
                <li><a href="?module=pengaturan" ><i class="fa fa-cog"></i> Pengaturan </a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Keluar </a></li>
            </ul>
        </div>
        <?php }?>

        <?php 
        if ($_SESSION['leveluser'] == 'kantin'){
        ?>
        <div class="menu_section">
            <ul class="nav side-menu">             
                <li>
                    <a href="./">
                        <i class="fa fa-home"></i>
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="?module=cari_nasabah">
                        <i class="fa fa-users"></i>
                        Transaksi
                    </a>
                </li>

                <li>
                    <a href="?module=transaksi">
                        <i class="fa fa-dollar"></i>
                        Data Transaksi
                    </a>
                </li>                                                                
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Keluar </a></li>
            </ul>
        </div>
        <?php }?>

        <?php
        if ($_SESSION['leveluser'] == 'user'){
        ?>
        <div class="menu_section">
            <ul class="nav side-menu">             
                <li>
                    <a href="./">
                        <i class="fa fa-home"></i>
                        Beranda
                    </a>
                </li>
                
                <li>
                    <a>
                        <i class="fa fa-book"></i>
                        Data Master
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">                        
                        <li><a href="?module=kelas">Data Kelas</a></li>
                        <li><a href="?module=nasabah">Data Nasabah</a></li>
                        <li><a href="?module=setting_kelas">Setting Kelas</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="?module=transaksi">
                        <i class="fa fa-dollar"></i>
                        Transaksi
                    </a>
                </li>
                
                <li>
                    <a href="?module=piutang">
                        <i class="fa fa-list"></i>
                        Piutang
                    </a>
                </li>
                
                <li>
                    <a>
                        <i class="fa fa-print"></i>
                        Laporan
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                        <li>
                            <a href="?module=laporan-transaksi">Laporan Transaksi</a>
                        </li>
                        <li>
                            <a href="?module=cetak-rekening">Cetak Rekening</a>
                        </li>
                    </ul>
                </li>               
                
                <li><a href="?module=pengaturan" ><i class="fa fa-cog"></i> Pengaturan </a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Keluar </a></li>
            </ul>
        </div>
        <?php }?>


        <?php
        $module = $_GET['module'];
        if ($_SESSION['leveluser'] == 'nasabah'){
        ?>
        <div class="menu_section">
            <ul class="nav side-menu">             
                <li class="<?php if($module==""){echo "active";}?>">
                    <a href="./"><i class="fa fa-home"></i>Beranda</a>
                </li>
                <li class="<?php if($module=="laporan_transaksi"){echo "active";}?>">
                    <a href="?module=laporan_transaksi"><i class="fa fa-dollar"></i>Data Transaksi</a>
                </li>
                <li class="<?php if($module=="transfer"){echo "active";}?>">
                    <a href="?module=transfer"><i class="fa fa-credit-card"></i>Transfer</a>
                </li>
                <li class="<?php if($module=="input_aspirasi"){echo "active";}?>">
                    <a href="?module=input_aspirasi"><i class="fa fa-comment"></i>Kotak Aspirasi</a>
                </li>
                <li class="<?php if($module=="ubah_passwd"){echo "active";}?>">
                    <a href="?module=ubah_passwd"><i class="fa fa-key"></i>Ubah Password</a>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Keluar</a></li>
            </ul>
        </div>
        <?php }?>
    </div>
