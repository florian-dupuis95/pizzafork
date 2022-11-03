<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PizzaModel;
use App\Entities\Pizza;

class PizzaController extends BaseController {
    /** @var PizzaModel $pizzaModel */
    protected $pizzaModel;

    public function __construct() {
        $this->helpers = ['form', 'url'];
        $this->pizzaModel = new PizzaModel();
    }

    public function index() {
        $data['pizzas'] = $this->pizzaModel->getAll();
        $data['title'] = "Les pizzas";
        $data['pager']=$this->pizzaModel->pager;
        return view('Pizza-index.php', $data);
    }

    public function create() {
        $data['title'] = 'Nouvelle Pizza';
        return view('Pizza-form.php', $data);
    }

    public function delete(int $id) {
        $this->pizzaModel->delete($id);
        return redirect()->to('/pizzas')->with('message', 'Pizza supprimée');
    }

    public function save(int $id = null) {
        $rules = $this->pizzaModel->getValidationRules();
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $form_data = [
                'text' => $this->request->getPost('text'),
            ];
            if (!is_null($id)) {
                $form_data['id'] = $id;
            }
            $pizza = new Pizza($form_data);
            $this->pizzaModel->save($pizza);
            return redirect()->to('/pizzas')->with('message', 'Pizza sauvegardée');
        }
    }

    public function edit(int $id) {
        $data['title'] = "Modifier pizza";
        $data['pizza'] = $this->pizzaModel->find($id);
        return view('Pizza-form.php', $data);
    }
}
