<div class="container mt-4">

        <a
        href="index.php?url=HomeController/dashboard"
        class="btn btn-secondary">

            ← Kembali

        </a>

    <h2>
        Daftar User
    </h2>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>

            </tr>

        </thead>

        <tbody>

        <?php while(
        $row =
        $data['users']->fetch_assoc()
        ): ?>

            <tr>

                <td>
                    <?= $row['id']; ?>
                </td>

                <td>
                    <?= $row['nama']; ?>
                </td>

                <td>
                    <?= $row['email']; ?>
                </td>

                <td>
                    <?= $row['role']; ?>
                </td>

            </tr>

        <?php endwhile; ?>

        </tbody>

    </table>

</div>