<?= $this->extend('layout/main1') ?>

<?= $this->section('content') ?>
<!-- Section About -->
<section id="about" class="about" style="max-width: 1200px; margin: 0 auto; padding: 120px;">
    <h2 style="text-align: center; margin-bottom: 30px;"><span style="color: #4c7daf; font-weight: bold;">Tentang</span> Kami</h2>

    <div style="display: flex; flex-wrap: wrap; align-items: flex-start; gap: 30px;">
        <div class="about-img animate__animated animate__zoomInDown" style="flex: 0 0 40%; max-width: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden;">
            <img src="<?= base_url('img/about2.jpg') ?>" style="width: 100%; height: auto; display: block;" alt="tentang kami">
        </div>
    
        <div class="content" style="flex: 1; min-width: 300px;">
            <?php if(empty($abouts)): ?>
                <p style="text-align: center; padding: 20px; background-color: #f8f9fa; border-radius: 5px;">Belum ada konten tentang kami.</p>
            <?php else: ?>
                <h3 style="margin-bottom: 15px; color: #333;">Kelompok I</h3>
                <?php foreach($abouts as $about): ?>
                    <div style="text-align: justify; line-height: 1.6; margin-bottom: 15px;">
                        <?= $about['description'] ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End of Section About -->
<?= $this->endSection() ?>