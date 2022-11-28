<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5 d-flex">
    <div class="col-md-10">
        <div class="card shadow-lg border-info">
            <div class="card-header bg-dark text-white">
                <span>Detil Alternatif</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('update_alternatif/' . $alternatif['id_alternatif']) ?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Karyawan</label>
                        <input type="text" class="form-control" value="<?= $karyawan['nama_sekolah'] ?>" disabled>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Kriteria</label>
                            <ol type="1">
                                <?php
                                foreach ($kriteria as $kri) {
                                ?>
                                    <li class="mb-4 mt-3"><?= $kri['nama_kriteria']; ?></li>
                                <?php } ?>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Subkriteria</label>
                            <?php
                            foreach ($subkriteria as $k => $v) {
                            ?>
                                <!-- <?= var_dump($alternatifNilai[$k]) ?> -->
                                <!-- <input type="hidden" name="id_alternatif_nilai" value="<?= $alternatifNilai[0]['id_alternatif'] ?>"> -->
                                <select class="form-control mb-3 select" id="nilai" name="kriteria[<?= $v[0]['id_kriteria'] ?>':'<?= $alternatifNilai[$k]['id_alternatif_nilai'] ?>]">
                                    <option value="">-- Pilih Subkriteria --</option>
                                    <?php
                                    foreach ($v as $val => $value) {
                                    ?>
                                        <option <?= $alternatifNilai[$k]['id_subkriteria'] == $value['id_subkriteria'] ? 'selected' : '' ?> value="<?= $value['id_subkriteria'] ?>"> <?= $value['nama_subkriteria'] ?> </option>
                                    <?php }  ?>
                                </select>
                            <?php }  ?>
                        </div>
                    </div>
                    <div class="uk-button-group">
                        <a type=" submit" class="btn btn-sm btn-outline-warning" href="<?= base_url('alternatif') ?>">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>