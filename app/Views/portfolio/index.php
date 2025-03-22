<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Daftar Portfolio</h2>
            
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            
            <a href="<?= base_url('portfolio/upload'); ?>" class="btn btn-primary mb-3">Upload Portfolio Baru</a>
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>Tipe</th>
                            <th>Ukuran</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($portfolios as $portfolio): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $portfolio['file_name']; ?></td>
                                <td><?= $portfolio['file_type']; ?></td>
                                <td><?= $portfolio['file_size']; ?> KB</td>
                                <td><?= $portfolio['description']; ?></td>
                                <td>
                                    <a href="<?= base_url('portfolio/detail/' . $portfolio['id']); ?>" class="btn btn-info btn-sm">Detail</a>
                                    <a href="<?= base_url('admin_portfolio/edit/' . $portfolio['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <!-- Option 1: Using a form with POST method (recommended for security) -->
                                    <form action="<?= base_url('admin_portfolio/delete/' . $portfolio['id']); ?>" method="post" class="d-inline delete-form">
                                        <?= csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?');">Hapus</button>
                                    </form>
                                    
                                    <!-- Option 2: Simple link (using the GET route we added) -->
                                    <!-- <a href="<?= base_url('admin_portfolio/delete/' . $portfolio['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?');">Hapus</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                        <?php if (empty($portfolios)): ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data portfolio</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>