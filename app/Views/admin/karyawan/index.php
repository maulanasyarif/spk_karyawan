<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<div class="mt-5">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <div class="card border-info dhadow-lg">
        <div class="card-body">
            <a class="btn btn-sm btn-primary add" href="<?= base_url('add_karyawan') ?>">Tambah Karyawan</a>
            <div class=" responsive mt-3">
                <table id="kriteria" class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <td scope="col" style="width: 5%; text-align: center;">No</td>
                            <td scope="col">Nama Karyawan</td>
                            <td scope="col">Alamat</td>
                            <td scope="col">Phone</td>
                            <td scope="col" style="width: 20%; text-align: center;">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($karyawan as $k) {
                        ?>
                            <tr>
                                <td style="width: 5%; text-align: center;"><?php echo ++$start ?></td>
                                <td><?php echo $k['nama_sekolah'] ?></td>
                                <td><?php echo $k['alamat_sekolah'] ?></td>
                                <td><?php echo $k['no_telpon'] ?></td>
                                <td style="text-align:center" width="300px">
                                    <?php
                                    echo anchor(site_url('detil_karyawan/' . $k['id_sekolah']), 'Edit', array('class' => 'btn edit btn-sm btn-warning'));
                                    echo '  ';
                                    echo anchor(site_url('destroy_karayawan/' . $k['id_sekolah']), 'Delete', array('class' => 'btn btn-sm btn-danger', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'));
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <?= $pager->Links() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>