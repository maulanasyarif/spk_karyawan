<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5 d-flex">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header">
                <span>Edit Kriteria</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('update_kriteria/' . $detil['id_kriteria']) ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kriteria</label>
                        <input type="hidden" class="form-control" id="id_kriteria" aria-describedby="" name="id_kriteria" value="<?= $detil['id_kriteria'] ?>">
                        <input type="text" class="form-control" id="nama_kriteria" aria-describedby="" name="nama_kriteria" value="<?= $detil['nama_kriteria'] ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bobot Kriteria</label>
                        <input type="text" class="form-control" id="bobot_kriteria" aria-describedby="" name="bobot_kriteria" value="<?= $detil['bobot_kriteria'] ?>">
                    </div> -->
                    <div class="uk-button-group">
                        <a type=" submit" class="btn btn-sm btn-warning" href="<?= base_url('kriteria') ?>">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>