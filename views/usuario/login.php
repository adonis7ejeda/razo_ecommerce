<div class="section-heading">
    <h2>Ingresa aqui</h2>
</div>

<form action="<?= base_url ?>usuario/iniciarSesion" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="contraseña" required>
    </div>
    <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'Identificacion fallida!') : ?>
        <strong style="color: red;">Verifique sus datos!</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('error_login'); ?>
    <div class="form-group" style="text-align: center;">
        <input type="submit" value="Ingresar" class="btn razo-btn btn-3 mt-15">
    </div>
</form>