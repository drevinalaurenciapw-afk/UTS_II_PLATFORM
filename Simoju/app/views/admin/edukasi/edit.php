<form
action="../../update/<?= $data['artikel']['id']; ?>"
method="POST">

    <label>Judul</label>
    <br>

    <input
    type="text"
    name="judul"
    value="<?= $data['artikel']['judul']; ?>">

    <br><br>

    <label>Isi</label>
    <br>

    <textarea
    name="isi"
    rows="10"
    cols="50"><?= $data['artikel']['isi']; ?></textarea>

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
        Update
    </button>

</form>