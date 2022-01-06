                <!-- <a class="btn btn-primary" href="cetak.php?m=alternatif&q=<?=$_GET[q]?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a> -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Kenaikan Gaji Karyawan</h4>
                                <a class="btn btn-primary" href="?page=data/kg_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            </div>
<div class="card-body">
<div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                <thead>
            <tr>
                <th>No</th>
                <th>Nominal Gaji</th>
                <th>Ket</th>
                <th>Rank</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $rows = $db->get_results("SELECT * FROM tb_kenaikan_gaji Order By id_kg");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->nominal?></td>
            <td><?=$row->ket?></td>
            <td><?=$row->rank?></td>

            <td>
                <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=data/kg_ubah&ID=<?=$row->id_kg?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger shadow btn-xs sharp" href="aksi.php?act=kg_hapus&ID=<?=$row->id_kg?>" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
                </table>
  
</div>
</div>
</div>
</div>