<div class="page-header">
    <h1>Tambah Periode</h1>
</div>
<div class="col-12">
<div class="card">
<div class="card-body">
        <?php if($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Nama Kelas <span class="text-danger">*</span></label>
                <input class="form-control" type="text" min="0" max="7" step="1" name="tahun" value="<?=set_value('tahun')?>"/>
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