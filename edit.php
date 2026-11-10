
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="card p-4 mx-auto" style="max-width: 750px;">

    <h3 class="page-title mb-2">Edit Data Barang</h3>

    <p class="text-secondary">
        Ubah informasi barang sesuai data terbaru.
    </p>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/barang/update/<?= $barang['id'] ?>"
          method="post">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text"
                   name="nama_barang"
                   class="form-control"
                   value="<?= esc(old('nama_barang') ?? $barang['nama_barang']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text"
                   name="lokasi"
                   class="form-control"
                   value="<?= esc(old('lokasi') ?? $barang['lokasi']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="<?= esc(old('tanggal') ?? $barang['tanggal']) ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi"
                      class="form-control"
                      rows="4"
                      required><?= esc(old('deskripsi') ?? $barang['deskripsi']) ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Status Barang</label>

            <?php $status = old('status') ?? $barang['status']; ?>

            <select name="status" class="form-select" required>

                <option value="Hilang"
                    <?= $status == 'Hilang' ? 'selected' : '' ?>>
                    Hilang
                </option>

                <option value="Ditemukan"
                    <?= $status == 'Ditemukan' ? 'selected' : '' ?>>
                    Ditemukan
                </option>

                <option value="Sudah Diambil"
                    <?= $status == 'Sudah Diambil' ? 'selected' : '' ?>>
                    Sudah Diambil
                </option>

            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                Simpan Perubahan
            </button>

            <a href="/" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
