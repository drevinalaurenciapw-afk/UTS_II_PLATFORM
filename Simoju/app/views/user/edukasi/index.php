<h2>Artikel Edukasi Polusi & Kesehatan</h2>

<hr>

<?php while($row = $data['edukasi']->fetch_assoc()): ?>

    <div style="margin-bottom:20px; padding:10px; border:1px solid #ccc;">

        <h3><?= $row['judul']; ?></h3>

        <?php if(!empty($row['gambar'])): ?>
            <img src="/simoju/public/uploads/edukasi/<?= $row['gambar']; ?>" width="200">
        <?php endif; ?>

        <p>
            <?= substr($row['isi'], 0, 150); ?>...
        </p>

        <small>Status: <?= $row['status']; ?></small>

    </div>

<?php endwhile; ?>
