<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5 d-flex">
    <div class="col-md-10">
        <div class="card shadow-lg border-info">
            <div class="card-header bg-dark text-white">
                <span>Tambah Alternatif</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/create_alternatif') ?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Karyawan</label>
                        <select class="form-select" aria-label="Default select example" name="id_sekolah">
                            <option selected>-- Pilih Karyawan --</option>
                            <?php
                            foreach ($karyawan as $k) {
                            ?>
                                <option value="<?= $k['id_sekolah']; ?>"><?= $k['nama_sekolah']; ?></option>
                            <?php } ?>
                        </select>
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
                                <select class="form-control mb-3 select" id="nilai" name="kriteria[<?= $v[0]['id_kriteria']; ?>]">
                                    <option value="">-- Pilih Subkriteria --</option>
                                    <?php
                                    foreach ($v as $val => $value) {
                                    ?>
                                        <option value="<?= $value['id_subkriteria'] ?>"> <?= $value['nama_subkriteria'] ?> </option>
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