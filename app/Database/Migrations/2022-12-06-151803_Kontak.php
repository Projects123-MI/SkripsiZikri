<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontak extends Migration
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
            'isi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('kontaks', TRUE);
    }

    public function down()
    {
        //
    }
}
