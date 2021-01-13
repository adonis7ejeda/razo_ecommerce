<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <div class="section-heading">
        <h2>Editar producto <?= $pro->PRO_NOMBRE ?></h2>
        <?php $url_action = base_url . "producto/save&id=" . $pro->PRO_ID; ?>
    </div>
<?php else : ?>
    <div class="section-heading">
        <h2>Crear nuevos productos</h2>
        <?php $url_action = base_url . "producto/save"; ?>
    </div>
<?php endif; ?>

<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->PRO_NOMBRE : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->PRO_PRECIO : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->PRO_STOCK : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="categoria">Categoria</label>
            <?php $categorias = Utils::showCategorias(); ?>
            <select class="form-control" name="categoria" id="categoria">
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <option value="<?= $cat->CAT_ID ?>" <?= isset($pro) && is_object($pro) && $cat->CAT_ID == $pro->PRO_CATID ? 'selected' : ''; ?>><?= $cat->CAT_NOMBRE; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" class="form-control"><?= isset($pro) && is_object($pro) ? $pro->PRO_DESCRIPCION : ''; ?></textarea>
    </div>
    <div class="custom-file" style="margin-top: 10px;">
        <input type="file" class="custom-file-input" id="imagen" name="imagen">
        <label class="custom-file-label" for="imagen"><?= isset($pro) && is_object($pro) && !empty($pro->PRO_IMAGEN) ? $pro->PRO_IMAGEN : ''; ?></label>
    </div>

    <?php if (isset($pro) && is_object($pro) && !empty($pro->PRO_IMAGEN)) : ?>
        <img src="<?= base_url ?>uploads/images/<?= $pro->PRO_IMAGEN ?>" class="img-thumbnail" style="max-width: 30%;">
    <?php endif; ?>
    <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
        <strong style="color: red;">Error al crear el producto</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('producto'); ?>
    <div class="form-group" style="text-align: center;">
        <input type="submit" value="Guardar" class="btn razo-btn btn-3 mt-15">
    </div>
</form>