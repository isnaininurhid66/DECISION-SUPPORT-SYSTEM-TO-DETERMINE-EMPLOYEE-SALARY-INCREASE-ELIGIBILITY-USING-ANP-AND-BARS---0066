<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah  Gaji</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php'?>
        <form method="post">
           
            <div class="form-group">
                <label>Nominal Gaji <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="nominal" value="<?=set_value('nominal')?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                 <input class="form-control" type="ket" name="ket" value="<?=set_value('ket')?>"/>
            </div>
            <div class="form-group">
                <label>Rank <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="rank" value="<?=set_value('rank')?>"/>
            </div>
            <!-- <div class="form-group">
                <label>Pilih Karyawan <span class="text-danger">*</span></label>
                <select required name='kode_alternatif' id='kode_alternatif' class='required select form-control'  onchange='showtb_alternatif()' required data-placeholder="PILIH tb_alternatif">
                            <option value=''></option>
                           
                    </select>
            </div> -->
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=data/kenaikangaji"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>