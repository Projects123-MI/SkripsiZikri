<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
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
            'id_guru'       => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'jam'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'hari'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'kelas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('kegiatans', TRUE);
    }

    public function down()
    {
        //
    }
}
