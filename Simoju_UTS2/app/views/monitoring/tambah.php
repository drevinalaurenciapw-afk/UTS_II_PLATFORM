<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">

            <h3>Tambah Data Monitoring</h3>

        </div>

        <div class="card-body">

            <form
            action="index.php?url=MonitoringController/store"
            method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Wilayah
                    </label>

                    <input
                    type="text"
                    name="wilayah"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Suhu (°C)
                    </label>

                    <input
                    type="number"
                    step="0.1"
                    name="suhu"
                    class="form-control"
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
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status Udara
                    </label>

                    <select
                    name="status"
                    class="form-control">

                        <option>Baik</option>
                        <option>Sedang</option>
                        <option>Tidak Sehat</option>
                        <option>Sangat Tidak Sehat</option>

                    </select>

                </div>

                <button
                type="submit"
                class="btn btn-success">

                    Simpan

                </button>

                <a
                href="index.php?url=MonitoringController/daftar"
                class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>