<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h3>Tambah Notifikasi</h3>
        </div>

        <div class="card-body">

            <form
            action="index.php?url=NotifikasiController/store"
            method="POST">

                <div class="mb-3">

                    <label>Judul</label>

                    <input
                    type="text"
                    name="judul"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Pesan</label>

                    <textarea
                    name="pesan"
                    rows="6"
                    class="form-control"
                    required></textarea>

                </div>

                <div class="mb-3">

                    <label>Level</label>

                    <select
                    name="level"
                    class="form-control">

                        <option value="aman">Aman</option>
                        <option value="waspada">Waspada</option>
                        <option value="bahaya">Bahaya</option>

                    </select>

                </div>

                <button
                type="submit"
                class="btn btn-success">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>