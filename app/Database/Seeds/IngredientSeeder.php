<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use Faker\Generator;

class IngredientSeeder extends Seeder {
    public function run() {
        $ingredients = [
            'pâte à pizza', 
            'sauce tomate',
            'olives vertes',
            'mozarella', 
            'poivron rouge',
            'poivron jaune',
            'poivron rouge',
            'olives noires',
            'feta',
            'oignons',
            'tomates', 
            'courgettes', 
            'basilic', 
            'pignons', 
            'parmesan', 
            'huile d\'olives', 
            'courgettes'
        ];
        for ($i = 0; $i < count($ingredients); $i++) {
            $this->db->table('ingredient')->insert($this->createIngredient($ingredients[$i]));
        }
    }

    private function createIngredient(string $ingredient): array {
        /**
         * @var Generator $faker
         */
        return [
            'text' => $ingredient, 'picture' => null
        ];
    }
}
