<div class="section-heading">
    <h2>Carrito de la compra</h2>
</div>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table-hover table table-borderless">
                <tr>
                    <th>IMAGEN</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>UNIDADES</th>
                    <th>ELIMINAR</th>
                </tr>
                <?php
                foreach ($carrito as $indice => $elemento) :
                    $producto = $elemento['producto'];
                    ?>
                    <tr>
                        <td>
                            <?php if ($producto->PRO_IMAGEN != null) : ?>
                                <img src="<?= base_url ?>uploads/images/<?= $producto->PRO_IMAGEN ?>" alt="" style="height: 100px;" />
                            <?php else : ?>
                                <img src="<?= base_url ?>Recursos/img/product-img/default.jpg" alt="" style="height: 100px;" />
                            <?php endif; ?>
                        </td>
                        <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->PRO_ID ?>"><?= $producto->PRO_NOMBRE ?></a></td>
                        <td><?= number_format($producto->PRO_PRECIO) ?></td>
                        <td>
                            <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <?= $elemento['unidades'] ?>
                            <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="btn btn-danger">Quitar producto</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php $stats = Utils::statsCarrito(); ?>
            <div class="section-heading" style="float: left;">
                <a href="<?= base_url ?>carrito/delete_all" class="btn razo-btn">Vaciar carrito</a>
            </div>
            <div class="section-heading" style="float: right;">
                <a href="<?= base_url ?>pedido/hacer" class="btn razo-btn">Hacer pedido</a>
            </div>
            <div class="section-heading" style="float: right; margin-top: 8px;  margin-right: 10px;">
                <p>Precio total: $<?= number_format($stats['total']) ?></p>
            </div>
        </div>
    </div>
<?php else : ?>
    <p>El carrito esta vacio, añade algun producto</p>
<?php endif; ?>