<?php  
if ((isset($_GET['id_user'])) && ($_GET['id_user'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_user WHERE id_user=%s",
                       GetSQLValueString($koneksi, $_GET['id_user'], "int"));

  mysqli_select_db($koneksi, $database_koneksi);
  $Result1 = mysqli_query($koneksi, $deleteSQL) or die(mysqli_error($koneksi));
  echo '<script>
  swal({
   title: "Good job!",
   text: "Data Alternatif/usermanagement berhasil dihapus",
   icon: "success",
   button: "oke!",
 }).then(function() {
   window.location = "?page=usermanagement/view";
 });
           </script>';
}
?> 