<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Guru;
use App\Models\Kegiatan;

class KegiatanController extends BaseController
{
    protected $kegiatan;

    function __construct()
    {
        $this->kegiatan = new Kegiatan();
        $this->guru = new Guru();
    }
    public function index()
    {
        $data['kegiatans'] = $this->kegiatan->findAll();
        $data_guru = $this->kegiatan->getAll()->getResult();
        $data_join =  $this->kegiatan->getGuru()->getResult();
        $data = array(
            'title' => 'Data',
            'data_guru' => $data_guru,
            'kegiatan' => $data_join
        );
        // var_dump($data);
        // die;
        $session = session();
        $header['title'] = 'Data kegiatan';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('kegiatan/index', $data, $header);
        echo view('layout/footer');
    }

    public function editKegiatan($id)
    {

        $data['kegiatans'] = $this->kegiatan->findAll();
        $data_guru = $this->kegiatan->where('id',$id)->get()->getRowArray();
        // dd($data_guru);
        $data_join = $this->kegiatan->getGuruByID($id)->getRowArray();
        // $data_join = $this->kegiatan->getGuru()->getResult();
        // dd($data_join);
        $session = session();
        $header['title'] = 'Data kegiatan'; 
        $header['data_guru'] = $this->kegiatan->where('id',$id)->get()->getRowArray();
        $header['kegiatan'] = $this->kegiatan->getGuruByID($id)->getRowArray();

        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('kegiatan/edit', $header);
        echo view('layout/footer');
     
    }

    public function create()
    {
        $this->kegiatan->insert([
            'id_kegiatan' => $this->request->getPost('id_guru'),
            'id_guru' => $this->request->getPost('id_guru'),
            'jam' => $this->request->getPost('jam'),
            'hari' => $this->request->getPost('hari'),
            'kelas' => $this->request->getPost('kelas'),
        ]);

        return redirect('kegiatan')->with('success', 'Data Added Successfully');
    }
    public function delete($id)
    {
        // dd("halo ini delete"); 
        $kegiatan = new Kegiatan();

        // dd($kegiatan->getKegiatan($id));
        $kegiatan->delete($id);
        return redirect('kegiatan');
    }

    public function edit($id)
    {
        // dd("halo ini edit"); 
        $kegiatan = [
            'id_guru' => $this->request->getPost('id_kegiatan'),
            'jam' => $this->request->getPost('jam'),
            'hari' => $this->request->getPost('hari'),
            'kelas' => $this->request->getPost('kelas'),
        ];
        // dd($kegiatan); 
        $this->kegiatan->updateKegiatan($id,$kegiatan);

        return redirect('kegiatan')->with('success', 'Data Updated Successfully');
    }
}
