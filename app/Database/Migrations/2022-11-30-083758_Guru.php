<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nik'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'tempat_lahir' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'tgl_lahir'      => [
                'type'           => 'DATE',
            ],
            'jk'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'alamat'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'jabatan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'pendidikan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('gurus', TRUE);
    }

    public function down()
    {
        //
    }
}
