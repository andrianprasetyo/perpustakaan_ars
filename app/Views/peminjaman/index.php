<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col">
                        <h5>Daftar Peminjaman</h5>
                        <span class="d-block m-t-5">Lihat dan ubah status peminjaman yang terdaftar</span>
                    </div>
                    <div>
                        <a href="peminjaman/create">
                            <button type="button" class="btn  btn-primary btn-lg"><i class="mr-2" data-feather="plus-circle"></i>Tambah Peminjaman</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body table-border-style">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label for="keyword" class="col-sm-1 col-form-label font-bold">Pencarian</label>
                        <div class="col">
                            <div class="input-group">
                                <input type="date" class="form-control" id="keyword" name="keyword" min="1970" value="<?= old('keyword'); ?>" />
                                <button type="submit" class="btn btn-primary btn-lg"><i class="mr-2" data-feather="search"></i>Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Judul Buku</th>
                                <th>Nama Peminjam</th>
                                <th>Denda Jika Terlambat (Perhari) </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1 + (5 * $currentPage - 5); ?>
                                <?php foreach ($peminjaman as $item) : ?>
                                    <?php if ($item['status_peminjaman'] == 1 && $item['status_pengembalian'] == 0) : ?>
                                        <td><?= $i++ ?></td>
                                        <td class="text-truncate"><?= $item['tgl_pinjam'] ?></td>
                                        <td class="text-truncate"><?= $item['tgl_kembali'] ?></td>
                                        <td class="text-truncate">
                                            <?php foreach ($buku as $itemBuku => $value) : ?>
                                                <?php if ($value->id_buku == $item['id_buku']) : ?>
                                                    <?= $value->judul_buku ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td class="text-truncate">
                                            <?php foreach ($anggota as $itemAnggota => $value) : ?>
                                                <?php if ($value->id_anggota == $item['id_anggota']) : ?>
                                                    <?= $value->nama_anggota ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td class="text-truncate">Rp. <?= $item['denda'] ?>,-</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="/pengembalian/<?= $item['id_pinjam']; ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>

                                                    <!-- Hidden Input -->
                                                    <input type="date" hidden class="sr-only" name="tgl_pencatatan" value="<?= $item['tgl_pencatatan']; ?>">
                                                    <input type="number" hidden class="sr-only" name="id_anggota" value="<?= $item['id_anggota']; ?>">
                                                    <input type="number" hidden class="sr-only" name="id_buku" value="<?= $item['id_buku']; ?>">
                                                    <input type="date" hidden class="sr-only" name="tgl_pinjam" value="<?= $item['tgl_pinjam']; ?>">
                                                    <input type="date" hidden class="sr-only" name="tgl_kembali" value="<?= $item['tgl_kembali']; ?>">
                                                    <input type="number" hidden class="sr-only" name="denda" value="<?= $item['denda']; ?>">

                                                    <!-- Modal Button -->
                                                    <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="modal" data-target="#updatePeminjaman<?= $item['id_pinjam']; ?>" data-whatever="@getbootstrap"><i class="mr-2" data-feather="check-square"></i>Ubah Status</button>

                                                    <!-- Modal  -->
                                                    <div class="modal fade" id="updatePeminjaman<?= $item['id_pinjam']; ?>" tabindex="-1" role="dialog" aria-labelledby="updatePeminjamanLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updatePeminjamanLabel">Tanggal Pengembalian</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <label for="tgl_pengembalian" class="col-sm-3 col-form-label">Tanggal</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn  btn-primary">Ubah Status Peminjaman</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="mx-4">

            <div class="d-flex justify-content-center mx-4 my-3">
                <?= $pager->links('peminjaman', 'custom_pagination'); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>
