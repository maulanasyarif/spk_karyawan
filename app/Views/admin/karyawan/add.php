<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5">
    <div class="card">
        <div class="card-header">
            Tambah Karyawan
        </div>
        <div class="card-body">
            <form action="<?= base_url('create_karyawan') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="nama_sekolah">
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek">
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="alamat_sekolah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="" name="no_telpon">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Visi</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="visi">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Misi</label>
                            <input type="text" class="form-control" id="" name="misi">
                        </div>
                    </div>
                </div>
                <div class="button-group">
                    <a class="btn btn-sm btn-warning" href="<?= base_url('karyawan') ?>">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>