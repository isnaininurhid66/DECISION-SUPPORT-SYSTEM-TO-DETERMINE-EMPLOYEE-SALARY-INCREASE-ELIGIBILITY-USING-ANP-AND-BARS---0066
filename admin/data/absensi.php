                <!-- <a class="btn btn-primary" href="cetak.php?m=alternatif&q=<?=$_GET[q]?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a> -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Kehadiran Karyawan</h4>
                                <a class="btn btn-primary" href="?page=data/absensi_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            </div>
<div class="card-body">
<div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Periode Kehadiran</th>
                <th>Jumlah Kehadiran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $rows = $db->get_results("SELECT * FROM tb_absensi a INNER JOIN tb_alternatif b ON a.kode_alternatif=b.kode_alternatif Order By id_absensi");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->nama_alternatif?></td>
            <td><?=$row->tgl?></td>
            <td><?=$row->jumlah_hadir?></td>

            <td>
                <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=data/absensi_ubah&ID=<?=$row->id_absensi?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger shadow btn-xs sharp" href="aksi.php?act=absensi_hapus&ID=<?=$row->id_absensi?>" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
                </table>
  
</div>
</div>
</div>
</div>