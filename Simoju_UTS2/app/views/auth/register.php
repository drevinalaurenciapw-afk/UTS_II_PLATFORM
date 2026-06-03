<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="text-center mb-4">
                        Register SIMOJU
                    </h2>

                    <?php if(isset($data['error'])): ?>

                    <div class="alert alert-danger">

                        <?= $data['error']; ?>

                    </div>

                    <?php endif; ?>

                    <form method="POST" action="index.php?url=AuthController/register">

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan nama lengkap"
                                required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan email"
                                required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required>
                        </div>

                        <!-- Tombol Register -->
                        <button type="submit" class="btn btn-success w-100">
                            Register
                        </button>

                        <!-- Link ke Login -->
                        <p class="mt-3 text-center">
                            Sudah punya akun?
                            <a href="index.php?url=AuthController/login">Login di sini</a>
                        </p>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>