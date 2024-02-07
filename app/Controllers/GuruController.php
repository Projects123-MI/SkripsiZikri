<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guru;

class GuruController extends BaseController
{
    protected $guru;

    function __construct()
    {
        $this->guru = new Guru();
    }

    public function editGuru($id)
    {
        $dtGuru = $this->guru->where('id',$id)->get()->getRowArray();
        // dd($id);
        // dd($dtProfile);
        $session = session();
        $header['title'] = 'Data guru';
        $header['data'] = $this->guru->where('id',$id)->get()->getRowArray();

        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('guru/edit', $header);
        echo view('layout/footer');
     
    }
    
    public function index()
    {
        $data['gurus'] = $this->guru->findAll();
        // var_dump($data);
        // die;
        $session = session();
        $header['title'] = 'Data guru';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('guru/index', $data, $header);
        echo view('layout/footer');
    }

    public function create()
    {
        $this->guru->insert([
            'name' => $this->request->getPost('name'),
            'nik' => $this->request->getPost('nik'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'jabatan' => $this->request->getPost('jabatan'),
            'pendidikan' => $this->request->getPost('pendidikan'),
        ]);

        return redirect('guru')->with('success', 'Data Added Successfully');
    }
    public function delete($id)
    {
        $guru = new Guru();
        $guru->delete($id);
        return redirect('guru');
    }
    public function edit($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'nik' => $this->request->getPost('nik'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'jabatan' => $this->request->getPost('jabatan'),
            'pendidikan' => $this->request->getPost('pendidikan'),
        ];
        
        $this->guru->update($id,$data);

        return redirect('guru')->with('success', 'Data Updated Successfully');
    }
}
