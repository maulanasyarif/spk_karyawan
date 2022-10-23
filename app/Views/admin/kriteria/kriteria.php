<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <a class="btn btn-sm btn-primary add" href="<?= base_url('add_kriteria') ?>">Tambah Kriteria</a>
    <div class=" responsive mt-3">
        <table id="kriteria" class="table table-bordered">
            <thead>
                <tr>
                    <td scope="col" style="width: 5%; text-align: center;">No</td>
                    <td scope="col">Nama Kriteria</td>
                    <td scope="col" style="width: 20%; text-align: center;">Action</td>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($kriteria as $k) {
                ?>
                    <tr>
                        <td style="width: 5%; text-align: center;"><?php echo ++$start ?></td>
                        <td><?php echo $k['nama_kriteria'] ?></td>
                        <td style="text-align:center" width="300px">
                            <?php
                            echo anchor(site_url('detil_kriteria/' . $k['id_kriteria']), 'Edit', array('class' => 'btn edit btn-sm btn-warning'));
                            echo '  ';
                            echo anchor(site_url('destroy_kriteria/' . $k['id_kriteria']), 'Delete', array('class' => 'btn btn-sm btn-danger', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'));
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>