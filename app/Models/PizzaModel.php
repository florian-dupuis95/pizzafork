<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Entities\Pizza;

class PizzaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'pizza';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\Pizza::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['text','picture'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'text' => 'required|string|max_length[40]',
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

    public function getAll(): array {
        $pizzas = $this->orderBy('id')->paginate();
        return $pizzas;
    }

    public function getById(int $idPizza):Pizza {
        $garnitureModel = new GarnitureModel();
        $pizza =$this->find($idPizza);
        $pizza->setIngredients($garnitureModel->getAll($idPizza));
        return $pizza;
    }
    public function save($data): bool{
        if (empty($data)) {
            return true;
        }
        if ($this->shouldUpdate($data)) {
            $response = $this->update($this->getIdValue($data), $data);
        } else {
            $response = $this->insert($data, false);
            $LastInsertId = $this->insertID;
            if($response !== false) {
                $response = true;
            }
            $idIngredient = config('PizzaFork')->idPateAPain;
            $garnitureModel = new GarnitureModel();
            $dataGarniture = [
                'idPizza' => $LastInsertId,
                'idIngredient' => $idIngredient,
                'quantity' =>    1,
                'order' =>   10,
            ];
            $garnitureModel->insert($dataGarniture);
        }
        return $response;
    }
    public function delete($id = null, bool $purge = false) {
        $garnitureModel = new GarnitureModel();
        $garnitureModel->where(['idPizza'=>$id])->delete();
        $result = parent::delete($id);
        return $result;
    }
}
