<?php
/**
 * Nama File : Config.php
 * File Ini berisi beberapa data penting seperti
 * Data koneksi ke database
 * Secret Kode
 * dan data lain yang nantinya akan digunakan secara terus-menerus
 */

 # rubahlah sesuai alamat website kamu
$url    = 'http://localhost:27/skripsi_isnaini/';

 # host untuk database, biasanya 'localhost'
$dbhost = 'localhost';

 # username untuk mengakses database, jika dilokal biasanya 'root'
$dbuser = 'root';

 # password untuk mengakses databae, jika dilokal biasanya kosong
$dbpass = '';

 # nama database yang akan digunakan
$dbname = 'skripsi_isnaini';



 # koneksi Database
$koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); 
$conn   = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);
$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)or die(mysqli_error($koneksi));
$konek = mysql_connect($dbhost, $dbuser, $dbpass) or die("Gagal konek ke server MySQL" .mysql_error());
$bukadb = mysql_select_db($dbname) or die("Gagal membuka database $dbname" .mysql_error());	


 if (mysqli_connect_errno()) {
    printf("Database connection failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($connect, "utf8");
 # Check koneksi, berhasil atau tidak
 if( $koneksi->connect_error )
 {
 	die( 'Oops!! Koneksi Gagal : '. $koneksi->connect_error );
 }
 $url = rtrim($url,'/');
 function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function format_ribuan($nilai)
{
    $n =  number_format($nilai,0,',','.');
    return $n;
}

if (mysqli_connect_errno()) {
 printf("Database connection failed: %s\n", mysqli_connect_error());
 exit();
}

mysqli_set_charset($connect, "utf8");
 # Check koneksi, berhasil atau tidak
if( $koneksi->connect_error )
{
  die( 'Oops!! Koneksi Gagal : '. $koneksi->connect_error );
}

$url = rtrim($url,'/');
?>

