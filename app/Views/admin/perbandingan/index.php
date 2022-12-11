<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<div class="mt-5">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <div class="card border-info shadow-lg">
        <div class="card-body">

            <form id="formcari">
                <div class="col-md-2">
                    <p>Silahkan klik untuk memulai</p>
                </div>
                <button type="submit" class=" btn btn-sm btn-primary add" href="">Tampilkan</button>
            </form>
            <div class=" responsive mt-3">

                <div id="matrik"></div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $("#formcari").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                dataType: 'HTML',
                url: "<?= base_url('matrikutama'); ?>",
                data: $(this).serialize(),
                error: function() {
                    $("#matrik").html('Gagal mengambil data matrik');
                },
                beforeSend: function() {
                    $("#matrik").html('Mengambil data matrik. Tunggu sebentar');
                },
                success: function(x) {
                    $("#matrik").html(x);
                },
            });
        });
    });

    function showsubdata(kriteria) {
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: "<?= base_url('Perbandingan/getsub'); ?>",
            data: "kriteria=" + kriteria,
            error: function() {
                $("#matriksub").html('Gagal mengambil data matrik');
            },
            beforeSend: function() {
                $("#matriksub").html('Mengambil data matrik. Tunggu sebentar');
            },
            success: function(x) {
                $("#matriksub").html(x);
            },
        });
    }
</script>

<?= $this->endSection() ?>