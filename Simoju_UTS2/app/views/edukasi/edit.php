<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">

            <h3>Edit Artikel Edukasi</h3>

        </div>

        <div class="card-body">

            <form
            action="index.php?url=EdukasiController/update/<?= $data['edukasi']['id']; ?>"
            method="POST"
            enctype="multipart/form-data">

                <div class="mb-3">

                    <label class="form-label">
                        Judul Artikel
                    </label>

                    <input
                    type="text"
                    name="judul"
                    class="form-control"
                    value="<?= $data['edukasi']['judul']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Gambar Saat Ini
                    </label>
                         <br>
                    <img
                    src="/Simoju_UTS2/public/uploads/artikel/<?= $data['edukasi']['gambar']; ?>"
                    width="250"
                    class="img-thumbnail">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Artikel
                    </label>

                    <textarea
                    name="isi"
                    rows="12"
                    class="form-control"
                    required><?= $data['edukasi']['isi']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Ganti Gambar
                    </label>

                    <input
                    type="file"
                    name="gambar"
                    class="form-control">

                </div>

                <button
                type="submit"
                class="btn btn-success">

                    Update Artikel

                </button>

                <a
                href="index.php?url=EdukasiController/index"
                class="btn btn-secondary">

                    Batal

                </a>

            </form>

        </div>

    </div>

</div>