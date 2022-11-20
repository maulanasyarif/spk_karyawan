<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="mt-5 d-flex">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header">
                <span>Edit Subkriteria</span>
            </div>
            <div class="card-body">
                <form action="<?= base_url('update_sub_kriteria/' . $detil['id_subkriteria']) ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Kriteria</label>
                        <select class="form-select" aria-label="Default select example" name="id_kriteria">
                            <option selected>Pilih Kriteria</option>
                            <?php
                            foreach ($kriteria as $k) {
                            ?>
                                <option <?= ($detil['id_kriteria'] == $k['id_kriteria'] ? 'selected' : '') ?> value="<?= $k['id_kriteria'] ?>"><?= $k['nama_kriteria']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tipe</label>
                        <select class="form-select" aria-label="Default select example" name="tipe">
                            <option selected>Pilih Tipe</option>
                            <option <?= ($detil['tipe'] == 'nilai' ?  'selected' : '') ?> value="nilai">Nilai</option>
                            <option <?= ($detil['tipe'] == 'teks' ?  'selected' : '') ?> value="teks">Text</option>
                        </select>
                    </div>
                    <div class=" mb-3 keterangan d-none">
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
                            <option <?= ($detil['id_nilai'] == '1' ?  'selected' : '') ?> value="1">Sangat Baik</option>
                            <option <?= ($detil['id_nilai'] == '2' ?  'selected' : '') ?> value="2">Cukup</option>
                            <option <?= ($detil['id_nilai'] == '3' ?  'selected' : '') ?> value="3">Baik</option>
                            <option <?= ($detil['id_nilai'] == '4' ?  'selected' : '') ?> value="4">Kurang</option>
                            <option <?= ($detil['id_nilai'] == '5' ?  'selected' : '') ?> value="5">Sangat Kurang</option>
                        </select>
                    </div>
                    <div class="uk-button-group">
                        <button type="button" class="btn btn-sm btn-warning back">Kembali</button>
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
        if (tho.val() == 'nilai') {
            $('.nilai').removeClass('d-none');
            $('.keterangan').addClass('d-none');
            // $('[name=nama_subkriteria]').val('')
        }
        if (tho.val() == 'teks') {
            $('.keterangan').removeClass('d-none');
            $('.nilai').addClass('d-none');
            // $('[type=number]').val('')
        }
    })

    $(document).ready(function() {
        if ('<?= $detil['tipe'] ?>' == 'nilai') {
            $('.nilai').removeClass('d-none');
            $('.keterangan').addClass('d-none');
            $('[name=nilai_minimum').val('<?= $detil['nilai_minimum'] ?>')
            $('[name=nilai_maksimum').val('<?= $detil['nilai_maksimum'] ?>')
        }
        if ('<?= $detil['tipe'] ?>' == 'teks') {
            $('.keterangan').removeClass('d-none');
            $('.nilai').addClass('d-none');
            $('[name=nama_subkriteria').val('<?= $detil['nama_subkriteria'] ?>')
        }
    })

    $(document).on('click', '.back', function() {
        history.go(-1);
    })
</script>

<?= $this->endSection() ?>