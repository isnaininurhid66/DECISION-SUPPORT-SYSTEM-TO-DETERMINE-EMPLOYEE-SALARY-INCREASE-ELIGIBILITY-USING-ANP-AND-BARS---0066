<?php
error_reporting(0);
ini_set('display_errors',0);
require_once'functions.php';
    
    /** LOGIN **/
    if($act=='login'){
        $user = esc_field($_POST['user']);
        $pass = esc_field($_POST['pass']);
        
        $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
        if($row){
            $_SESSION[login] = $row->user;
            redirect_js("index.php");
        } else{
            print_msg("Salah kombinasi username dan password.");
        } 
    }else if ($page=='password'){
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $pass3 = $_POST['pass3'];
        
        $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
        
        if($pass1=='' || $pass2=='' || $pass3=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif(!$row)
            print_msg('Password lama salah.');
        elseif($pass2!=$pass3)
            print_msg('Password baru dan konfirmasi password baru tidak sama.');
        else{        
            $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
            print_msg('Password berhasil diubah.', 'success');
        }
    }elseif($act=='logout'){
        unset($_SESSION[login]);
        header("location:login.php");
    } 
    /** ALTERNATIF **/
    elseif($page=='karyawan/karyawan_tambah'){
        $kode_alternatif = $_POST['kode_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];
        $id_periode = $_POST['id_periode'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tahun_masuk = $_POST['tahun_masuk'];


        if($kode_alternatif=='' || $nama_alternatif=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode_alternatif'"))
            print_msg("Kode sudah ada!");
        else{
            // $id_periode = $db->get_results("SELECT id FROM tb_periode where status='1'")[0]->id;

            $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, id_periode, username, password, tahun_masuk) VALUES ('$kode_alternatif', '$nama_alternatif', '$id_periode', '$username', '$password', '$tahun_masuk')");
            
            $rows = $db->get_results("SELECT kode_kriteria FROM tb_kriteria");
            foreach($rows as $row){
                $db->query("INSERT INTO tb_rel_alternatif(kode1, kode2, kode_kriteria, nilai) SELECT '$kode_alternatif', kode_alternatif, '$row->kode_kriteria', 1 FROM tb_alternatif WHERE hak_akses='karyawan'");    
                $db->query("INSERT INTO tb_rel_alternatif(kode1, kode2, kode_kriteria, nilai) SELECT kode_alternatif, '$kode_alternatif', '$row->kode_kriteria', 1 FROM tb_alternatif WHERE hak_akses='karyawan' AND kode_alternatif<>'$kode_alternatif'");
            }        
            
            $rows = $db->get_results("SELECT kode_kriteria FROM tb_kriteria");
            foreach($rows as $row){
                $db->query("INSERT INTO tb_rel_kriteria(kode1, kode2, kode_alternatif, nilai) 
                    SELECT '$row->kode_kriteria', kode_kriteria, '$kode_alternatif', 1 FROM tb_kriteria"); 
            }           
            // redirect_js("index.php?m=alternatif");
            echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=karyawan/view";
       });
                 </script>';
        }
    } elseif ($page=='karyawan/karyawan_ubah'){
        $kode_alternatif = $_POST['kode_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];
        $id_periode = $_POST['id_periode'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tahun_masuk = $_POST['tahun_masuk'];
        if($kode_alternatif=='' || $nama_alternatif=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode_alternatif' AND kode_alternatif<>'$_GET[ID]'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("UPDATE tb_alternatif SET kode_alternatif='$kode_alternatif', nama_alternatif='$nama_alternatif', id_periode='$id_periode', username='$username', password='$password', tahun_masuk='$tahun_masuk' WHERE kode_alternatif='$_GET[ID]'");
            // redirect_js("index.php?m=alternatif");
            echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=karyawan/view";
       });
                 </script>';
        }
    } elseif ($act=='karyawan_hapus'){
        $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
        $db->query("DELETE FROM tb_rel_alternatif WHERE kode1='$_GET[ID]' OR kode2='$_GET[ID]'");
        $db->query("DELETE FROM tb_rel_kriteria WHERE kode_alternatif='$_GET[ID]'");
        $db->query("DELETE FROM tb_alt_krit WHERE kode_alternatif='$_GET[ID]'");
        $db->query("DELETE FROM tb_krit_alt WHERE kode_alternatif='$_GET[ID]'");
        echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=karyawan/view';</script>";

    } 
    
    /** KRITERIA */    
    if($page=='kriteriaanp/kriteriaanp_tambah'){
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        if($kode=='' || $nama=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria) VALUES ('$kode', '$nama')");
            $rows = $db->get_results("SELECT kode_alternatif FROM tb_alternatif WHERE hak_akses='karyawan'");
            foreach($rows as $row){
                $db->query("INSERT INTO tb_rel_kriteria(kode_alternatif, kode1, kode2, nilai) 
                    SELECT '$row->kode_alternatif', '$kode', kode_kriteria, 1 FROM tb_kriteria");
                $db->query("INSERT INTO tb_rel_kriteria(kode_alternatif, kode1, kode2, nilai) 
                    SELECT '$row->kode_alternatif', kode_kriteria, '$kode', 1 FROM tb_kriteria WHERE kode_kriteria<>'$kode'"); 
            }
                    
            $rows = $db->get_results("SELECT kode_alternatif FROM tb_alternatif WHERE hak_akses='karyawan'");
            foreach($rows as $row){
                $db->query("INSERT INTO tb_rel_alternatif(kode1, kode2, kode_kriteria, nilai) 
                    SELECT '$row->kode_alternatif', kode_alternatif, '$kode', 1 FROM tb_alternatif WHERE hak_akses='karyawan'"); 
            }            
            // redirect_js("index.php?m=kriteria");
            echo '<script>
            swal({
             title: "Good job!",
             text: "Data berhasil DiTambah",
             icon: "success",
             button: "oke!",
           }).then(function() {
             window.location = "?page=kriteriaanp/view";
           });
                     </script>';
        }    
    } else if($page=='kriteriaanp/kriteriaanp_ubah'){
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        if($kode=='' || $nama=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode' AND kode_kriteria<>'$_GET[ID]'"))
            print_msg("Kode sudah ada!");
        else{
            $db->query("UPDATE tb_kriteria SET kode_kriteria='$kode', nama_kriteria='$nama' WHERE kode_kriteria='$_GET[ID]'");
            // redirect_js("index.php?m=kriteria");
            echo '<script>
            swal({
             title: "Good job!",
             text: "Data berhasil DiUbah",
             icon: "success",
             button: "oke!",
           }).then(function() {
             window.location = "?page=kriteriaanp/view";
           });
                     </script>';
        }    
    } else if ($act=='kriteriaanp_hapus'){
        $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
        $db->query("DELETE FROM tb_rel_kriteria WHERE kode1='$_GET[ID]' OR kode2='$_GET[ID]'");
        $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='$_GET[ID]'");
        $db->query("DELETE FROM tb_krit_alt WHERE kode_kriteria='$_GET[ID]'");
        $db->query("DELETE FROM tb_alt_krit WHERE kode_kriteria='$_GET[ID]'");
        // header("location:index.php?m=kriteria");
        echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=kriteriaanp/view';</script>";

    } 
    else if ($act=='kriteriamoora_hapus'){
        $db->query("DELETE FROM kriteria WHERE id_kriteria='$_GET[ID]'");
        // header("location:index.php?m=kriteria");
        echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=kriteriamoora/view';</script>";

    } 
    else if ($act=='subkriteriamoora_hapus'){
        $db->query("DELETE FROM subkriteria WHERE id_subkriteria='$_GET[ID]'");
        // header("location:index.php?m=kriteria");
        echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=subkriteriamoora/view';</script>";

    } 
    
    /** RELASI ALTERNATIF */ 
    else if ($page=='penilainanp/rel_karyawan'){
        if($_GET['kode_kriteria']==''){
            print_msg('Pilih kriteria terlebih dulu.');
        }elseif($_POST[kode1]==$_POST[kode2] && $_POST[nilai]<>1){
            print_msg('Alternatif yang sama harus bernilai 1.');
        }else{
            $db->query("UPDATE tb_rel_alternatif SET nilai='$_POST[nilai]' WHERE kode1='$_POST[kode1]' AND kode2='$_POST[kode2]' AND kode_kriteria='$_GET[kode_kriteria]'");
            $db->query("UPDATE tb_rel_alternatif SET nilai=1/'$_POST[nilai]' WHERE kode1='$_POST[kode2]' AND kode2='$_POST[kode1]' AND kode_kriteria='$_GET[kode_kriteria]'");
            print_msg('Data berhasil diubah.', 'success');
        }
    }
    
    /** RELASI KRITERIA */
    else if ($page=='penilainanp/rel_kriteria'){
        if($_GET['kode_alternatif']==''){
            print_msg('Pilih alternatif terlebih dulu.');
        }elseif($_POST[kode1]==$_POST[kode2] && $_POST[nilai]<>1){
            print_msg('Kriteria yang sama harus bernilai 1.');
        }else{
            $db->query("UPDATE tb_rel_kriteria SET nilai='$_POST[nilai]' WHERE kode1='$_POST[kode1]' AND kode2='$_POST[kode2]' AND kode_alternatif='$_GET[kode_alternatif]'");
            $db->query("UPDATE tb_rel_kriteria SET nilai=1/'$_POST[nilai]' WHERE kode1='$_POST[kode2]' AND kode2='$_POST[kode1]' AND kode_alternatif='$_GET[kode_alternatif]'");
            print_msg('Data berhasil diubah.', 'success');
        }
    }

     /** PERIODE */
     elseif($page=='periode/atur_periode_tambah'){
        $tahun = $_POST['tahun'];
        if( $tahun=='')
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_periode WHERE tahun='$tahun'"))
            print_msg("Tahun sudah ada!");
        else{
            $db->query("INSERT INTO tb_periode (tahun) VALUES ('$tahun')");
         
            redirect_js("?page=periode/view");
        }
    }
    else if ($page=='atur_periode_status_ok'){
        if($_GET['ID']==''){
            print_msg('Pilih periode terlebih dulu.');
        }else{
            $db->query("UPDATE tb_periode SET status='0' WHERE tahun!=''");
            $db->query("UPDATE tb_periode SET status='1' WHERE id='$_GET[ID]'");
            // print_msg('Status berhasil diubah.', 'success');
            redirect_js("?page=periode/view");

        }
    }
    else if ($page=='periode/atur_periode_ubah'){
        if($_GET['ID']==''){
            print_msg('Pilih periode terlebih dulu.');
        }else{
            $db->query("UPDATE tb_periode SET tahun='$_POST[tahun]' WHERE id='$_GET[ID]'");
            // print_msg('Data berhasil diubah.', 'success');
            echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=periode/view";
       });
                 </script>';
        }
    }
/** alternatif */    
else if($page=='usermanagement/usermanagement_tambah'){
    // $kode = $_POST['kode'];
    $nama_alternatif = $_POST['nama_alternatif'];
    $kode_alternatif = $_POST['kode_alternatif'];
    $alamat_alternatif = $_POST['alamat_alternatif'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    
    if($kode_alternatif=='' || $alamat_alternatif=='' || $tanggal_lahir=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
//    elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
//         print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, alamat_alternatif, tanggal_lahir, username, password, hak_akses) VALUES ('$kode_alternatif', '$nama_alternatif', '$alamat_alternatif', '$tanggal_lahir', '$username', '$password', '$hak_akses'");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiTambah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=usermanagement/view";
       });
                 </script>';
    }                    
} else if($page=='usermanagement/usermanagement_ubah'){
    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $no = $_POST['no'];
    $email = $_POST['email'];

    
    if($nama=='' || $alamat=='' || $tanggal_lahir=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_alternatif SET 
        nama_alternatif='$nama', 
        alamat_alternatif='$alamat', 
        tanggal_lahir='$tanggal_lahir', 
        username='$username', 
        password='$password', 
        hak_akses='$hak_akses', 
        tempat_lahir='$tempat_lahir', 
        no='$no', 
        email='$email' WHERE kode_alternatif='$_GET[ID]'");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=usermanagement/view";
       });
                 </script>';
    }    
} else if ($act=='usermanagement_hapus'){
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
     echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=usermanagement/view';</script>";
}     

/** Absensi FOrm */    
else if($page=='data/absensi_tambah'){
    // $kode = $_POST['kode'];
    $kode_alternatif = $_POST['kode_alternatif'];
    $tgl = $_POST['tgl'];
    $jumlah_hadir = $_POST['jumlah_hadir'];
    
    if($tgl=='' || $kode_alternatif=='' || $jumlah_hadir=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
//    elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
//         print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_absensi (kode_alternatif, tgl, jumlah_hadir) VALUES ('$kode_alternatif', '$tgl', '$jumlah_hadir')");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiTambah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=data/absensi";
       });
                 </script>';
    }                    
} else if($page=='data/absensi_ubah'){
    $tgl = $_POST['tgl'];
    $jumlah_hadir = $_POST['jumlah_hadir'];

    
    if($tgl=='' || $jumlah_hadir=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_absensi SET 
        tgl='$tgl', 
        jumlah_hadir='$jumlah_hadir' WHERE id_absensi='$_GET[ID]'");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=data/absensi";
       });
                 </script>';
    }    
} else if ($act=='absensi_hapus'){
    $db->query("DELETE FROM tb_absensi WHERE id_absensi='$_GET[ID]'");
     echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=data/absensi';</script>";
}     

/** Pengiriman Barang */    
else if($page=='data/barang_tambah'){
    // $kode = $_POST['kode'];
    $kode_alternatif = $_POST['kode_alternatif'];
    $initial = $_POST['initial'];
    $kode = $_POST['kode'];
    $tgl_invoice = $_POST['tgl_invoice'];
    $fromm = $_POST['fromm'];
    $too = $_POST['too'];
    $nopol = $_POST['nopol'];
    $driver = $_POST['driver'];
    $helper1 = $_POST['helper1'];
    $helper2 = $_POST['helper2'];
    $rate = $_POST['rate'];
    $instv_driver = $_POST['instv_driver'];
    $instv_helper1 = $_POST['instv_helper1'];
    $instv_helper2 = $_POST['instv_helper2'];
    
    if($kode_alternatif=='' || $tgl_invoice=='' || $kode=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        
//    elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
//         print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_pengiriman_barang (
            kode_alternatif,
            initial,
            kode,
            tgl_invoice,
            fromm,
            too,
            nopol,
            driver,
            helper1,
            helper2,
            rate,
            instv_driver, 
            instv_helper1, 
            instv_helper2) VALUES (
                '$kode_alternatif',
                '$initial',
                '$kode',
                '$tgl_invoice',
                '$fromm',
                '$too',
                '$nopol',
                '$driver',
                '$helper1',
                '$helper2',
                '$rate',
                '$instv_driver', 
                '$instv_helper1', 
                '$instv_helper2')");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiTambah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=data/barang";
       });
                 </script>';
    }                    
} else if($page=='data/barang_ubah'){
    $initial = $_POST['initial'];
    $kode = $_POST['kode'];
    $tgl_invoice = $_POST['tgl_invoice'];
    $fromm = $_POST['fromm'];
    $too = $_POST['too'];
    $nopol = $_POST['nopol'];
    $helper1 = $_POST['helper1'];
    $helper2 = $_POST['helper2'];
    $rate = $_POST['rate'];
    $instv_driver = $_POST['instv_driver'];
    $instv_helper1 = $_POST['instv_helper1'];
    $instv_helper2 = $_POST['instv_helper2'];

    
    if($tgl_invoice=='' || $kode=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_pengiriman_barang SET 
        initial='$initial',
        kode='$kode',
        tgl_invoice='$tgl_invoice',
        fromm='$fromm',
        too='$too',
        nopol='$nopol',
        helper1='$helper1',
        helper2='$helper2',
        rate='$rate',
        instv_driver='$instv_driver',
        instv_helper1='$instv_helper1', 
        instv_helper2='$instv_helper2' WHERE id_pb='$_GET[ID]'");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=data/barang";
       });
                 </script>';
    }    
} else if ($act=='barang_hapus'){
    $db->query("DELETE FROM tb_pengiriman_barang WHERE id_pb='$_GET[ID]'");
     echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=data/barang';</script>";
}     

/** KRITERIA */    
else if($page=='subkriteria/subkriteria_tambah'){
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_subkriteria = $_POST['nama_subkriteria'];
    $nilai = $_POST['nilai'];
    
    if($kode_kriteria=='' ||$nilai=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("INSERT INTO tb_subkriteria (kode_kriteria, nama_subkriteria, nilai) VALUES ('$kode_kriteria', '$nama_subkriteria', '$nilai')"); 
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data berhasil DiTambah",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=subkriteria/view";
 });
           </script>';
    }                    
} else if($page=='subkriteria/subkriteria_ubah'){
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_subkriteria = $_POST['nama_subkriteria'];
    $nilai = $_POST['nilai'];

    if( $kode_kriteria==''||$nilai=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
         $db->query("UPDATE tb_subkriteria SET kode_kriteria='$kode_kriteria', nama_subkriteria='$nama_subkriteria', nilai='$nilai' WHERE id_subkriteria='$_GET[ID]'");
        echo '<script>
  swal({
   title: "Good job!",
   text: "Data berhasil DiUbah",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=subkriteria/view";
 });
           </script>';
    }    
} else if ($act=='subkriteria_hapus'){
    $db->query("DELETE FROM tb_subkriteria WHERE id_subkriteria='$_GET[ID]'");
    echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=subkriteria/view';</script>";

   
} 

/** Kenikan gaji FOrm */    
else if($page=='data/kg_tambah'){
    // $kode = $_POST['kode'];
    $nominal = $_POST['nominal'];
    $ket = $_POST['ket'];
    $rank = $_POST['rank'];
    
    if($tgl=='rank' )
        print_msg("Field bertanda * tidak boleh kosong!");
        
   elseif($db->get_results("SELECT * FROM tb_kenaikan_gaji WHERE rank='$rank'"))
   echo '<script>
   swal({
    title: "Toneng!",
    text: "Kode Rank Sudah ada",
    icon: "error",
    button: "oke!",
  }).then(function() {
    window.location = "";
  });
            </script>';
    else{
        $db->query("INSERT INTO tb_kenaikan_gaji (nominal, ket, rank) VALUES ('$nominal', '$ket', '$rank')");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiTambah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=data/kenaikangaji";
       });
                 </script>';
    }                    
} else if($page=='data/kg_ubah'){
    $nominal = $_POST['nominal'];
    $ket = $_POST['ket'];
    $rank = $_POST['rank'];

    
    if($nominal=='' || $rank=='')
        print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_kenaikan_gaji WHERE rank='$rank'"))
        echo '<script>
        swal({
         title: "Toneng!",
         text: "Kode Rank Sudah ada",
         icon: "error",
         button: "oke!",
       }).then(function() {
         window.location = "";
       });
                 </script>';
    else{
        $db->query("UPDATE tb_kenaikan_gaji SET 
        nominal='$nominal', 
        ket='$ket',
        rank='$rank' WHERE id_kg='$_GET[ID]'");
        echo '<script>
        swal({
         title: "Good job!",
         text: "Data berhasil DiUbah",
         icon: "success",
         button: "oke!",
       }).then(function() {
         window.location = "?page=data/kenaikangaji";
       });
                 </script>';
    }    
} else if ($act=='kg_hapus'){
    $db->query("DELETE FROM tb_kenaikan_gaji WHERE id_kg='$_GET[ID]'");
     echo"<script>alert('Data Berhasil DiHapus'); window.location='hm.php?page=data/kenaikangaji';</script>";
}    