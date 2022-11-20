<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<div class="mt-5">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <div class="card border-info shadow-lg">
        <div class="card-body">
            <a class="btn btn-sm btn-primary add" href="<?= base_url('add_sub_kriteria') ?>">Tambah Subkriteria</a>
            <div class=" responsive mt-3">
                <table id="kriteria" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <td scope="col" style="width: 5%; text-align: center;">No</td>
                            <td scope="col">Nama Subkriteria</td>
                            <td scope="col">Nilai</td>
                            <td scope="col" style="width: 15%; text-align: center;">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($subkriteria as $s) {
                        ?>
                            <tr>
                                <td style="width: 5%; text-align: center;"><?php echo ++$start ?></td>
                                <td><?php echo $s['nama_kriteria'] . ' ' . $s['nama_subkriteria'] ?></td>
                                <td>
                                    <?php echo
                                    $s['id_nilai'] == 1 ? 'Sangat Baik'
                                        : ($s['id_nilai'] == 2 ? 'Cukup'
                                            : ($s['id_nilai'] == 3 ? 'Baik'
                                                : ($s['id_nilai'] == 4 ? 'Kurang'
                                                    : 'Sangat Kurang'
                                                )
                                            )
                                        )
                                    ?>
                                </td>
                                <td style="text-align:center" width="300px">
                                    <?php
                                    echo anchor(site_url('detil_sub_kriteria/' . $s['id_subkriteria']), 'Edit', array('class' => 'btn edit btn-sm btn-warning'));
                                    echo '  ';
                                    echo anchor(site_url('destroy_sub_kriteria/' . $s['id_subkriteria']), 'Delete', array('class' => 'btn btn-sm btn-danger', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'));
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