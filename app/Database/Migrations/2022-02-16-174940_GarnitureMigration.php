<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GarnitureMigration extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'idPizza' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false,
            ],
            'idIngredient' => [
                'type'       => 'BIGINT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'order' => [
                'type'       => 'INT',
                'constraint' => 8,
                'unsigned'   => true,
                'null'       => true,
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('idPizza', 'pizza', 'id');
        $this->forge->addForeignKey('idIngredient', 'ingredient', 'id');
        $this->forge->addUniqueKey(['idPizza','idIngredient']);
        $this->forge->createTable('garniture');
    }

    public function down() {
        $this->forge->dropTable('garniture');
    }
}
