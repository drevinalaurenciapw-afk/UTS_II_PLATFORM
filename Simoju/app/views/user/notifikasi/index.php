<h2>Notifikasi</h2>

<hr>

<?php
while(
    $row =
    $data['notifikasi']->fetch_assoc()
):
?>

<h3>
    <?=$row['judul']; ?>
</h3>

<p>
    <?= $row['pesan']; ?>
</p>

<p>
    Level:
    <?= $row['level'];?>
</p>

<hr>

<?php endwhile; ?>
