<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Arsip;

class ArsipController extends BaseController
{
    protected $arsip;

    function __construct()
    {
        $this->arsip = new Arsip();
    }
    public function index()
    {
        $data['arsips'] = $this->arsip->findAll(); 
        // var_dump($data);
        // die; 
        $session = session();
        $header['title'] = 'Data arsip';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('arsip/index', $data, $header);
        echo view('layout/footer');
    }

    public function create()
    {
        $arsip = new Arsip();
        $dataLampiran = $this->request->getFile('lampiran');
        $file =$dataLampiran->getName();
        // dd($dataLampiran);
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'lampiran' => [
                'rules' => 'uploaded[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/gif,image/png,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf]|max_size[lampiran,12048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png, docx, pdf, xlsx',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $arsip = new Arsip();
        $dataLampiran = $this->request->getFile('lampiran');
        $file =$dataLampiran->getName();
        // dd($dataLampiran);
        // dd($file);


        $fileName = $this->request->getPost('judul')."_".time()."_".$file;

        // dd($fileName);
        $this->arsip->insert([
            'lampiran' => $fileName,
            'judul' => $this->request->getPost('judul'),
            'tgl_arsip' => $this->request->getPost('tgl_arsip'),
            // 'lampiran' => $this->request->getPost('lampiran'),
            'ket' => $this->request->getPost('ket')
        ]);
        $dataLampiran->move('uploads/lampiran/', $fileName);
        session()->setFlashdata('success', 'Berkas Berhasil diupload');
        return redirect('arsip')->with('success', 'Data Added Successfully');
    }
    public function delete($id)
    {
        $arsip = new Arsip();
        $arsip->delete($id);
        return redirect('arsip');
    }
    public function editArsip($id)
    {
       
        $session = session();
        $header['title'] = 'Data arsip';  
        $header['data'] = $this->arsip->where('id',$id)->get()->getRowArray();

        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('arsip/edit', $header);
        echo view('layout/footer');
     
    }
    public function editArsipFile($id)
    {
       
        $session = session();
        $header['title'] = 'Data arsip';  
        $header['data'] = $this->arsip->where('id',$id)->get()->getRowArray();

        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('arsip/editFile', $header);
        echo view('layout/footer');
     
    }

    public function editFile($id)
    {
        if (!$this->validate([
           
            'lampiran' => [
                'rules' => 'uploaded[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/gif,image/png]|max_size[lampiran,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('success', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> '
            .$this->validator->listErrors().' </div>');
            return redirect('arsip')->withInput();
        } 
            $dataLampiran = $this->request->getFile('lampiran');
            $dataLama= $this->request->getVar('fileLama');

            $fileName = $dataLampiran->getRandomName();
        // dd($dataLama);

        if($dataLama!= $fileName)
        {
            // dd("halo ini filenya gak sama cuy");
           
            $dataLampiran->move('uploads/lampiran/', $fileName);
            unlink('uploads/lampiran/'. $dataLama);
        }else{
            $dataLampiran->move('uploads/lampiran/', $fileName);
        }
        $data = [
            'lampiran' => $fileName,
            
        ];
        // dd($data);
        $this->arsip->update($id,$data);

        return redirect('arsip')->with('success', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
        Data Updated Successfully </div>');
    }
    public function edit($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            
        ])) {
            session()->setFlashdata('success', $this->validator->listErrors());
            return redirect('arsip')->withInput();
        } 
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'tgl_arsip' => $this->request->getPost('tgl_arsip'), 
            'ket' => $this->request->getPost('ket')
        ];
        
        $this->arsip->update($id,$data);

        return redirect('arsip')->with('success', 'Data Updated Successfully');
    }

}
