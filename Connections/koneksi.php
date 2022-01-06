<?php
# FileName="Connection_php_mysqli.htm"
# Type="mysqli"
# HTTP="true"
#KETERANGAN LEVEL:
#MASTER = 1 ->AI DIMULAI DARI 1
#ADMIN = 2 ->AI DIMULAI DARI 10
#GURU = 3 ->AI DIMULAI DARI 100
#STAFF =  ->AI DIMULAI DARI 500
#SISWA = 4 ->AI DIMULAI DARI 1000

$hostname_koneksi = "localhost";
$database_koneksi = "skripsi_isnaini";
$username_koneksi = "root";
$password_koneksi = "";
$koneksi = mysqli_connect($hostname_koneksi, $username_koneksi, $password_koneksi) or trigger_error(mysqli_error($koneksi),E_USER_ERROR); 

//TANGGAL
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$bulan= date("m");
$tglsekarang = date("Y-m-d", $tanggal);
$today = date("Y-m-d H:i:s");
$pukul=date("H:i:s");
$tahun=date("Y");
$jam=date("H");
$menit=date("i");
$detik=date("s");
$kodeacak = substr(time(),5);
//PESAN
function title($class, $judul, $isi) {
	echo "<div class='animated flash callout callout-".$class."'>
	<h4>".$judul."</h4>
	".$isi."</div>";
}

function pesan($title, $isi) {
	echo "<div class='animated flash callout callout-".$title."'>
	<h4>Informasi</h4>
	".$isi."</div>";
}

function pesanlink($title, $arahkan) {
	echo "<script>
	alert('".$title."');
	document.location = '".$arahkan."';
	</script>";
}

//SANITASI
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($koneksi, $theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($koneksi, $theValue) : mysqli_escape_string($koneksi, $theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//SESI LOGIN






//FUNCTION UPLOAD PHOTO
function upload($name) {
	
	$namaFile = $_FILES[$name]['name'];
	$ukuranFile = $_FILES[$name]['size'];
	$error = $_FILES[$name]['error'];
	$tmpName = $_FILES[$name]['tmp_name'];
	
	 
	 if ( $error === 4 ) {
		//pesanlink('Oops! Gambar masih kosong','?page=insert/photo');
		return false;
	} 
	
	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('File yang diupload bukan gambar!!');
			</script>";
		return false;	
	}
	
	if ( $ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran file terlalu besar, minimal < 1 MB');
			</script>";
		//return false;
	}
	
	//rename file gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, '../photos/' . $namaFileBaru);
	
	return $namaFileBaru;
}

function photopos($name) {
	
	$namaFile = $_FILES[$name]['name'];
	$ukuranFile = $_FILES[$name]['size'];
	$error = $_FILES[$name]['error'];
	$tmpName = $_FILES[$name]['tmp_name'];
	 
	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
	/* if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('File yang diupload bukan gambar!!');
			</script>";
		return false;	
	} */
	
	if ( $ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran file terlalu besar, minimal < 1 MB');
			</script>";
		//return false;
	}
	
	//rename file gambar
	if ( $error !== 4 ) {
		
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, '../photo_pos/' . $namaFileBaru);
	
	return $namaFileBaru;
	} 
}


//FUNCTION UPLOAD PHOTO
function feature_image($name) {
	
	$namaFile = $_FILES[$name]['name'];
	$ukuranFile = $_FILES[$name]['size'];
	$error = $_FILES[$name]['error'];
	$tmpName = $_FILES[$name]['tmp_name'];
	
	 
	 if ( $error === 4 ) {
		//pesanlink('Oops! Gambar masih kosong','?page=insert/photo');
		return false;
	} 
	
	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('File yang diupload bukan gambar!!');
			</script>";
		return false;	
	}
	
	if ( $ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran file terlalu besar, minimal < 1 MB');
			</script>";
		//return false;
	}
	
	//rename file gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, '../feature_images/' . $namaFileBaru);
	
	return $namaFileBaru;
}

//FUNCTION UPLOAD PHOTO
function dokumentasi($name) {
	
	$namaFile = $_FILES[$name]['name'];
	$ukuranFile = $_FILES[$name]['size'];
	$error = $_FILES[$name]['error'];
	$tmpName = $_FILES[$name]['tmp_name'];
	
	 
	 if ( $error === 4 ) {
		//pesanlink('Oops! Gambar masih kosong','?page=insert/photo');
		return false;
	} 
	
	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('File yang diupload bukan gambar!!');
			</script>";
		return false;	
	}
	
	if ( $ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran file terlalu besar, minimal < 1 MB');
			</script>";
		//return false;
	}
	
	//rename file gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, '../dokumentasi_image/' . $namaFileBaru);
	
	return $namaFileBaru;
}

//MEMBUAT FUNGSI TERBILANG
function penyebut($nilai) {
		$nilai = abs($nilai);
//		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEBILAN", "SEPULUH", "SEBELAS");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " BELAS";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " SERIBU" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " TRILYUN" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "MINUS ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

?>