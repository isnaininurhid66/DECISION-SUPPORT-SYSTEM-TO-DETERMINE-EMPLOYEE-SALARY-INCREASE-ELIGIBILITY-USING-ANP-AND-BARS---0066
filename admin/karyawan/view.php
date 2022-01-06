<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data karyawan</h4>
                                <div>
                                <a class="btn btn-primary" href="?page=karyawan/karyawan_tambah"></span> Tambah</a>
                                <a class="btn btn-danger" href="cetakkaryawan.php" target="_blank">Cetak</a>
</div>
                            </div>

<div class="card-body">
<div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama karyawan</th>
                            <th>Periode Kenaikan Gaji</th>
                            <th>Tahun Masuk</th>
                            <th>Foto</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                            <?php
                            $tahun=get_tahun_aktif_id();
                            $rows = $db->get_results("SELECT * FROM tb_alternatif a INNER JOIN tb_periode p ON a.id_periode=p.id
                                WHERE hak_akses='karyawan' ORDER BY kode_alternatif");
                            $no=0;
                            foreach($rows as $row):?>
                        <tr>
                            <td><?=++$no ?></td>
                            <td><?=$row->kode_alternatif?></td>
                            <td><?=$row->username?></td>
                            <td><?=$row->password?></td>
                            <td><?=$row->nama_alternatif?></td>
                            <td>Tahun <?=$row->tahun?></td>
                            <td> <?=$row->tahun_masuk?></td>
                            <td>
                                    <div class="invoice-list">  
									<img src="../<?=$row->foto_user?>" alt="" class="rounded-lg mr-2" width="50">
									</div>	
                            </td>

                            <td>
                                <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=karyawan/karyawan_ubah&ID=<?=$row->kode_alternatif?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger shadow btn-xs sharp" href="aksi.php?act=karyawan_hapus&ID=<?=$row->kode_alternatif?>" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                            <?php endforeach;?>
                </table>
  
</div>
</div>
</div>
</div>