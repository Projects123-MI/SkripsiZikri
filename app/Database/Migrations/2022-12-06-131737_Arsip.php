<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Arsip extends Migration
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
            'judul'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'tgl_arsip'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'lampiran'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'ket'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('arsips', TRUE);
    }

    public function down()
    {
        //
    }
}
