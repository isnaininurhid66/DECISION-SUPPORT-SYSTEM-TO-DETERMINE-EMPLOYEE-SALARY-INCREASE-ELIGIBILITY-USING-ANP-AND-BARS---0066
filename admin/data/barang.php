                <!-- <a class="btn btn-primary" href="cetak.php?m=alternatif&q=<?=$_GET[q]?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a> -->
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pengiriman Barang</h4>
                                <a class="btn btn-primary" href="?page=data/barang_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            </div>
<div class="card-body">
<div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Initial</th>
                <th>Kode</th>
                <th>Tanggal Invoice</th>
                <th>From</th>
                <th>To</th>
                <th>Nopol</th>
                <th>Driver</th>
                <th>Helper 1</th>
                <th>Helper 2</th>
                <th>Rate</th>
                <th>Instv Driver</th>
                <th>Instv Helper 1</th>
                <th>Instv Helper 2</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $rows = $db->get_results("SELECT * FROM tb_pengiriman_barang a INNER JOIN tb_alternatif b ON a.kode_alternatif=b.kode_alternatif Order By id_pb");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->nama_alternatif?></td>
            <td><?=$row->initial?></td>
            <td><?=$row->kode?></td>
            <td><?=$row->tgl_invoice?></td>
            <td><?=$row->fromm?></td>
            <td><?=$row->too?></td>
            <td><?=$row->nopol?></td>
            <td><?=$row->driver?></td>
            <td><?=$row->helper1?></td>
            <td><?=$row->helper2?></td>
            <td><?=$row->rate?></td>
            <td><?=$row->instv_driver?></td>
            <td><?=$row->instv_helper1?></td>
            <td><?=$row->instv_helper2?></td>

            <td>
                <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=data/barang_ubah&ID=<?=$row->id_pb?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger shadow btn-xs sharp" href="aksi.php?act=barang_hapus&ID=<?=$row->id_pb?>" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
                </table>
  
</div>
</div>
</div>
</div>