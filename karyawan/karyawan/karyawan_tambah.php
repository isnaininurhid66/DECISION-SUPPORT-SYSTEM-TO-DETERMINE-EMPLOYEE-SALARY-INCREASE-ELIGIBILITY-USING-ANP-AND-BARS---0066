<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah karyawan</h4>
                            </div>
<div class="card-body">
        <?php if($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" value="<?=set_value('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'KARYAWAN', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="username" value="<?=set_value('username')?>"/>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="password" value="<?=set_value('password')?>"/>
            </div>
            <div class="form-group">
                <label>Nama karyawan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?=set_value('nama_alternatif')?>"/>
            </div>
            <div class="form-group">
                <label>Tahun<span class="text-danger">*</span></label>
                <select class="form-control"  name="id_periode" >
                <?php
        $rows = $db->get_results("SELECT * FROM tb_periode ORDER BY id");
        foreach($rows as $row):?>
                                                <option value="<?=$row->id?>">Tahun <?=$row->tahun?></option>
                                                <?php endforeach;?>
                                            </select>
            </div>
            <div class="form-group">
                <label>Tahun Masuk Kerja <span class="text-danger">*</span></label>
                <input class="form-control" type="month" name="tahun_masuk" value="<?=set_value('tahun_masuk')?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=karyawan/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>

