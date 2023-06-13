<div class="container mt-3">
    <!-- NOTIF -->
    <div class="row">
        <div class="col-lg-8">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= BASEURL ?>mahasiswa/cari" method="POST">
                <div class="input-group">
                    <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                        Tambah Data Mahasiswa
                    </button>
                    <input type="text" name="keyword" id="keyword" placeholder="Cari Mahasiswa" class="form-control" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
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
                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="text" class="form-control" id="npm" name="npm">
                    <small id="notif_npm" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <small id="notif_nama" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="nama_prodi">Program Studi</label>
                    <select class="form-control" id="nama_prodi" name="nama_prodi">
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                    </select>
                    <small id="notif_nama_prodi" class="text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_submit_tambah">Tambah Data</button>
                <button type="button" class="btn btn-primary" id="btn_submit_edit">Edit Data</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        //TAMBAH
        $('.tombolTambahData').click(function() {
            $('#formModalLabel').html('Tambah Data Mahasiswa');
            $('#btn_submit_tambah').removeClass('d-none');
            $('#btn_submit_edit').addClass('d-none');
        });
        $('#btn_submit_tambah').click(function() {
            // alert('lol');
            if ($('#npm').val() == '') {
                $('#npm').addClass('border border-danger');
                $('#notif_npm').html('NPM Masih Kosong');
                return false;
            } else {
                $('#npm').removeClass('border border-danger');
                $('#notif_npm').html('');
            }

            if ($('#nama').val() == '') {
                $('#nama').addClass('border border-danger');
                $('#notif_nama').html('Nama Masih Kosong');
                return false;
            } else {
                $('#nama').removeClass('border border-danger');
                $('#notif_nama').html('');
            }

            if ($('#nama_prodi').val() == '') {
                $('#nama_prodi').addClass('border border-danger');
                $('#notif_nama_prodi').html('Nama Prodi Belum Dipilih');
                return false;
            } else {
                $('#nama_prodi').removeClass('border border-danger');
                $('#notif_nama_prodi').html('');
            }

            $.ajax({
                url: "http://localhost/phpmvc/public/mahasiswa/tambah",
                type: "POST",
                data: {
                    npm: $('#npm').val(),
                    nama: $('#nama').val(),
                    nama_prodi: $('#nama_prodi').val(),
                },
                dataType: 'json',
                success: function(res) {
                    if (res == '1') {
                        setTimeout(function() {
                            window.location.replace("http://localhost/phpmvc/public/mahasiswa");
                        }, 2000);
                    } else {
                        setTimeout(function() {
                            window.location.replace("http://localhost/phpmvc/public/mahasiswa");
                        }, 2000);
                    }
                }
            });
        });

        //EDIT
        $('.tampilModalUbah').click(function() {
            $('#formModalLabel').html('Ubah Data Mahasiswa');
            $('#btn_submit_tambah').addClass('d-none');
            $('#btn_submit_edit').removeClass('d-none');

            const id = $(this).data('id');
            $.ajax({
                url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#nama').val(data.nama);
                    $('#npm').val(data.npm);
                    $('#id').val(data.id);
                    $('#nama_prodi').val(data.nama_prodi);
                }
            });
        });
        $('')
    });
</script>