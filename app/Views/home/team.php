<?= $this->extend('layout/main1') ?>

<?= $this->section('content') ?>
<!-- <h1><?= $title ?></h1> -->
<section id="team" class="team">
    <Main>
        <h2>Jajaran<span> Team</span></h2>
        <p>Kami Adalah Team Terbaik untuk mempersebahkan data</p>

        <div class="container">
            <div class="card">
                <img src="img/team1.jpg" alt="" width="300">
                <div class="card-body">
                    <span class="tag tag-blue">Wali Kelas 6</span>
                    <h4 class="tag tag-light">TRI SUSILOWATI, S.Pd<br>NIP.196806012000092001</h4>
                    <!-- {{-- <span class="tag tag-light">NIP </span> --}} -->
                </div>
            </div>
            <div class="card">
                <img src="img/team2.jpg" alt="" width="300">
                <div class="card-body">
                    <span class="tag tag-blue">Wali Kelas VII</span>
                    <h4 class="tag tag-light">NUR RISKA PANGESTUTI, S.Pd <br> NIP. 199201152022212020</h4>
                    <!-- {{-- <span class="tag tag-light">NIP </span> --}} -->
                </div>
            </div>
            <div class="card">
                <img src="img/team3.jpg" alt="" width="300">
                <div class="card-body">
                    <span class="tag tag-blue">Wali Kelas 10 & 12</span>
                    <h4 class="tag tag-light">NUR ALFIN LAILA, S.Pd <br> NIP. -</h4>
                    <!-- {{-- <span class="tag tag-light">NIP. - </span> --}} -->
                </div>
            </div>
        </div>
    </Main>
</section>
<!-- team end -->
<?= $this->endSection() ?>