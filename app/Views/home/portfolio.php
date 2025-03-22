<?= $this->extend('layout/main1') ?>

<?= $this->section('content') ?>
<!-- <h1><?= $title ?></h1> -->
<section id="menu" class="portofolio">
        <h2>1. Pengembangan Diri <span> dan </span>Orang Lain</h2>

   
        <div class="table">
            <table class="table1">
                    
                        <tr>
                            <th>No</th>
                            <!-- <th>Judul</th> -->
                            <th>Deskripsi</th>
                            <!-- <th>Ukuran</th> -->
                            <!-- <th>Diupload</th> -->
                            <th>Link</th>
                        </tr>
                   
                    <tr>
                        <?php $i = 1; foreach($portfolios as $portfolio): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= substr($portfolio['description'] ?? '-', 0, 100) . (strlen($portfolio['description'] ?? '') > 100 ? '...' : '') ?></td>
                                <td>
                                    <?php if($portfolio['file_type'] == 'application/pdf'): ?>
                                        <span class="badge bg-danger"><i class="bi bi-file-earmark-pdf"></i></span>
                                    <?php elseif($portfolio['file_type'] == 'video/mp4'): ?>
                                        <span class="badge bg-primary"><i class="bi bi-film"></i></span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?= $portfolio['file_type'] ?></span>
                                    <?php endif; ?>
                                
                                    <?php if($portfolio['file_type'] == 'application/pdf'): ?>
                                        <a href="<?= base_url($portfolio['file_path']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="bi bi-file-earmark-pdf"></i> Lihat
                                        </a>
                                    <?php elseif($portfolio['file_type'] == 'video/mp4'): ?>
                                        <a href="<?= base_url($portfolio['file_path']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="bi bi-play-circle"></i> Putar
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= base_url($portfolio['file_path']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
  
</section>
<?= $this->endSection() ?>

