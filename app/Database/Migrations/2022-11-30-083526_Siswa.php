<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
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
            'tempat_lahir'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'tgl_lahir' => [
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
            'kelas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('siswas', TRUE);
    }

    public function down()
    {
        //
    }
}
