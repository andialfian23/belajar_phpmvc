<?php

class Home extends Controller
{
  public function index()
  {
    $data['title'] = 'Halaman Home';
    $data['nama'] = $this->model('User_model')->getUser();
    $this->view('home/index', $data);
  }
}
