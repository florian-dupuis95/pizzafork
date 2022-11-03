<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <?php foreach ($pizzas as $pizza) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $pizza->text ?></h5>
                        <p class="card-text"><?php echo $pizza->text ?></p>
                        <a href="<?= '/panier/create/'.$pizza->id ?>" class="btn btn-primary">ajouter au panier</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <?= $pager->links('default','boostrapPager')?>
</div>
<?= $this->endSection() ?>