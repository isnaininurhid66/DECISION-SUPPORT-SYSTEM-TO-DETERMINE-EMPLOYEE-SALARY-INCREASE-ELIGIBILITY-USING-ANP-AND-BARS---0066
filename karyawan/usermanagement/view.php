
 <p><a href="?page=usermanagement/usermanagement_tambah" class="btn btn-xs btn-primary"><span class="fa fa-save"></span> Insert Data</a> </p>
  <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data usermanagement</h4>
                            </div>
<div class="card-body">
<div class="table-responsive">
<table  id="example3" class="display" style="min-width: 845px">
<thead>
   <tr bgcolor="#709FED">
     <th>NO</th>
     <th>NAMA</th>
     <th>USERNAME</th>
     <th>PASSWORD</th>
     <th>Periode</th>
     <th>TEMPAT LAHIR</th>
     <th>TANGGAL LAHIR</th>
     <th>ALAMAT</th>
     <th>NO TELP</th>
     <th>EMAIL</th>
     <th>Role</th>
     <th>Action</th>
   </tr>
   </thead>
   <tbody>
   <?php
                            $tahun=get_tahun_aktif_id();
                            $rows = $db->get_results("SELECT * FROM tb_alternatif a INNER JOIN tb_periode p ON a.id_periode=p.id
                                WHERE hak_akses='admin' OR hak_akses='manager'  ORDER BY kode_alternatif");
                            $no=0;
                            foreach($rows as $row):?>
     <tr>
       <td><?=++$no ?></td>
       <td><?=$row->nama_alternatif?></td>
       <td><?=$row->username?></td>
       <td><?=$row->password?></td>
       <td><?=$row->tahun?></td>
       <td><?=$row->tempat_lahir?></td>
       <td><?=$row->tanggal_lahir?></td>
       <td><?=$row->alamat_alternatif?></td>
       <td><?=$row->no?></td>
       <td><?=$row->email?></td>
       <td><?=$row->hak_akses?></td>
       <td>
													<div class="d-flex">
														<a href="?page=usermanagement/usermanagement_ubah&amp;ID=<?=$row->kode_alternatif?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="aksi.php?act=usermanagement_hapus&amp;ID=<?=$row->kode_alternatif?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>	
       </tr>
       <?php endforeach;?>     
      </tbody>
 </table> 



</div>
</div>
</div>
</div>
