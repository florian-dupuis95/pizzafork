<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PizzaModel;

class PanierController extends BaseController {

    public function index() {
        $data['title'] = "Le panier";
        $data['cart'] = \Config\Services::cart();
        return view('Panier.php', $data);
    }

    public function add($idPizza) {
        $pizzaModel = new PizzaModel();
        $pizza = $pizzaModel->find($idPizza);
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $idPizza,
            'qty'     => 1,
            'price'   => '30',
            'name'    => addslashes($pizza->text),
        ));
        return redirect()->to('/panier');
    }
    public function delete($rowid) {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to('/panier');
    }
    public function Dec($rowid,$id,$qty,$price,$name) {
        $cart = \Config\Services::cart();
        $cart->update(array(
            'rowid'   => $rowid,
            'id'      => $id,
            'qty'     => (int)$qty-1,
            'price'   => $price,
            'name'    => $name,
         ));
        return redirect()->to('/panier');
    }
}
