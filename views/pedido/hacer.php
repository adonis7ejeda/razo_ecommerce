<?php if (isset($_SESSION['identity'])) : ?>
    <div class="section-heading">
        <h2>Hacer pedido</h2>
    </div>
    <p><a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a></p>

    <h3>Direccion para el envio</h3>
    <form action="<?= base_url . 'pedido/add' ?>" method="POST">
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" id="departamento" name="departamento" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="form-group" style="text-align: center;">
            <input type="submit" value="Confirmar pedido" class="btn razo-btn btn-3 mt-15">
        </div>
    </form>

<?php else : ?>
    <div class="section-heading">
        <h2>Por favor inicia sesion</h2>
    </div>
    <p>Necesitas iniciar sesion para poder realizar tu pedido</p>
<?php endif; ?>