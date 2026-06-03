<div class="container mt-4">

    <div class="position-relative mb-4">

        <a
        href="index.php?url=HomeController/dashboard"
        class="btn btn-secondary">

            ← Kembali

        </a>

        <h2 class="mb-0">
            Daftar Notifikasi
        </h2>

        <?php if($_SESSION['role'] == 'admin'): ?>

            <a
            href="index.php?url=NotifikasiController/tambah"
            class="btn btn-primary">

                Tambah Notifikasi

            </a>

        <?php endif; ?>

    </div>

    <?php while($row = $data['notifikasi']->fetch_assoc()): ?>

        <?php
            $badge = "secondary";

            if($row['level'] == 'aman')
                $badge = "success";

            if($row['level'] == 'waspada')
                $badge = "warning";

            if($row['level'] == 'bahaya')
                $badge = "danger";
        ?>

        <div class="card shadow-sm mb-3">

            <div class="card-body">

                <h4>
                    <?= $row['judul']; ?>
                </h4>

                <span class="badge bg-<?= $badge; ?>">
                    <?= strtoupper($row['level']); ?>
                </span>

                <hr>

                <p>
                    <?= nl2br($row['pesan']); ?>
                </p>

                <small class="text-muted">
                    <?= $row['created_at']; ?>
                </small>

                <?php if($_SESSION['role'] == 'admin'): ?>

                    <div class="mt-3">

                        <a
                        href="index.php?url=NotifikasiController/edit/<?= $row['id']; ?>"
                        class="btn btn-success btn-sm">

                            Edit

                        </a>

                        <a
                        href="index.php?url=NotifikasiController/delete/<?= $row['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus notifikasi ini?')">

                            Hapus

                        </a>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    <?php endwhile; ?>

</div>