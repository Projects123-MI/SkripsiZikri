<?php

namespace App\Controllers;

use App\Models\Arsip;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\UsersModel;

class Dashboard extends BaseController
{
    protected $guru;
    protected $siswa;
    protected $arsip;
    protected $user;

    function __construct()
    {
        $this->guru = new Guru();
        $this->siswa = new Siswa();
        $this->arsip = new Arsip();
        $this->user = new UsersModel();
    }
    public function index()
    {
        $guru = $this->guru->findAll();
        $siswa = $this->siswa->findAll();
        $arsip = $this->arsip->findAll();
        $user = $this->user->findAll();
        $data = array(
            'title'  => 'Selamat datang di Dashboard',
            'guru'     => '' . count($guru) . '',
            'arsip'     => '' . count($arsip) . '',
            'user'     => '' . count($user) . '',
            'siswa'     => '' . count($siswa) . ''
        );
        // var_dump($data);
        // die;
        $session = session();
        $header['title'] = 'Dashboard';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('dashboard/index', $data);
        echo view('layout/footer');
    }
}
