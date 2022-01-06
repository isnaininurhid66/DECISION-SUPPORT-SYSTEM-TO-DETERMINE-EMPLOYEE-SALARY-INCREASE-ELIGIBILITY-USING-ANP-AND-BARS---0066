<?php
session_start();

# check apakah ada akse post dari halaman login?, jika tidak kembali kehalaman depan
if( !isset($_POST['username']) ) { header('location:/'); exit(); }

# set nilai default dari error,
$error = '';

require ( 'config.php' );

$username = trim( $_POST['username'] );
$password = trim( $_POST['password'] );

if( strlen($username) < 2 )
{
	# jika ada error dari kolom username yang kosong
	$error = '   
	<div class="alert alert-warning alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="alert-heading font-size-h5 font-w700 mb-5">Warning</h3>
                                        <p class="mb-0">
                                            Username Tidak Boleh Kosong <a class="alert-link" href="javascript:void(0)">link</a>!
                                        </p>
                                    </div>                                      
  
	';
}else if( strlen($password) < 2 )
{
	# jika ada error dari kolom password yang kosong
	$error =  '   
	<div class="alert alert-warning alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="alert-heading font-size-h5 font-w700 mb-5">Warning</h3>
                                        <p class="mb-0">
                                            Password Tidak Boleh Kosong <a class="alert-link" href="javascript:void(0)">link</a>!
                                        </p>
                                    </div>                                       
  
	';
}else{
	// if (md5($_POST['pin']) <> $_SESSION['image_random_value'])
	// {
	// echo'<script>alert(\'Kode Captcha Salah ! !\')
	// setTimeout(\'location.href="./"\' ,0);</script>';
	// exit;
	// }
	# Escape String, ubah semua karakter ke bentuk string
	$username = $koneksi->escape_string($username);
	$password = $koneksi->escape_string($password);

	# hash dengan SHA1
	$password = ($password);

	# SQL command untuk memilih data berdasarkan parameter $username dan $password yang 
	# di inputkan
	$sql = "SELECT 
			kode_alternatif, 
			username, 
			hak_akses, 
			nama_alternatif, 
			foto_user, 
			id_periode, 
			tempat_lahir, 
			tanggal_lahir, 
			alamat_alternatif, 
			no, 
			email,
			keterangan, 
			total, 
			rank, 
			id_periode FROM tb_alternatif 
			WHERE username='$username' 
			AND password='$password' LIMIT 1";

	# melakukan perintah
	$query = $koneksi->query($sql);

	# check query
	if( !$query )
	{
		die( 'Oops!! Database gagal '. $koneksi->error );
	}

	# check hasil perintah
	if( $query->num_rows == 1 )
	{	
		# jika data yang dimaksud ada
		# maka ditampilkan
		$row =$query->fetch_assoc();
		
		# data nama disimpan di session browser
		$_SESSION['kode_alternatif'] = $row['kode_alternatif']; 
		$_SESSION['akses']	   = $row['hak_akses'];
		$_SESSION['username']	   = $row['username'];
		$_SESSION['hak_akses']	   = $row['hak_akses'];
		$_SESSION['nama_alternatif']	   = $row['nama_alternatif'];
		$_SESSION['foto_user']	   = $row['foto_user'];
		$_SESSION['id_periode']	   = $row['id_periode'];
		$_SESSION['tempat_lahir']	   = $row['tempat_lahir'];
		$_SESSION['tanggal_lahir']	   = $row['tanggal_lahir'];
		$_SESSION['alamat_alternatif']	   = $row['alamat_alternatif'];
		$_SESSION['no']	   = $row['no'];
		$_SESSION['email']	   = $row['email'];
		$_SESSION['keterangan']	   = $row['keterangan'];
		$_SESSION['total']	   = $row['total'];
		$_SESSION['rank']	   = $row['rank'];
		$_SESSION['id_periode']	   = $row['id_periode'];


		if( $row['hak_akses'] == 'admin')
		{
			# data hak Admin Sekertaris di set
			$_SESSION['saya_admin']= 'TRUE';
		}

		if( $row['hak_akses'] == 'karyawan')
		{
			# data hak Kepala Sekolah di set
			$_SESSION['saya_karyawan']= 'TRUE';
		}

		if( $row['hak_akses'] == 'manager')
		{
			# data hak guru di set
			$_SESSION['saya_manager']= 'TRUE';
		}
		

		# menuju halaman sesuai hak akses
		header('location:'.$url.'/'.$_SESSION['akses'].'/hm.php');
		exit();

	}else{
		
		# jika data yang dimaksud tidak ada
		$error = '   
		<div class="alert alert-danger alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<h3 class="alert-heading font-size-h5 font-w700 mb-5">Login Gagal!!</h3>
		<p class="mb-0">
			Username/Password Yang Anda Masukan Salah!!</a>!
		</p>
	</div>                                        
      
        ';
	}

}

if( !empty($error) )
{
	# simpan error pada session
	$_SESSION['error'] = $error;
	header('location:'.$url.'/');
	exit();
}