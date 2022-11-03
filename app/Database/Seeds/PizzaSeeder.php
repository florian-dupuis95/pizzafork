<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use Faker\Generator;

class PizzaSeeder extends Seeder {
    public function run() {
        for ($i = 0; $i < 100; $i++) {
            $this->db->table('pizza')->insert($this->createPizza());
        }
    }

    private function createPizza(): array {
        /**
         * @var Generator $faker
         */
        $faker = Factory::create('it_IT');
        $city = $faker->city;

        return [
            'text' => $city, 'picture' => null
        ];
    }
}
