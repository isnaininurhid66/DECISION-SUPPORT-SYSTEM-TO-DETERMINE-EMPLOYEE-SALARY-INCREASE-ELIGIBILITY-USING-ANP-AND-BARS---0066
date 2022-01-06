
<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data SubKriteria Electre & Aras</h4>
                            </div>
  <div class="card-body">
          <div class="panel-heading">
          <div class="form-group">
                <a class="btn btn-primary" href="?page=subkriteria/subkriteria_tambah"><span class="fa fa-save"></span> Tambah SubKriteria</a>
            </div>
    </div>
    <div class="table-responsive">
        <table id="example3" class="display table-responsive-lg">
            <thead><tr>
                <th>Kode SubKriteria</th>
                <th>Nama Kriteria</th>
                <th>Nama SubKriteria</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr></thead>
            <?php
            $rows = $db->get_results("SELECT * FROM tb_kriteria k INNER JOIN tb_subkriteria s ON k.kode_kriteria=s.kode_kriteria ");
            foreach($rows as $row):?>
            <tr>
                
                <td><?=$row->id_subkriteria?></td>
                <td><?=$row->nama_kriteria?></td>
                <td><?=$row->nama_subkriteria?></td>
                <td><?=$row->nilai?></td>
               
                <td>
													<div class="d-flex">
														<a href="?page=subkriteria/subkriteria_ubah&amp;ID=<?=$row->id_subkriteria?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="aksi.php?act=subkriteria_hapus&amp;ID=<?=$row->id_subkriteria?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>	
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>
</div>
</div>