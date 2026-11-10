
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="card p-4 mx-auto" style="max-width: 750px;">

    <h3 class="page-title mb-2">Tambah Barang</h3>

    <p class="text-secondary">
        Masukkan informasi barang yang hilang atau ditemukan.
    </p>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <strong>Periksa kembali data berikut:</strong>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/barang/simpan" method="post">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text"
                   name="nama_barang"
                   class="form-control"
                   value="<?= esc(old('nama_barang') ?? '') ?>"
                   placeholder="Contoh: Dompet Hitam"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text"
                   name="lokasi"
                   class="form-control"
                   value="<?= esc(old('lokasi') ?? '') ?>"
                   placeholder="Contoh: Gedung FKIP"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="<?= esc(old('tanggal') ?? '') ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi"
                      class="form-control"
                      rows="4"
                      placeholder="Jelaskan ciri-ciri barang..."
                      required><?= esc(old('deskripsi') ?? '') ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Status Barang</label>

            <select name="status" class="form-select" required>
                <option value="">Pilih Status</option>

                <option value="Hilang"
                    <?= old('status') == 'Hilang' ? 'selected' : '' ?>>
                    Hilang
                </option>

                <option value="Ditemukan"
                    <?= old('status') == 'Ditemukan' ? 'selected' : '' ?>>
                    Ditemukan
                </option>

                <option value="Sudah Diambil"
                    <?= old('status') == 'Sudah Diambil' ? 'selected' : '' ?>>
                    Sudah Diambil
                </option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">
                Simpan Data
            </button>

            <a href="/" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
