<div class="section-heading">
    <h2>Gestionar categorias</h2>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if (isset($_SESSION['insertCat']) && $_SESSION['insertCat'] == 'complete') : ?>
            <strong style="color: green;">Categoria insertada correctamente</strong>
        <?php endif; ?>
        <?php Utils::deleteSession('insertCat'); ?>

        <?php if (isset($_SESSION['deleteCat']) && $_SESSION['deleteCat'] == 'complete') : ?>
            <strong style="color: green;">Categoria eliminada correctamente</strong>
        <?php endif; ?>
        <?php Utils::deleteSession('deleteCat'); ?>
        <table class="table table-hover table-bordered">
            <tr>
                <th>ID CATEGORIA</th>
                <th>NOMBRE CATEGORIA</th>
                <th>ACCIONES</th>
            </tr>
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <tr>
                    <td><?= $cat->CAT_ID ?></td>
                    <td><?= $cat->CAT_NOMBRE ?></td>
                    <td>
                        <a href="<?= base_url ?>categoria/editar&id=<?= $cat->CAT_ID ?>" class="btn btn-success">Editar</a>
                        <a href="<?= base_url ?>categoria/eliminar&id=<?= $cat->CAT_ID ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <div class="section-heading">
            <a href="<?= base_url ?>categoria/crear" class="btn razo-btn">Crear categoria</a>
        </div>
    </div>
</div>