<?php
class About extends Controller
{
  public function index($nama = 'Andi Alfian', $pekerjaan = 'Programmer', $umur = 23)
  {
    $data = [
      'nama' => $nama,
      'pekerjaan' => $pekerjaan,
      'umur' => $umur,
      'title' => 'Halaman About'
    ];
    $this->view('about/index', $data);
  }
}
