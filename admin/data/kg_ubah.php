<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_kenaikan_gaji  WHERE id_kg='".$id."'"); 
?>
<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Nominal Kenaikan</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Nominal <span class="text-danger">*</span></label>
                <input class="form-control" type="number"  name="nominal" value="<?=$row->nominal?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ket" value="<?=$row->ket?>"/>
            </div>
            <div class="form-group">
                <label>Rank <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="rank" value="<?=$row->rank?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=data/kenaikangaji"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>