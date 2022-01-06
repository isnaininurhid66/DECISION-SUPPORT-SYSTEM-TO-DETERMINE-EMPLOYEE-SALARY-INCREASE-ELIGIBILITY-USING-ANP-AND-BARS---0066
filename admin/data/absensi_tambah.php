<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Jumlah Kehadiran</h4>
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
                <label>Periode Kehadiran <span class="text-danger">*</span></label>
                 <input class="form-control" type="month" name="tgl" value="<?=set_value('tgl')?>"/>
            </div>
            <div class="form-group">
                <label>Jumlah Hadir <span class="text-danger">*</span></label>
                 <input class="form-control" type="number" name="jumlah_hadir" value="<?=set_value('jumlah_hadir')?>"/>
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=data/absensi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
</div>
</div>
</div>