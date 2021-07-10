<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col px-3">
    <div class="card bg-dark d-flex justify-content-center align-items-center">
        <img class="card-img" src="assets/images/library-photos.webp" style="height: 50vh; max-width: 100%; object-fit: cover; opacity: 25%;" , alt="Banner">
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <div class="row text-center">
                <h5 class="card-title text-white fs-2 font-bold">Perpustakaan <span class="text-white">ARS</span></h5>
                <p class="card-text text-white">Pengelolaan Perpustakaan Kini Jadi Lebih Mudah & Praktis</p>
            </div>
        </div>
    </div>
</div>
<div class="col col-md-12 px-3">
    <div class="row">
        <div class="col-sm-4">
            <div class="card prod-p-card background-pattern">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5">Total Buku</h6>
                            <h3 class="m-b-0"><?= count($buku); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-primary">book</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card prod-p-card bg-primary background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Total Anggota</h6>
                            <h3 class="m-b-0 text-white"><?= count($anggota); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">groups</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card prod-p-card background-pattern">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5">Total History Peminjaman</h6>
                            <h3 class="m-b-0"><?= count($peminjaman); ?></h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-primary">work</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?= $this->endSection('content'); ?>