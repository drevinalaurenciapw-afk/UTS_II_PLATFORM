<div class="card shadow p-3">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <a
        href="index.php?url=HomeController/dashboard"
        class="btn btn-secondary">

            Kembali

        </a>

        <h2>Daftar Artikel Edukasi</h2>

        <?php if($_SESSION['role'] == 'admin'): ?>
        <a
        href="index.php?url=EdukasiController/tambah"
        class="btn btn-primary">

            Tambah Artikel

        </a>
        <?php endif; ?>

    </div>

    <div class="row">

        <?php while($row = $data['edukasi']->fetch_assoc()): ?>

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow-sm">

                <img
                src="/Simoju_UTS2/public/uploads/artikel/<?= $row['gambar']; ?>"
                class="card-img-top"
                style="height:200px; object-fit:cover;">

                <div class="card-body">

                    <h5 class="card-title">
                        <?= $row['judul']; ?>
                    </h5>

                </div>

                <div class="card-footer bg-white">

                    <a
                    href="index.php?url=EdukasiController/detail/<?= $row['id']; ?>"
                    class="btn btn-primary btn-sm">

                        Detail

                    </a>

                    <?php if($_SESSION['role'] == 'admin'): ?>    
                    <a
                    href="index.php?url=EdukasiController/edit/<?= $row['id']; ?>"
                    class="btn btn-success btn-sm">

                        Edit

                    </a>

                    <a
                    href="index.php?url=EdukasiController/delete/<?= $row['id']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus artikel ini?')">

                        Hapus

                    </a>
                    <?php endif; ?>

                </div>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</div>