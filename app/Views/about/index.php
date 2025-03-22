<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>
<p>Berikut adalah kHalaman Dashboard about.</p>


<div class="row">
    <?php if(empty($abouts)): ?>
        <div class="col-12">
            <div class="alert alert-info">
                Belum ada about. Silakan upload portfolio terlebih dahulu.
            </div>
        </div>
    <?php else: ?>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Tanggal update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($abouts as $about): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= substr($about['description'] ?? '-', 0, 100) . (strlen($about['description'] ?? '') > 100 ? '...' : '') ?></td>
                                <td><?= date('d-m-Y', strtotime($about['uploaded_at'])) ?></td>
                                <td>
                                <form action="<?= base_url('admin_about/delete/' . $about['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?')">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>