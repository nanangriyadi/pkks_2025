<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kelola About Us</h1>
    
    <!-- Flash Messages -->
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    
    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    
    <!-- About Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar About Us</h6>
            <a href="<?= base_url('about/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Baru
            </a>
        </div>
        <div class="card-body">
            <?php if(empty($abouts)): ?>
                <div class="text-center p-4">
                    <p>Belum ada konten About Us.</p>
                    <a href="<?= base_url('about/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah About Us
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="65%">Deskripsi</th>
                                <th width="15%">Tanggal Upload</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($abouts as $about): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <?php 
                                        // Tampilkan sebagian deskripsi untuk preview di tabel
                                        $preview = strlen($about['description']) > 150 ? 
                                            substr($about['description'], 0, 150) . '...' : 
                                            $about['description'];
                                        echo $preview;
                                        ?>
                                    </td>
                                    <td><?= date('d-m-Y', strtotime($about['uploaded_at'])) ?></td>
                                    <td>
                                        <a href="<?= base_url('about/edit/' . $about['id']) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?= base_url('about/delete/' . $about['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Portfolio Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Portfolio</h6>
            <a href="<?= base_url('portfolio/upload') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Baru
            </a>
        </div>
        <div class="card-body">
            <?php if(empty($portfolios)): ?>
                <div class="text-center p-4">
                    <p>Belum ada portfolio yang diupload. Silakan upload portfolio terlebih dahulu.</p>
                    <a href="<?= base_url('portfolio/upload') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Portfolio
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="40%">Deskripsi</th>
                                <th width="10%">Tipe File</th>
                                <th width="15%">Diupload</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($portfolios as $portfolio): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <?php 
                                        // Tampilkan sebagian deskripsi untuk preview di tabel
                                        $preview = strlen($portfolio['description'] ?? '') > 100 ? 
                                            substr($portfolio['description'] ?? '-', 0, 100) . '...' : 
                                            $portfolio['description'] ?? '-';
                                        echo $preview;
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($portfolio['file_type'] == 'application/pdf'): ?>
                                            <span class="badge badge-danger"><i class="fas fa-file-pdf"></i> PDF</span>
                                        <?php elseif($portfolio['file_type'] == 'video/mp4'): ?>
                                            <span class="badge badge-primary"><i class="fas fa-video"></i> Video</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary"><?= $portfolio['file_type'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= date('d-m-Y', strtotime($portfolio['uploaded_at'])) ?></td>
                                    <td>
                                        <?php if($portfolio['file_type'] == 'application/pdf'): ?>
                                            <a href="<?= base_url($portfolio['file_path']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fas fa-file-pdf"></i> Lihat
                                            </a>
                                        <?php elseif($portfolio['file_type'] == 'video/mp4'): ?>
                                            <a href="<?= base_url($portfolio['file_path']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fas fa-play-circle"></i> Putar
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= base_url($portfolio['file_path']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
                                        <?php endif; ?>
                                        
                                        <a href="<?= base_url('admin_portfolio/edit/'.$portfolio['id']) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        <a href="<?= base_url('admin_portfolio/delete/' . $portfolio['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>