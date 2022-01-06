<?php
    $row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'"); 
?>

<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ubah usermanagement (<?=set_value('nama', $row->nama_alternatif)?>)</h4>
                            </div>
  <div class="card-body">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
           <!-- <div class="form-group">
                <label>Kode<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=set_value('kode_alternatif', $row->kode_alternatif)?>"/>
            </div> -->
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="username"  value="<?=set_value('username', $row->username)?>"/>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="password"  value="<?=set_value('password', $row->password)?>"/>
            </div>
           
            <div class="form-group">
                <label>Nama Alternatif<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=set_value('nama', $row->nama_alternatif)?>"/>
            </div>
            <div class="form-group">
                <label>Alamat<span class="text-danger"></span></label>
               <input class="form-control" type="text" name="alamat" value="<?=set_value('alamat', $row->alamat_alternatif)?>"/>
            </div>  
            <div class="form-group">
                <label>Tempat Lahir<span class="text-danger"></span></label>
               <input class="form-control" type="text" name="tempat_lahir" value="<?=set_value('tempat_lahir', $row->tempat_lahir)?>"/>
            </div>
			<div class="form-group">
                <label>tanggal_lahir<span class="text-danger"></span></label>
               <input class="form-control" type="date" name="tanggal_lahir" value="<?=set_value('tanggal_lahir', $row->tanggal_lahir)?>"/>
            </div> 
            <div class="form-group">
                <label>No Telpon<span class="text-danger"></span></label>
               <input class="form-control" type="number" name="no" value="<?=set_value('no', $row->no)?>"/>
            </div>
            <div class="form-group">
                <label>Email<span class="text-danger"></span></label>
               <input class="form-control" type="email" name="email" value="<?=set_value('email', $row->email)?>"/>
            </div>
            <!-- <input class="form-control" type="hidden"  name="hak_akses"  value="<?=set_value('hak_akses', $row->hak_akses)?>"/> -->
            <div class="form-group">
                <label>Hak Akses <span class="text-danger">*</span></label>
                <select  class="form-control" name="hak_akses" >
                <option value="<?=set_value('hak_akses', $row->hak_akses)?>"><?=set_value('hak_akses', $row->hak_akses)?></option>

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