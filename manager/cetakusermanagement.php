<?php
include '../views/config.php';
require('../pdf/fpdf.php');
date_default_timezone_set('Asia/Jakarta');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('https://i.ibb.co/xg4rmPF/Whats-App-Image-2021-12-08-at-17-41-23.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT REMBA RAYA NIAGA',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : ',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Graha Komando (Komando Virtual Office) Lt.3, Jl.Cipinang Indah Raya,RT.001/RW.013, Jakarta Timur',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : https://www.lerenglawu.com/ - Email : rembarayaniaga@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data User Management",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y | H:i"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'NAMA LENGKAP', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'EMAIL', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Sebagai', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NO TELPON', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TEMPAT LAHIR', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'TANGGAL LAHIR', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;

$user = mysqli_query($koneksi, "SELECT * FROM tb_alternatif;");
while ($u = mysqli_fetch_array($user)) {

	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(4, 0.8, $u['nama_alternatif'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $u['email'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $u['hak_akses'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $u['no'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $u['tempat_lahir'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $u['tanggal_lahir'], 1, 1,'C');
	
	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"Tanggal: ".date("d/m/Y"),0,0,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"Mengetahui",0,10,'C');

$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"SUGENG",0,10,'C');
$pdf->Cell(40.5,0.7,"Direktur",0,10,'C');


$pdf->Output("LAPORAN_KARYAWAN.pdf","I");

?>

