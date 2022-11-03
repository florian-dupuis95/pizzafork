<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PizzaModel;
use App\Entities\Pizza;

class CarteController extends BaseController {
    /** @var PizzaModel $pizzaModel */
    protected $pizzaModel;

    public function __construct() {
        $this->helpers = ['form', 'url'];
        $this->pizzaModel = new PizzaModel();
    }

    public function index() {
        $data['pizzas'] = $this->pizzaModel->getAll();
        $data['title'] = "La carte";
        $data['pager']=$this->pizzaModel->pager;
        return view('Carte.php', $data);
    }
}
