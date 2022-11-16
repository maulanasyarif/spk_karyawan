<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mt-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Kriteria</h5>
                        <h3><?= $kriteria; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Subkriteria</h5>
                        <h3><?= $subkriteria ?></h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Pegawai</h5>
                        <h3><?= $karyawan ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>