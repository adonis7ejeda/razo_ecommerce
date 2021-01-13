  <div class="section-heading">
      <h2>Gestion de productos</h2>
  </div>

  <div class="row">
      <div class="col-md-12">
          <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
              <strong style="color: green;">El producto se ha creado correctamente</strong>
          <?php endif; ?>
          <?php Utils::deleteSession('producto'); ?>

          <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
              <strong style="color: green;">El producto se ha eliminado correctamente</strong>
          <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
              <strong style="color: red;">Error al eliminar el producto</strong>
          <?php endif; ?>
          <?php Utils::deleteSession('delete'); ?>
          <table class="table table-hover table-bordered">
              <tr>
                  <th>ID PRODUCTO</th>
                  <th>NOMBRE PRODUCTO</th>
                  <th>PRECIO PRODUCTO</th>
                  <th>STOCK PRODUCTO</th>
                  <th>ACCIONES</th>
              </tr>
              <?php while ($pro = $productos->fetch_object()) : ?>
                  <tr>
                      <td><?= $pro->PRO_ID ?></td>
                      <td><?= $pro->PRO_NOMBRE ?></td>
                      <td><?= number_format($pro->PRO_PRECIO) ?></td>
                      <td><?= $pro->PRO_STOCK ?></td>
                      <td>
                          <a href="<?= base_url ?>producto/editar&id=<?= $pro->PRO_ID ?>" class="btn btn-success">Editar</a>
                          <a href="<?= base_url ?>producto/eliminar&id=<?= $pro->PRO_ID ?>" class="btn btn-danger">Eliminar</a>
                      </td>
                  </tr>
              <?php endwhile; ?>
          </table>
          <div class="section-heading">
              <a href="<?= base_url ?>producto/crear" class="btn razo-btn">Crear producto</a>
          </div>
      </div>
  </div>