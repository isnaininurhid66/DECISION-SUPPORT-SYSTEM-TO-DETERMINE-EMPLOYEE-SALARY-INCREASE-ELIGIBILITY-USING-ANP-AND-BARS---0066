                <!-- <a class="btn btn-primary" href="cetak.php?m=alternatif&q=<?=$_GET[q]?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a> -->
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kriteria ANP</h4>
                                <a class="btn btn-primary" href="?page=kriteriaanp/kriteriaanp_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            </div>
<div class="card-body">
<div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kriteria</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $rows = $db->get_results("SELECT * FROM tb_kriteria  ORDER BY kode_kriteria");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->kode_kriteria?></td>
            <td><?=$row->nama_kriteria?></td>
            <td>
                <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=kriteriaanp/kriteriaanp_ubah&ID=<?=$row->kode_kriteria?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger shadow btn-xs sharp" href="aksi.php?act=kriteriaanp_hapus&ID=<?=$row->kode_kriteria?>" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
                </table>
  
</div>
</div>
</div>
</div>