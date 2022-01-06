<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Kriteria ANP</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <!--
                    <input class="form-control" type="text" name="kode" value="<?=$_POST[kode]?>"/>
                -->
                <input class="form-control" type="text" name="kode" value="<?=set_value('kode_kriteria', kode_oto('kode_kriteria', 'tb_kriteria', 'C', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="nama" value="<?=set_value('nama_kriteria')?>"/>
                <!--
                    <input class="form-control" type="text" name="nama" value="<?=$_POST[nama]?>"/>
                -->
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