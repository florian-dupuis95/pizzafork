<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Entities\Garniture;

class Pizza extends Entity {

    /**@var Garniture[] $ingredients */
    protected $ingredients;
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function __construct(array $data = null) {
        parent::__construct($data);
        $this->ingredients = [];
    }

    public function  getIngredient(int $index): Garniture {
        return $this->ingredients[$index];
    }

    public function setIngredient(Garniture $garniture) {
        $this->ingredients[] = $garniture;
    }

    public function setIngredients(array $ingredients) {
        $this->ingredients=$ingredients;
    }

    public function getIngredients():array {
        return $this->ingredients;
    }

}
