<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1>
            <form-label>#<?= $pizza->id ?> <?= $pizza->text ?></form-label>
        </h1>
    </div>
    <div class="card-body">
        <table class="table table-hover table-stiped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ordre</th>
                    <th scope="col">Ingrédient</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pizza->ingredients as $ingredient): ?>
                    <tr>
                        <th scope="row"><?= $ingredient->id?></th>
                        <td><?= $ingredient->order ?></td>
                        <td><?= $ingredient->ingredient->text ?></td>
                        <td><?= $ingredient->quantity ?></td>
                        <td>
                            <a href="<?= '/pizza/ingredient/edit/' . $ingredient->id?>" class="btn btn-primary" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= '/pizza/ingredient/delete/' . $ingredient->id ?>" class="btn btn-secondary" role="button">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="<?= '/pizza/ingredient/create/' . $pizza->id ?>"><i class="fas fa-plus"></i></a>
</div>
<?= $this->endSection() ?>