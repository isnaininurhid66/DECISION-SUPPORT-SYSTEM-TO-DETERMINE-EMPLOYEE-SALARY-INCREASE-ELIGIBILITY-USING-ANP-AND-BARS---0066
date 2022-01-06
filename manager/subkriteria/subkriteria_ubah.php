<?php
    $row = $db->get_row("SELECT * FROM tb_subkriteria WHERE id_subkriteria='$_GET[ID]'"); 
?>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah subkriteria (<?=set_value('nama_subkriteria', $row->nama_subkriteria)?>)</h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
           <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_subkriteria" value="<?=$row->id_subkriteria?>" readonly/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <select  class="form-control" id="sel2" name="kode_kriteria" >
                <?php
            $rows2 = $db->get_results("SELECT * FROM tb_kriteria");
            
            foreach($rows2 as $row2):?>
                                                <option value="<?=$row2->kode_kriteria?>"><?=$row2->nama_kriteria?></option>
                                                <?php endforeach?>
                                            </select>
            </div> 
            <div class="form-group">
                <label>Nama subkriteria<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_subkriteria" value="<?=set_value('nama', $row->nama_subkriteria)?>"/>
            </div>
            <div class="form-group">
                <label>Nilai <span class="text-danger"></span></label>
               <input class="form-control" type="text" name="nilai" value="<?=set_value('bobot', $row->nilai)?>"/>
            </div>    
                 
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=subkriteria/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

            </div>
        </form>
    </div>
</div>
</div>
</div>