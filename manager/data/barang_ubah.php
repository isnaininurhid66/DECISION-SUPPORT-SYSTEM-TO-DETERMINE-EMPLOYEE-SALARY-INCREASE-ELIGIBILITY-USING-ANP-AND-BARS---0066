<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_pengiriman_barang a INNER JOIN tb_alternatif b ON a.kode_alternatif=b.kode_alternatif WHERE id_pb='".$id."'"); 
?>
<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data Pengiriman Barang</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Nama Karyawan <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  readonly="readonly" value="<?=$row->nama_alternatif?>"/>
            </div>
            <div class="form-group">
                <label>Initial <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="initial" value="<?=$row->initial?>"/>
            </div>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="kode" value="<?=$row->kode?>"/>
            </div>
            <div class="form-group">
                <label>Tanggal Invoice <span class="text-danger">*</span></label>
                 <input class="form-control" type="date" name="tgl_invoice" value="<?=$row->tgl_invoice?>"/>
            </div>
            <div class="form-group">
                <label>From <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="fromm" value="<?=$row->fromm?>"/>
            </div>
            <div class="form-group">
                <label>To <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="too" value="<?=$row->too?>"/>
            </div>
            <div class="form-group">
                <label>Nopol <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="nopol" value="<?=$row->nopol?>"/>
            </div>
            <div class="form-group">
                <label>Nama Driver <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" readonly value="<?=$row->driver?>"/>
            </div>
            <div class="form-group">
                <label>Helper 1 <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="helper1" value="<?=$row->helper1?>"/>
            </div>
            <div class="form-group">
                <label>Helper 2 <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="helper2" value="<?=$row->helper2?>"/>
            </div>
           
            <div class="form-group">
                <label>Rate <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="rate" value="<?=$row->rate?>"/>
            </div>
            <div class="form-group">
                <label>Instv Driver <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="instv_driver" value="<?=$row->instv_driver?>"/>
            </div>
            <div class="form-group">
                <label>Instv Helper 1 <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="instv_helper1" value="<?=$row->instv_helper1?>"/>
            </div>
            <div class="form-group">
                <label>Instv Helper 2 <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="instv_helper2" value="<?=$row->instv_helper2?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=data/barang"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>