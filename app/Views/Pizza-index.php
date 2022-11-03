<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pizza</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pizzas as $pizza) : ?>
                    <tr>
                        <th scope="row"><?= $pizza->id ?></th>
                        <td><?= $pizza->text ?></td>
                        <td>
                            <a href="<?= '/pizza/edit/' . $pizza->id ?>" class="btn btn-primary" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= '/pizza/ingredients/' . $pizza->id ?>" class="btn btn-secondary" role="button">
                                <i class="fas fa-list-ul"></i>
                            </a>
                            <a href="<?= '/pizza/delete/' . $pizza->id ?>" class="btn btn-danger" role="button">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?= $pager->links('default','boostrapPager')?>
    <a class="btn btn-primary" href="/pizza/create"><i class="fas fa-plus"></i></a>
</div>
<?= $this->endSection() ?>