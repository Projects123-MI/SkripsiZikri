<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Users;
use App\Models\UsersModel;

class UserController extends BaseController
{
    protected $usersmodel;

    function __construct()
    {
        $this->user = new UsersModel();
    }
    public function index()
    {
        $data['users'] = $this->user->findAll();
        // var_dump($data);
        // die;
        $session = session();
        $header['title'] = 'Data user';
        echo view('layout/header', $header);
        echo view('layout/top_menu');
        echo view('layout/side_menu' . $session->get('nama'));
        echo view('user/index', $data, $header);
        echo view('layout/footer');
    }

    public function create()
    {
        $this->user->insert([
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'level' => $this->request->getPost('level'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ]);

        return redirect('user')->with('success', 'Data Added Successfully');
    }
    public function delete($id)
    {
        $user = new UsersModel();
        $user->delete($id);
        return redirect('user');
    }
}
