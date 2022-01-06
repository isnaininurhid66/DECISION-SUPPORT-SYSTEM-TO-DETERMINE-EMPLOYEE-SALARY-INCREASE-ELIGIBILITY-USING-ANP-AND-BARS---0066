<?php  
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  if (empty($_POST['password'])) {
	    $updateSQL = sprintf("UPDATE tb_alternatif SET nama_alternatif=%s, email=%s, alamat_alternatif=%s, tanggal_lahir=%s, no=%s, hak_akses=%s WHERE kode_alternatif=%s",
                       GetSQLValueString($koneksi, $_POST['nama_alternatif'], "text"),
                       GetSQLValueString($koneksi, $_POST['email'], "text"),
                       GetSQLValueString($koneksi, $_POST['alamat_alternatif'], "text"),
                       GetSQLValueString($koneksi, $_POST['tanggal_lahir'], "text"),
                       GetSQLValueString($koneksi, $_POST['no'], "text"),
                       GetSQLValueString($koneksi, $_POST['hak_akses'], "text"),
                       GetSQLValueString($koneksi, $_POST['kode_alternatif'], "int"));;
	
	  	mysqli_select_db($koneksi, $database_koneksi);
	 	$Result1 = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));
		
    echo '<script>
  swal({
   title: "Good job!",
   text: "Sukses! Data berhasil diupdate tanpa ganti password",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "";
 });
           </script>';
  }else{
	    $updateSQL = sprintf("UPDATE tb_alternatif SET password=%s, nama_alternatif=%s, email=%s, alamat_alternatif=%s, tanggal_lahir=%s, no=%s, hak_akses=%s WHERE kode_alternatif=%s",
                       GetSQLValueString($koneksi, $_POST['password'], "text"),
                       GetSQLValueString($koneksi, $_POST['nama_alternatif'], "text"),
                       GetSQLValueString($koneksi, $_POST['email'], "text"),
                       GetSQLValueString($koneksi, $_POST['alamat_alternatif'], "text"),
                       GetSQLValueString($koneksi, $_POST['tanggal_lahir'], "text"),
                       GetSQLValueString($koneksi, $_POST['no'], "text"),
                       GetSQLValueString($koneksi, $_POST['hak_akses'], "text"),
                       GetSQLValueString($koneksi, $_POST['kode_alternatif'], "int"));
		
		mysqli_select_db($koneksi, $database_koneksi);
	  	$Result1 = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));	
		
    echo '<script>
  swal({
   title: "Good job!",
   text: "Sukses! Data berhasil diupdate beserta password",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "";
 });
           </script>'; 
  }
}

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_profile = "SELECT * FROM tb_alternatif WHERE kode_alternatif = '".$kode_alternatif2."'";
$rs_profile = mysqli_query($koneksi, $query_rs_profile) or die(mysqli_error($koneksi));
$row_rs_profile = mysqli_fetch_assoc($rs_profile);
$totalRows_rs_profile = mysqli_num_rows($rs_profile);
?> 
 <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengaturan Profile (<?php echo $nama_alternatif2?>)</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table width="373" height="336">
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">Change password *</td>
      <td><input type="password" name="password" value="" size="32" class="form-control input-sm"/></td>
    </tr>
    <tr valign="baseline">
      <td height="21" valign="top" nowrap="nowrap">&nbsp;</td>
      <td><h5>*) <em>Kosongkan jika tidak ingin ganti sandi</em></h5></td>
    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">Nama Lengkap</td>
      <td><input type="text" name="nama_alternatif" value="<?php echo htmlentities($row_rs_profile['nama_alternatif'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm" required/></td>
    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">email</td>
      <td><input type="email" name="email" value="<?php echo htmlentities($row_rs_profile['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm" required/></td>

    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">Address</td>
      <td><input type="text" name="alamat_alternatif" value="<?php echo htmlentities($row_rs_profile['alamat_alternatif'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm" required/></td>
    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">Tanggal Lahir</td>
      <td><input type="date" name="tanggal_lahir" value="<?php echo htmlentities($row_rs_profile['tanggal_lahir'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm" required/></td>
    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">No. Kontak</td>
      <td><input type="text" name="no" value="<?php echo htmlentities($row_rs_profile['no'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm" required/></td>
    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">Hak Akses</td>
      <td><input type="text" name="hak_akses" readonly value="<?php echo htmlentities($row_rs_profile['hak_akses'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control input-sm" required/></td>
    </tr>
    <tr valign="baseline">
      <td valign="top" nowrap="nowrap">&nbsp;</td>
      <td><input type="submit" value="Simpan Perubahan" class="btn btn-warning btn-block" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="kode_alternatif" value="<?php echo $row_rs_profile['kode_alternatif']; ?>" />
</form>
</div>
                            </div>
                        </div>
					</div>