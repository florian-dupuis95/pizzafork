<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Faker\Factory;
use Faker\Generator;

class GarnitureSeeder extends Seeder {
    public function run() {
        /**
         * @var Generator $faker
         */
        $faker  = factory::create();
        $pizzas = $this->db->table('pizza')->Select()->get()->getResult();
        $tableIngredients = $this->db->table('ingredient');
        $pate   = $tableIngredients->select()->where('text', 'pâte à pizza')->get()->getRow();
        $sauce  = $tableIngredients->select()->where('text', 'sauce tomate')->get()->getRow();
        $idIngredients = $tableIngredients->select('id')->whereNotIn('id', [$pate->id, $sauce->id])->get()->getResult('array');
        foreach ($pizzas as $pizza) {
            $idPizza = $pizza->id;
            // toujours une base pate+sauce tomate
            $this->db->table('garniture')->insert($this->createGarniture($idPizza, $pate->id, 10, 1));
            $this->db->table('garniture')->insert($this->createGarniture($idPizza, $sauce->id, 20, 100));
            $randomIdIngredients = $faker->randomElements($idIngredients, $faker->randomElement(['2', '3', '4']), false);
            $order = 30;
            // print_r($randomIdIngredients);
            foreach ($randomIdIngredients as $idIngredient) {
                $quantity = $faker->randomElement(['50', '100', '150']);
                $this->db->table('garniture')->insert($this->createGarniture($idPizza, $idIngredient['id'], $order, $quantity));
                $order += 10;
            }
        }
    }

    private function createGarniture(int $idPizza, int $idIngredient, int $order, $quantity): array {
        return [
            'idPizza' => $idPizza, 'idIngredient' => $idIngredient, 'order' => $order, 'quantity' => $quantity
        ];
    }
}
