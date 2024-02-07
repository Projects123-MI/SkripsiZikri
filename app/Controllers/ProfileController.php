<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Profile;

class ProfileController extends BaseController
{
    protected $profile;

    function __construct()
    {
        $this->profile = new Profile();
    }
    public function index()
    {
        $data['profiles'] = $this->profile->findAll();
        // var_dump($data);
        // die;
        $session = session();
        $header['title'] = 'Data profile';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('profile/index', $data, $header);
        echo view('layout/footer');
    }

    public function editProfile($id)
    {
        $dtProfile = $this->profile->where('id',$id)->get()->getRowArray();
        // dd($id);
        // dd($dtProfile);
        $session = session();
        $header['title'] = 'Data profile';
        $header['dtProfile'] = $this->profile->where('id',$id)->get()->getRowArray();

        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('profile/edit', $header);
        echo view('layout/footer');
     
    }

    public function create()
    {
        $this->profile->insert([
            'sejarah' => $this->request->getPost('sejarah'),
            'visimisi' => $this->request->getPost('visimisi'),
        ]);

        return redirect('profile')->with('success', 'Data Added Successfully');
    }
    public function delete($id)
    {
        $profile = new Profile();
        $profile->delete($id);

        return redirect('profile');
    }

    public function edit($id)
    {
        $data = [
            'sejarah' => $this->request->getPost('sejarah'),
            'visimisi' => $this->request->getPost('visimisi'),
        ];
        
        $this->profile->update($id,$data);

        return redirect('profile')->with('success', 'Data Updated Successfully');
    }
}
