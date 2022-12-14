<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="mt-5 d-flex">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header">
                <span>Tambah Subkriteria</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('create_sub_kriteria') ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Kriteria</label>
                        <select class="form-select" aria-label="Default select example" name="id_kriteria">
                            <option selected>Pilih Kriteria</option>
                            <?php
                            foreach ($kriteria as $k) {
                            ?>
                                <option value="<?= $k['id_kriteria']; ?>"><?= $k['nama_kriteria']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tipe</label>
                        <select class="form-select" aria-label="Default select example" name="tipe">
                            <option selected>Pilih Tipe</option>
                            <option value="nilai">Nilai</option>
                            <option value="teks">Text</option>
                        </select>
                    </div>
                    <div class="mb-3 keterangan d-none">
                        <label for="">Keterangan Subkriteria</label>
                        <input type="text" name="nama_subkriteria" class="form-control">
                    </div>
                    <div class="row nilai d-none">
                        <div class="mb-3 col-md-6">
                            <label for="">Nilai Minimal</label>
                            <input type="number" name="nilai_minimum" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="">Nilai Maximal</label>
                            <input type="number" name="nilai_maksimum" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Nilai</label>
                        <select class="form-select" aria-label="Default select example" name="id_nilai">
                            <option selected>Pilih Nilai</option>
                            <option value="1">Sangat Baik</option>
                            <option value="2">Cukup</option>
                            <option value="3">Baik</option>
                            <option value="4">Kurang</option>
                            <option value="5">Sangat Kurang</option>
                        </select>
                    </div>
                    <div class="uk-button-group">
                        <a type=" submit" class="btn btn-sm btn-warning" href="<?= base_url('sub_kriteria') ?>">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('change', '[name=tipe]', function() {
        var tho = $(this)
        // console.log(tho.val())
        if (tho.val() == 'nilai') {
            $('.nilai').removeClass('d-none');
            $('.keterangan').addClass('d-none');
            $('[name=nama_subkriteria]').val('')
        }
        if (tho.val() == 'teks') {
            $('.keterangan').removeClass('d-none');
            $('.nilai').addClass('d-none');
            $('[type=number]').val('')
        }
    })
</script>

<?= $this->endSection() ?>