<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <div class="section-heading">
        <h2>Tu pedido se ha confirmado</h2>
    </div>
    <p>Tu pedido ha sido guardado con exito, una vez realices la transferencia bancaria a la cuenta 1597538426 con el total del pedido, sera procesado y enviado.</p>
    <?php if (isset($pedido)) : ?>
        <div class="card" style="width: 18rem; margin: auto; margin-bottom: 20px;">
            <div class="card-header" style="text-align: center;">
                Datos del pedido
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Numero de pedido: <?= $pedido->PED_ID ?></li>
                <li class="list-group-item">Total a pagar: $<?= number_format($pedido->PED_TOTAL) ?></li>
                <!-- <li class="list-group-item" style="text-align: center;">Productos</li> -->
                <div class="card-header" style="text-align: center; border-bottom: none;">
                    Productos
                </div>
                <?php while ($producto = $productos->fetch_object()) : ?>
                    <li class="list-group-item"><?= $producto->PRO_NOMBRE ?> - $<?= number_format($producto->PRO_PRECIO) ?> - X<?= $producto->LP_UNIDADES ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <div class="section-heading">
        <h2>Tu pedido no ha sido procesado</h2>
    </div>
<?php endif; ?>