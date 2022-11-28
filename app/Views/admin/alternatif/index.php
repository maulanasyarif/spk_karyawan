<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <div class="card border-info shadow-lg">
        <div class="card-body">
            <a class="btn btn-sm btn-primary add" href="<?= base_url('add_alternatif') ?>">Tambah Alternatif</a>
            <div class=" responsive mt-3">
                <table id="kriteria" class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <td scope="col" style="width: 5%; text-align: center;">No</td>
                            <td scope="col">Nama Karyawan</td>
                            <td scope="col">Alamat Karyawan</td>
                            <td>Status</td>
                            <td scope="col" style="width: 20%; text-align: center;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($alternatif as $a) {
                        ?>
                            <tr>
                                <td style="width: 5%; text-align: center;"><?= ++$start ?></td>
                                <td><?= $a['nama_sekolah'] ?></td>
                                <td><?= $a['alamat_sekolah'] ?></td>
                                <td><?= $a['status'] ?></td>
                                <td>
                                    <?php
                                    echo anchor(site_url('detil_alternatif/' . $a['id_alternatif']), 'Edit', array('class' => 'btn edit btn-sm btn-warning'));
                                    echo '  ';
                                    echo anchor(site_url('destroy_alternatif/' . $a['id_alternatif']), 'Delete', array('class' => 'btn btn-sm btn-danger', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'));
                                    ?>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>