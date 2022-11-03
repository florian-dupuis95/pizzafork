<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IngredientModel;
use App\Entities\Ingredient;

class IngredientController extends BaseController {
    /** @var IngredientModel $ingredientModel */
    protected $ingredientModel;

    public function __construct() {
        $this->helpers = ['form', 'url'];
        $this->ingredientModel = new IngredientModel();
    }

    public function index() {
        $ingredients = $this->ingredientModel->orderBy('id')->findAll();
        $data['ingredients'] = $ingredients;
        $data['title'] = "Les ingredients";
        return view('Ingredient-index.php', $data);
    }

    public function create() {
        $data['title'] = 'Nouvel Ingredient';
        return view('Ingredient-form.php', $data);
    }

    public function delete(int $id) {
        $this->ingredientModel->where(['id' => $id])->delete();
        return redirect()->to('/ingredients')->with('message', 'Ingredient supprimé');
    }

    public function save(int $id = null) {
        $rules = $this->ingredientModel->getValidationRules();
        $rules['picture']=[
            'uploaded[picture]',
            'mime_in[picture,image/jpg,image/jpeg,image/png]',
            'max_size[picture,1024]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $img=$this->request->getFile('picture');
            $img->move('img');
            $form_data = [
                'text' => $this->request->getPost('text'),
                'picture'=> $img->getName(),
            ];
            if (!is_null($id)) {
                $form_data['id'] = $id;
            }
            $ingredient = new Ingredient($form_data);
            $this->ingredientModel->save($ingredient);            
            return redirect()->to('/ingredients')->with('message', 'Ingredient sauvegardé');
        }
    }

    public function edit(int $id) {
        $data['title'] = "Modifier ingredient";
        $data['ingredient'] = $this->ingredientModel->find($id);
        return view('Ingredient-form.php', $data);
    }}
