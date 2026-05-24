<h2>Kelola Edukasi</h2>

<a href="../tambah">
Tambah Edukasi
</a>

<hr>

<?php
while(
$row =
$data['edukasi']->fetch_assoc()
):
?>

<h3>
<?= $row['judul']; ?>
</h3>

<img
src="../../../public/uploads/edukasi/<?= $row['gambar']; ?>"
width="150">

<p>
Status :
<?= $row['status']; ?>
</p>

<a href="../edit/<?= $row['id']; ?>">
Edit
</a>

|

<a href="../delete/<?= $row['id']; ?>">
Hapus
</a>

<hr>

<?php endwhile; ?>