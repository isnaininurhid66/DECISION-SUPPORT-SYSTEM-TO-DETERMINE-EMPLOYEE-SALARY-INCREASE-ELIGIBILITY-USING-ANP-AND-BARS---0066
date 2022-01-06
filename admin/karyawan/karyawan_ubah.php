<?php
    $id = stripslashes(strip_tags(htmlspecialchars($_GET['ID'],ENT_QUOTES)));
    $row = $db->get_row("SELECT * FROM tb_alternatif a INNER JOIN tb_periode p ON a.id_periode=p.id WHERE kode_alternatif='".$id."'"); 
?>
<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah karyawan</h4>
                            </div>
<div class="card-body">
        <?php if($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" readonly="readonly" value="<?=$row->kode_alternatif?>"/>
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="username" value="<?=$row->username?>"/>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="password" value="<?=$row->password?>"/>
            </div>
            <div class="form-group">
                <label>Nama karyawan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?=$row->nama_alternatif?>"/>
            </div>
            <div class="form-group">
                <label>Kelas<span class="text-danger">*</span></label>
                <select class="form-control"  name="id_periode" >
                <option value="<?=$row->id_periode?>">Kelas <?=$row->tahun?></option>

                <?php
        $rows2 = $db->get_results("SELECT * FROM tb_periode ORDER BY id");
        foreach($rows2 as $row2):?>
                                                <option value="<?=$row2->id?>">Tahun <?=$row2->tahun?></option>
                                                <?php endforeach;?>
                                            </select>
            </div>
            <div class="form-group">
                <label>Tahun Masuk Kerja <span class="text-danger">*</span></label>
                <input class="form-control" type="month" name="tahun_masuk" value="<?=$row->tahun_masuk?>"/>
            </div>

            <div class="form-group">
                <label>Upluad Foto <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="foto" value="<?=set_value('foto_user')?>"/>
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