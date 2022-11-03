<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
        <?= ((session()->has('errors')) ? \Config\Services::validation()->listErrors() : '') ?>
        <form class="form-horizontal" action="<?= (isset($pizza) ? '/pizza/save/' . $pizza->id : '/pizza/save') ?>" method="post">
            <div class=form-group>
                <form-label for="text ">Pizza : </form-label>
                <input type="text" name="text" id="text" value="<?= old('text', $pizza->text ?? '', false) ?>" placeholder="Nom de la pizza">
            </div>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"> Valider</i>
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>