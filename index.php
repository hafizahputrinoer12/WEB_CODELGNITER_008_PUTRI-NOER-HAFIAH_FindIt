
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <div>
        <h2 class="page-title">Data Barang</h2>
        <p class="text-secondary mb-0">
            Informasi barang hilang dan ditemukan di lingkungan kampus.
        </p>
    </div>

    <a href="/barang/tambah" class="btn btn-success">
        + Tambah Barang
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="btn-close"
                data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card p-3 mb-4">
    <form action="/" method="get" class="d-flex gap-2">
        <input type="text"
               name="keyword"
               class="form-control"
               placeholder="Cari nama barang..."
               value="<?= esc($keyword ?? '') ?>">

        <button type="submit" class="btn btn-success">
            Cari
        </button>

        <a href="/" class="btn btn-outline-secondary">
            Reset
        </a>
    </form>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($barang)): ?>

                    <?php $no = 1; ?>

                    <?php foreach ($barang as $item): ?>

                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <strong>
                                    <?= esc($item['nama_barang']) ?>
                                </strong>
                            </td>

                            <td><?= esc($item['lokasi']) ?></td>

                            <td><?= esc($item['tanggal']) ?></td>

                            <td>
                                <?php
                                $warna = [
                                    'Hilang' => 'danger',
                                    'Ditemukan' => 'success',
                                    'Sudah Diambil' => 'secondary'
                                ];

                                $status = $item['status'];
                                ?>

                                <span class="badge bg-<?= $warna[$status] ?? 'secondary' ?>">
                                    <?= esc($status) ?>
                                </span>
                            </td>

                            <td>
                                <div class="d-flex gap-1">

                                    <a href="/barang/edit/<?= $item['id'] ?>"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="/barang/hapus/<?= $item['id'] ?>"
                                          method="post"
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">

                                        <?= csrf_field() ?>

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="6" class="text-center text-secondary py-4">
                            Data barang belum tersedia.
                        </td>
                    </tr>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
