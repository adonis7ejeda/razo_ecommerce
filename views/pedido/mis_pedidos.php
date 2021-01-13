<?php if (isset($gestion)) : ?>
    <div class="section-heading">
        <h2>Gestionar pedidos</h2>
    </div>
<?php else : ?>
    <div class="section-heading">
        <h2>Mis pedidos</h2>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <tr>
                <th>NUMERO PEDIDO</th>
                <th>TOTAL PEDIDO</th>
                <th>FECHA PEDIDO</th>
                <th>HORA PEDIDO</th>
                <th>ESTADO PEDIDO</th>
            </tr>
            <?php
            while ($ped = $pedidos->fetch_object()) :
                ?>
                <tr>
                    <td>
                        <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->PED_ID ?>"><?= $ped->PED_ID ?></a>
                    </td>
                    <td>
                        $<?= number_format($ped->PED_TOTAL) ?>
                    </td>
                    <td>
                        <?= $ped->PED_FECHA ?>
                    </td>
                    <td>
                        <?= $ped->PED_HORA ?>
                    </td>
                    <td>
                        <?= Utils::showStatus($ped->PED_ESTADO) ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>