
<div class="col-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Periode</h4>
                                <a class="btn btn-primary" href="?page=periode/atur_periode_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                            </div>
<div class="card-body">            
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <!-- <th>Status</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $rows = $db->get_results("SELECT * FROM tb_periode ORDER BY id");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td>Periode <?=$row->tahun?></td>
            <!-- <td>
                <?php if ($row->status=='1'){ ?>
                    Aktif
                <?php }else{ ?>
                    Tidak aktif
                <?php } ?>
            </td> -->
            <td>
                <!-- <?php 
                if ($row->status=='0'){ ?>
                    <a class="btn btn-xs btn-success" href="?m=atur_periode_status_ok&ID=<?=$row->id?>"><span class="glyphicon glyphicon-ok"></span></a>
                <?php } ?> -->
                <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=periode/atur_periode_ubah&ID=<?=$row->id?>"><i class="fa fa-pencil"></i></a>
                <!-- <a class="btn btn-xs btn-danger" href="aksi.php?act=atur_periode_hapus&ID=<?=$row->id?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a> -->
            </td>
        </tr>
         </tbody>
        <?php endforeach;?>
                </table>
            </div>
            </div>

</div>
</div>
