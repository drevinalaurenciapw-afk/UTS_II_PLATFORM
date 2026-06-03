<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">

            <h3>Edit Data Monitoring</h3>

        </div>

        <div class="card-body">

            <form
            action="index.php?url=MonitoringController/update/<?= $data['monitoring']['id']; ?>"
            method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Wilayah
                    </label>

                    <input
                    type="text"
                    name="wilayah"
                    class="form-control"
                    value="<?= $data['monitoring']['wilayah']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Suhu
                    </label>

                    <input
                    type="number"
                    step="0.1"
                    name="suhu"
                    class="form-control"
                    value="<?= $data['monitoring']['suhu']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        AQI
                    </label>

                    <input
                    type="number"
                    name="aqi"
                    class="form-control"
                    value="<?= $data['monitoring']['aqi']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <input
                    type="text"
                    name="status"
                    class="form-control"
                    value="<?= $data['monitoring']['kategori']; ?>"
                    required>

                </div>

                <button
                type="submit"
                class="btn btn-success">

                    Update

                </button>

                <a
                href="index.php?url=MonitoringController/daftar"
                class="btn btn-secondary">

                    Batal

                </a>

            </form>

        </div>

    </div>

</div>