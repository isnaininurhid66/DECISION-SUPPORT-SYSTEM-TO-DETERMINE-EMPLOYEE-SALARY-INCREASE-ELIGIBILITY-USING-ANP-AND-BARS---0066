<div class="page-header">
    <h1>Tambah SubKriteria</h1>
</div>
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah SubKriteria </h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?page=subkriteria/subkriteria_tambah">
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <select  class="form-control" id="sel2" name="kode_kriteria" >
                <?php
            $rows = $db->get_results("SELECT * FROM tb_kriteria");
            
            foreach($rows as $row):?>
                                                <option value="<?=$row->kode_kriteria?>"><?=$row->nama_kriteria?></option>
                                                <?php endforeach?>
                                            </select>
            </div>        
            <div class="form-group">
                <label>Nama SubKriteria<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_subkriteria" value="<?=set_value('nama_subkriteria')?>"/>
            </div>             
            <div class="form-group">
                <label>Nilai <span class="text-danger"></span></label>
                <input class="form-control" type="text" name="nilai" value="<?=set_value('nilai')?>"/>
            </div> 
              
            
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=subkriteria/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>