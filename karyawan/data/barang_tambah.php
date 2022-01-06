<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Pengiriman Barang</h4>
                            </div>
<div class="card-body">
<?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Pilih Karyawan <span class="text-danger">*</span></label>
                <select required name='kode_alternatif' id='kode_alternatif' class='required select form-control'  onchange='showtb_alternatif()' required data-placeholder="PILIH tb_alternatif">
                            <option value=''></option>
                            <?php 
                            $tampil=mysql_query("SELECT * FROM tb_alternatif WHERE hak_akses='karyawan' ORDER BY kode_alternatif asc");
                            while($r=mysql_fetch_array($tampil)){
                            echo "<option value=$r[kode_alternatif]>$r[kode_alternatif]|$r[nama_alternatif]</option>";
                            }
                            ?>
                    </select>
            </div>
            <div class="form-group">
                <label>Initial <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="initial" value="<?=set_value('initial')?>"/>
            </div>
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="kode" value="<?=set_value('kode')?>"/>
            </div>
            <div class="form-group">
                <label>Tanggal Invoice <span class="text-danger">*</span></label>
                 <input class="form-control" type="date" name="tgl_invoice" value="<?=set_value('tgl_invoice')?>"/>
            </div>
            <div class="form-group">
                <label>From <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="fromm" value="<?=set_value('fromm')?>"/>
            </div>
            <div class="form-group">
                <label>To <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="too" value="<?=set_value('too')?>"/>
            </div>
            <div class="form-group">
                <label>Nopol <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="nopol" value="<?=set_value('nopol')?>"/>
            </div>
            <div class="form-group">
                <label>Nama Driver <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="driver" value="<?php echo $nama_alternatif2;?>"/>
            </div>
            <div class="form-group">
                <label>Helper 1 <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="helper1" value="<?=set_value('helper1')?>"/>
            </div>
            <div class="form-group">
                <label>Helper 2 <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" name="helper2" value="<?=set_value('helper2')?>"/>
            </div>
           
            <div class="form-group">
                <label>Rate <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="rate" value="<?=set_value('rate')?>"/>
            </div>
            <div class="form-group">
                <label>Instv Driver <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="instv_driver" value="<?=set_value('instv_driver')?>"/>
            </div>
            <div class="form-group">
                <label>Instv Helper 1 <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="instv_helper1" value="<?=set_value('instv_helper1')?>"/>
            </div>
            <div class="form-group">
                <label>Instv Helper 2 <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="instv_helper2" value="<?=set_value('instv_helper2')?>"/>
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