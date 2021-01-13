      <div class="section-heading">
        <h2>Algunos de nuestros productos</h2>
      </div>
      <!-- Page Features -->
      <div class="row text-center">
        <?php while ($pro = $productos->fetch_object()) : ?>
          <?php if ($pro->PRO_STOCK != 0) : ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
                <a href="<?= base_url ?>producto/ver&id=<?= $pro->PRO_ID ?>">
                  <?php if ($pro->PRO_IMAGEN != null) : ?>
                    <img class="card-img-top" src="<?= base_url ?>uploads/images/<?= $pro->PRO_IMAGEN ?>" alt="" />
                  <?php else : ?>
                    <img class="card-img-top" src="<?= base_url ?>Recursos/img/product-img/default.jpg" alt="" />
                  <?php endif; ?>
                </a>
                <div class="card-body">
                  <a href="<?= base_url ?>producto/ver&id=<?= $pro->PRO_ID ?>">
                    <h4 class="card-title"><?= $pro->PRO_NOMBRE ?></h4>
                    <p class="card-text">$<?= number_format($pro->PRO_PRECIO) ?></p>
                  </a>
                </div>
                <div class="card-footer">
                  <a href="<?= base_url ?>carrito/add&id=<?= $pro->PRO_ID ?>" class="btn razo-btn">Comprar</a>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
                <a href="<?= base_url ?>producto/ver&id=<?= $pro->PRO_ID ?>">
                  <?php if ($pro->PRO_IMAGEN != null) : ?>
                    <img class="card-img-top" src="<?= base_url ?>uploads/images/<?= $pro->PRO_IMAGEN ?>" alt="" />
                  <?php else : ?>
                    <img class="card-img-top" src="<?= base_url ?>Recursos/img/product-img/default.jpg" alt="" />
                  <?php endif; ?>
                </a>
                <div class="card-body">
                  <a href="<?= base_url ?>producto/ver&id=<?= $pro->PRO_ID ?>">
                    <h4 class="card-title"><?= $pro->PRO_NOMBRE ?></h4>
                    <p class="card-text">$<?= number_format($pro->PRO_PRECIO) ?></p>
                  </a>
                </div>
                <div class="card-footer">
                  <h4 style="color: red;">PRODUCTO AGOTADO</h4>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
      <!-- /.row -->