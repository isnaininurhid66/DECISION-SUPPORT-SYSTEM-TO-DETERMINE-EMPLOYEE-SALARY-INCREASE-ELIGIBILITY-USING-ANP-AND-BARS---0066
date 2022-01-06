
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah usermanagement</h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" value="<?=set_value('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'USER', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="username"  value="<?=set_value('username')?>"/>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="password"  value="<?=set_value('password')?>"/>
            </div>
            <div class="form-group">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="nama_alternatif"  value="<?=set_value('nama_alternatif')?>"/>
            </div>
			<div class="form-group">
                <label>Alamat Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="alamat_alternatif"  value="<?=set_value('alamat_alternatif')?>"/>
            </div>
			<div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="date"  name="tanggal_lahir"  value="<?=set_value('tanggal_lahir')?>"/>
            </div>
            <!-- <input class="form-control" type="hidden"  name="hak_akses"  value="admin"/> -->
            
            <div class="form-group">
                <label>Hak Akses <span class="text-danger">*</span></label>
                <select class="form-control"  name="hak_akses" >
                                                <option value="admin">Admin</option>
                                                <option value="manager">Manager</option>
                                            </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?page=usermanagement/view"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>