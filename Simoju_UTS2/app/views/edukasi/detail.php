<div class="container mt-4">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="mb-4">
                <?= $data['edukasi']['judul']; ?>
            </h2>

            <div class="text-center mb-4">

                <img
                src="/Simoju_UTS2/public/uploads/artikel/<?= $data['edukasi']['gambar']; ?>"
                class="img-fluid rounded"
                style="max-height:400px;">

            </div>

            <hr>

            <div style="text-align: justify;">

                <?= nl2br($data['edukasi']['isi']); ?>

            </div>

            <hr>

            <a
            href="index.php?url=EdukasiController/index"
            class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>