<div class="section-heading">
    <h2>Detalle del pedido</h2>
</div>

<?php if (isset($pedido)) : ?>
    <div class="card-group">
        <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <div class="card-header" style="text-align: center;">
                Datos del pedido
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Estado: <?= Utils::showStatus($pedido->PED_ESTADO) ?></li>
                <li class="list-group-item">Numero de pedido: <?= $pedido->PED_ID ?></li>
                <li class="list-group-item">Total a pagar: $<?= number_format($pedido->PED_TOTAL) ?></li>
            </ul>
        </div>


        <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <div class="card-header" style="text-align: center;">
                Productos
            </div>
            <ul class="list-group list-group-flush">
                <?php while ($producto = $productos->fetch_object()) : ?>
                    <li class="list-group-item"><?= $producto->PRO_NOMBRE ?> - $<?= number_format($producto->PRO_PRECIO) ?> - X<?= $producto->LP_UNIDADES ?></li>
                <?php endwhile; ?>
            </ul>
        </div>

        <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <div class="card-header" style="text-align: center;">
                Direccion de envio
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Departamento: <?= $pedido->PED_DEPARTAMENTO ?></li>
                <li class="list-group-item">Ciudad: <?= $pedido->PED_CIUDAD ?></li>
                <li class="list-group-item">Direccion: <?= $pedido->PED_DIRECCION ?></li>
            </ul>
        </div>
    </div>

    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= base_url ?>pedido/estado" method="POST">
            <div class="row">
                <div class="col-md-3" style="margin-top: 5px;">
                    <input type="hidden" value="<?= $pedido->PED_ID ?>" name="pedido_id" />
                    <select name="estado" class="form-control">
                        <option value="confirm" <?= $pedido->PED_ESTADO == "confirm" ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="preparation" <?= $pedido->PED_ESTADO == "preparation" ? 'selected' : ''; ?>>En preparacion</option>
                        <option value="ready" <?= $pedido->PED_ESTADO == "ready" ? 'selected' : ''; ?>>Preparado para enviar</option>
                        <option value="sended" <?= $pedido->PED_ESTADO == "sended" ? 'selected' : ''; ?>>Enviado</option>
                    </select>
                </div>
                <div class="col-md-3" style="margin-bottom: 10px;">
                    <input type="submit" value="Cambiar estado" class="btn razo-btn" />
                </div>
            </div>
        </form>

    <?php endif; ?>

<?php endif; ?>