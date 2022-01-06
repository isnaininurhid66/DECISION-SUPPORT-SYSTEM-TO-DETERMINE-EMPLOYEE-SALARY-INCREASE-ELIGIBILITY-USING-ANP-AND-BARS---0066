<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_periode WHERE id='".$id."'"); 
?>
<div class="page-header">
    <h1>Ubah Kelas</h1>
</div>
<div class="col-12">
<div class="card">
<div class="card-body">
        <?php if($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Periode <span class="text-danger">*</span></label>
                <input class="form-control" type="number" min="1999" max="2099" step="1" name="tahun" value="<?=$row->tahun?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=periode/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>