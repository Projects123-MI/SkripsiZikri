<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profile extends Migration
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
            'sejarah'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'visimisi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('profiles', TRUE);
    }

    public function down()
    {
        //
    }
}
