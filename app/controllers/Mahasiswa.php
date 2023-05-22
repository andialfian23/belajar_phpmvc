<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('mahasiswa/index', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('mahasiswa/detail', $data);
    }
    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
    public function getubah()
    {
        // echo $_POST['id'];
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
    public function cari()
    {
        $data['title'] = 'Cari Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('mahasiswa/index', $data);
    }
}
