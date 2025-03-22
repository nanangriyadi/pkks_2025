<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin_about/save') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= old('description') ?></textarea>
                    </div>
                    
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?= base_url('admin_about') ?>" class="btn btn-secondary ms-2">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Petunjuk</div>
            <div class="card-body">
                <p>Untuk Menambahkan deskripsi :</p>
                <ol>
                    <li>Masukkan Deskripsi</li>
                    <li>Klik tombol "Save"</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

