<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_kriteria WHERE kode_kriteria='".$id."'"); 
?>
<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah Kriteria ANP</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_kriteria?>"/>
            </div>
            <div class="form-group">
                <label>Nama kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_kriteria?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=kriteriaanp/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>