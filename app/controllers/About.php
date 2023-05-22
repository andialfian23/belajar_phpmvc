<?php
class About extends Controller
{
  public function index($nama = 'Andi Alfian', $pekerjaan = 'Programmer', $umur = 23)
  {
    // echo "Halo, nama saya $nama, pekerjaan $pekerjaan. saya berumur $umur tahun";
    $data = [
      'nama' => $nama,
      'pekerjaan' => $pekerjaan,
      'umur' => $umur,
      'title' => 'Halaman About'
    ];
    $this->view('about/index', $data);
  }
  public function page()
  {
    $data['title'] = 'Pages';
    $this->view('about/page');
  }
}
