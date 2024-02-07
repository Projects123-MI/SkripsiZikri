<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kontak;

class KontakController extends BaseController
{
    protected $kontak;

    function __construct()
    {
        $this->kontak = new Kontak();
    }
    public function index()
    {
        $data['kontaks'] = $this->kontak->findAll();
        // var_dump($data);
        // die;
        $session = session();
        $header['title'] = 'Data kontak';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('kontak/index', $data, $header);
        echo view('layout/footer');
    }

    public function create()
    {
        $this->kontak->insert([
            'isi' => $this->request->getPost('isi'),
        ]);

        return redirect('kontak')->with('success', 'Data Added Successfully');
    }
    public function delete($id)
    {
        $kontak = new Kontak();
        $kontak->delete($id);
        return redirect('kontak');
    }
}
