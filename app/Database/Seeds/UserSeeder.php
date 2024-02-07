<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        $data = [
            'name' => 'Administrator',
            'username' => 'admin',
            'level' => 'Admin',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        print_r($data);
        $this->db->table('users')->insert($data);
    }
}
