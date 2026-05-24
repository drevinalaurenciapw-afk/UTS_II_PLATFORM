<form
action="../store"
method="POST"
enctype="multipart/form-data">

    <label>Judul</label>
    <br>

    <input
    type="text"
    name="judul"
    required>

    <br><br>

    <label>Gambar</label>
    <br>

    <input
    type="file"
    name="gambar">

    <br><br>

    <label>Isi Edukasi</label>
    <br>

    <textarea
    name="isi"
    rows="10"
    cols="50"
    required></textarea>

    <br><br>

    <label>Status</label>

    <select name="status">

        <option value="draft">
            Draft
        </option>

        <option value="publish">
            Publish
        </option>

    </select>

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>