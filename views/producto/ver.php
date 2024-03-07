<?php if (isset($pro)): ?>
    <h1>
        <?= $pro->nombre ?>
    </h1>

    <div id="detail-product">
        <div class="image">
            <?php if ($pro->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="Camiseta">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description">
                <?= $pro->descripcion?>
            </p>
            <p class="precie">
                $<?=$pro->precio?>
            </p>
            <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>

<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>