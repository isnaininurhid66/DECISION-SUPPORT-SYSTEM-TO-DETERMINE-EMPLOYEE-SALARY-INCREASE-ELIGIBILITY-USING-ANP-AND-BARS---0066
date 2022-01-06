<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_absensi a INNER JOIN tb_alternatif b ON a.kode_alternatif=b.kode_alternatif WHERE id_absensi='".$id."'"); 
?>
<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data Kehadiran</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Nama Karyawan <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  readonly="readonly" value="<?=$row->nama_alternatif?>"/>
            </div>
            <div class="form-group">
                <label>Tanggal Kehadiran <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tgl" value="<?=$row->tgl?>"/>
            </div>
            <div class="form-group">
                <label>Jumlah Kehadiran <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jumlah_hadir" value="<?=$row->jumlah_hadir?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=data/absensi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>