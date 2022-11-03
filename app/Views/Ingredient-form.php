<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
        <?= ((session()->has('errors')) ? \Config\Services::validation()->listErrors() : '') ?>
        <form class="form-horizontal" action="<?= (isset($ingredient) ? '/ingredient/save/' . $ingredient->id : '/ingredient/save') ?>" method="post" enctype="multipart/form-data">
            <div class=form-group>
                <form-label for="text ">Ingredient : </form-label>
                <input type="text" name="text" id="text" value="<?= old('text', $ingredient->text ?? '', false) ?>" placeholder="Nom du nouvel ingrédient">
            </div>
            <div class="form-group">
                <label for="fileName">Image</label>
                <input type="text" name="fileName" id="fileName" class="form-control" value="<?= old('picture', $ingredient->picture ?? '', false) ?>" disabled>
            </div>
            <div class="form-group">
                <input type="button" id="button" value="Choisir un fichier" class="btn btn-secondary" onclick="document.getElementById('picture').click()"/>
                <input type="file" name="picture" id="picture" style="display:none" onchange="document.getElementById('fileName').value = document.getElementById('picture').files[0].name"/>
            </div>
            <?php if(isset($ingredient)){ ?>
                <div class="form-group">
                    <img src="<?= old('picture', base_url('/img/' . $ingredient->picture) ?? '', false) ?>" class="img-fluid-thumbnail" width="200" height="200">
                </div>
            <?php } ?>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-plus"> Valider</i>
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>