<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
        <?= ((session()->has('errors')) ? \Config\Services::validation()->listErrors() : '') ?>
        <form class="form-horizontal" action="<?= (isset($garniture) ? '/pizza/ingredient/save/' . $garniture->id : '/pizza/ingredient/save') ?>" method="post">
            <div class="form-group">
                <label class="sr-only" for="idPizza"></label>
                <input value="<?= (isset($garniture)) ? $garniture->idPizza : $idPizza ?>"type="text" class="sr-only" name="idPizza" id="idPizza">
            </div>
            <div class="form-group">
                <label for="idIngredient">Ingrédient</label>
                <select class="form-control" name="idIngredient" id="idIngredient">
                    <?php foreach ($ingredients as $ingredient) : ?>
                        <option <?= (isset($garniture) && ($ingredient->id == $garniture->ingredient->id) ? 'selected' : '') ?> value="<?= $ingredient->id ?>"><?= $ingredient->text ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class=form-group>
                <form-label for="quantity">Quantité : </form-label>
                <input type="text" class="form-control" name="quantity" id="quantity" value="<?= old('text', $quantity->text ?? '', false) ?>" placeholder="quantité">
            </div>
            <div class=form-group>
                <form-label for="order">Ordre : </form-label>
                <input type="text" class="form-control" name="order" id="order" value="<?= old('text', $order->text ?? '', false) ?>" placeholder="ordre">
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"> Valider</i>
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>