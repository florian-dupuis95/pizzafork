<?= $this->extend('page.php') ?>
<?= $this->section('body') ?>
<div class="card">
    <div class="card-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>quantité</th>
                    <th>description</th>
                    <th>prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart->contents() as $item): ?>
                    <tr style="text-aligne: center;">
                        <td style="width: 10%;">
                            <h5> <?= $cart->formatNumber($item['qty']) ?></h5>
                        </td>
                        <td>
                            <h5> <?=$item['name'] ?></h5>
                        </td>
                        <td>
                            <h5><?=  $cart->formatNumber($item['price']) .'&euro;' ?></h5>
                        </td>
                        <td style="width: 5%;">
                            <a href="<?= '/panier/qty/Dec/' . $item['rowid'].  $item['id'].  $item['qty'].  $item['price'].  $item['name'] ?>" class="btn btn-danger" role="button">
                                <i class="fas fa-minus"></i>
                            </a>
                        </td>
                        <td style="width: 5%;">
                            <a href="<?= '/panier/qty/Inc/' .  $item['id'] ?>" class="btn btn-success" role="button">
                                <i class="fas fa-plus"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?= '/panier/item/delete/'. $item['rowid']?>" class="btn btn-danger" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="card-footer">
            <a href="<?= '/payement' ?>" class="btn btn-primary btn-block pay-button" role="button">
                <i class="fas fa-credit-card"></i> procéder au paiment
            </a>
        </div>
    </div>
    <?php $total=0; 
    foreach($cart->contents() as $item):
        $total=$total+(int)$item['qty']*(int)$item['price'];
    endforeach ?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">total</h5>
            <p class="card-text"><?php echo $total ?></p>
        </div>
    </div>

    <?= $this->endSection() ?>
</div>
