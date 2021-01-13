<div class="section-heading">
    <h2>Registrarse</h2>
</div>

<form action="<?= base_url ?>usuario/save" method="POST">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="contraseña" required>
    </div>
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <strong style="color: green;">Registro completado correctamente</strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <strong style="color: red;">Registro fallido, introduce bien los datos</strong>
        <?php endif; ?>
        <?php Utils::deleteSession('register'); ?>
        <div class="form-group" style="text-align: center;">
            <input type="submit" value="Registrarse" class="btn razo-btn btn-3 mt-15">
        </div>
</form>