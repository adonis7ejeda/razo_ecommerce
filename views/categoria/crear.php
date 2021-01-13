<?php if (isset($edit) && isset($cat) && is_object($cat)) : ?>
    <div class="section-heading">
        <h2>Editar categoria <?= $cat->CAT_NOMBRE ?></h2>
    </div>
    <?php $url_action = base_url . "categoria/save&id=" . $cat->CAT_ID; ?>
<?php else : ?>
    <div class="section-heading">
        <h2>Crear nuevas categorias</h2>
    </div>
    <?php $url_action = base_url . "categoria/save"; ?>
<?php endif; ?>


<form action="<?= $url_action ?>" method="POST">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= isset($cat) && is_object($cat) ? $cat->CAT_NOMBRE : ''; ?>">
    </div>
    <?php if (isset($_SESSION['insertCat']) && $_SESSION['insertCat'] == 'failed') : ?>
        <strong style="color: red;">Error al insertar categoria</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('insertCat'); ?>
    <div class="form-group" style="text-align: center;">
        <input type="submit" value="Guardar" class="btn razo-btn btn-3 mt-15">
    </div>
</form>