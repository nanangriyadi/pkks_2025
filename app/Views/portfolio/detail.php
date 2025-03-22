<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <a href="<?= base_url('admin_portfolio'); ?>" class="btn btn-primary mb-3">Kembali ke Daftar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Deskripsi:</label>
                                <p class="form-control-static"><?= $portfolio['description']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p><strong>Nama File</strong><br><?= $portfolio['file_name']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Tipe File</strong><br><?= $portfolio['file_type']; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Ukuran File</strong><br><?= $portfolio['file_size']; ?> KB</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Diupload Pada</strong><br><?= $portfolio['uploaded_at']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <?php if ($portfolio['file_type'] == 'application/pdf'): ?>
                            <div class="col-md-12 text-center">
                                <h4>Lihat PDF</h4>
                                <p>Klik tombol di bawah untuk membuka file PDF</p>
                                <a href="<?= base_url('uploads/' . $portfolio['file_name']); ?>" class="btn btn-primary" target="_blank">Buka PDF</a>
                            </div>
                        <?php elseif ($portfolio['file_type'] == 'video/mp4'): ?>
                            <div class="col-md-12 text-center">
                                <h4>Lihat Video</h4>
                                <p>Klik tombol di bawah untuk memutar video</p>
                                <button class="btn btn-primary mb-3" id="playVideo">Putar Video</button>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video id="videoPlayer" class="embed-responsive-item" controls>
                                        <source src="<?= base_url('uploads/' . $portfolio['file_name']); ?>" type="video/mp4">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>