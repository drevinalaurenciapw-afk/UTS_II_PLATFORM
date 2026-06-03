<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h3>Tambah Artikel Edukasi</h3>
        </div>

        <div class="card-body">

            <form
            action="index.php?url=EdukasiController/store"
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
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Artikel
                    </label>

                    <textarea
                    name="isi"
                    rows="12"
                    class="form-control"
                    placeholder="Tulis artikel di sini..."
                    required></textarea>

                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Gambar Artikel
                    </label>

                    <input
                    type="file"
                    name="gambar"
                    class="form-control">

                </div>

                <button
                type="submit"
                class="btn btn-success">

                    Simpan Artikel

                </button>

                <a
                href="index.php?url=EdukasiController/index"
                class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>