<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PizzaMigration extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'text' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
            ],
            'picture' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pizza');
    }

    public function down() {
        $this->forge->dropTable('pizza');
    }
}
