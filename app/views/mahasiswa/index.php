<div class="container mt-3">

    <div class="row">
        <div class="col-lg-8">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <button type="button" class="btn btn-primary mb-2 tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form action="<?= BASEURL ?>mahasiswa/cari" method="POST">
                <div class="input-group">
                    <input type="text" name="keyword" id="keyword" placeholder="Cari Mahasiswa" class="form-control" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-8">

            <h3>Daftar Mahasiswa</h3>

            <?php foreach ($data['mhs'] as $mhs) : ?>

                <ul class="list-group">
                    <li class="list-group-item">
                        <?= $mhs['nama'] ?>
                        <a href="<?= BASEURL ?>mahasiswa/detail/<?= $mhs['id'] ?>" class="badge badge-primary badge-pill float-end mx-2">Detail</a>
                        <a href="<?= BASEURL ?>mahasiswa/ubah/<?= $mhs['id'] ?>" class="badge badge-success badge-pill float-end mx-2 tampilModalUbah" data-target="#formModal" data-toggle="modal" data-id="<?= $mhs['id'] ?>">Ubah</a>
                        <a href="<?= BASEURL ?>mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge badge-danger badge-pill float-end mx-2" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>mahasiswa/tambah" method="POST">
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Program Studi</label>
                        <select class="form-control" id="nama_prodi" name="nama_prodi">
                            <option>Informatika</option>
                            <option>Teknik Mesin</option>
                            <option>Teknik Sipil</option>
                            <option>Teknik Industri</option>
                            <option>Teknik Elektro</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>

            </div>
        </div>
    </div>
</div>