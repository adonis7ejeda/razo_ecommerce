<?php if (isset($pro)) : ?>
    <?php if ($pro->PRO_STOCK != 0) : ?>
        <div class="section-heading">
            <h2><?= $pro->PRO_NOMBRE ?></h2>
        </div>

        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <?php if ($pro->PRO_IMAGEN != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $pro->PRO_IMAGEN ?>" alt="" />
                    <?php else : ?>
                        <img src="<?= base_url ?>Recursos/img/product-img/default.jpg" alt="" />
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><?= $pro->PRO_DESCRIPCION ?></p>

                        <p class="card-text"><small class="text-muted">$<?= number_format($pro->PRO_PRECIO) ?></small></p>
                    </div>
                    <a href="<?= base_url ?>carrito/add&id=<?= $pro->PRO_ID ?>" class="btn razo-btn">Comprar</a>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="section-heading">
            <h2><?= $pro->PRO_NOMBRE ?></h2>
        </div>

        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <?php if ($pro->PRO_IMAGEN != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $pro->PRO_IMAGEN ?>" alt="" />
                    <?php else : ?>
                        <img src="<?= base_url ?>Recursos/img/product-img/default.jpg" alt="" />
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><?= $pro->PRO_DESCRIPCION ?></p>

                        <p class="card-text"><small class="text-muted">$<?= number_format($pro->PRO_PRECIO) ?></small></p>
                    </div>
                    <h4 style="color: red;">PRODUCTO AGOTADO</h4>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php else : ?>
    <div class="section-heading">
        <h2>El producto no existe</h2>
    </div>
<?php endif; ?>