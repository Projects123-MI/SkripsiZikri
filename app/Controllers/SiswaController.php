<?php

namespace App\Controllers;

use App\Models\Siswa as ModelsSiswa;

class SiswaController extends BaseController
{
    protected $siswa;

    function __construct()
    {
        $this->siswa = new ModelsSiswa();
    }
    public function index()
    {
        $data['siswas'] = $this->siswa->findAll();
        $session = session();
        $header['title'] = 'Data Siswa';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('siswa/index', $data, $header);
        echo view('layout/footer');
    }

    public function editSiswa($id)
    {
        $dtSiswa = $this->siswa->where('id',$id)->get()->getRowArray();
        // dd($id);
        // dd($dtProfile);
        $session = session();
        $header['title'] = 'Data siswa';
        $header['data'] = $this->siswa->where('id',$id)->get()->getRowArray();

        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('siswa/edit', $header);
        echo view('layout/footer');
     
    }

    public function create()
    {
        $this->siswa->insert([
            'name' => $this->request->getPost('name'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'kelas' => $this->request->getPost('kelas'),
        ]);

        return redirect('siswa')->with('success', 'Data Added Successfully');
    }
     
    public function delete($id)
    {
        $siswa = new ModelsSiswa();
        $siswa->delete($id);
        return redirect('siswa');
    }

    public function edit($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'kelas' => $this->request->getPost('kelas'),
        ];
        
        $this->siswa->update($id,$data);

        return redirect('siswa')->with('success', 'Data Updated Successfully');
    }
}
