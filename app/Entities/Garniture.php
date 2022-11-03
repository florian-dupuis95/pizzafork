<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Entities\Ingredient;

class Garniture extends Entity {
    /** @var Ingredient $ingredient*/
    protected $ingredient;  
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function __construct(array $data=null) {
        parent:: __construct($data);
        $this->ingredient=null;
    }

    public function getIngredient() : Ingredient {
        return $this->ingredient;
    }

    public function setIngredient(Ingredient $ingredient) {
        $this->ingredient=$ingredient;
    }
}
