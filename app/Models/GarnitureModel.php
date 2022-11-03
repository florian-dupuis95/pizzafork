<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Garniture;

class GarnitureModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'garniture';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\Garniture::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idPizza', 'idIngredient', 'order', 'quantity'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'idPizza' => 'required|numeric',
        'idIngredient' => 'required|numeric',
        'order'    => 'required|numeric',
        'quantity' => 'required|numeric',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAll(int $idPizza): array {
        $ingredientModel =new IngredientModel();
        $garnitures=$this->where(['idPizza' => $idPizza])->orderBy('order')->findAll();
        foreach ($garnitures as $garniture){
            $garniture->setIngredient($ingredientModel->find($garniture->idIngredient));
        }
        return $garnitures;
    }

    public function getById(int $id): Garniture {
        $ingredientModel=new IngredientModel();
        $garniture =$this->find($id);
        $garniture->setIngredient($ingredientModel->find($garniture->idIngredient));
        return $garniture;
    }    
}
