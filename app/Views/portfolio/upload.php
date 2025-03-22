<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Upload Portfolio</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('portfolio/save'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="file">Pilih File</label>
                            <input type="file" class="form-control <?= (session()->has('errors') && isset(session('errors')['file'])) ? 'is-invalid' : ''; ?>" id="file" name="file">
                            <div class="invalid-feedback">
                                <?= session()->has('errors') ? session('errors')['file'] ?? '' : ''; ?>
                            </div>
                            <small class="text-muted">Format yang diizinkan: PDF, MP4.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Deskripsi (Opsional)</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?= old('description'); ?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="<?= base_url('portfolio'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Petunjuk</h5>
                </div>
                <div class="card-body">
                    <p>Untuk mengupload portfolio:</p>
                    <ol>
                        <li>Masukkan judul portfolio</li>
                        <li>Pilih file PDF atau MP4 ( Tidak lebih dari 1,5 Mb ) dari komputer Anda</li>
                        <li>Tambahkan deskripsi jika diperlukan</li>
                        <li>Klik tombol "Upload"</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>