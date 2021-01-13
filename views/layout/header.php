<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title -->
  <title>Razo - Tienda de instrumentos musicales</title>

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url ?>./Recursos/img/core-img/favicon.ico" />

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?= base_url ?>Recursos/style.css" />
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div>
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
      <span>Espere un momento por favor...</span>
    </div>
  </div>
  <!-- /Preloader -->

  <!-- Header Area Start -->
  <header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Classy Menu -->
          <nav class="classy-navbar justify-content-between" id="razoNav">
            <!-- Logo -->
            <a class="nav-brand"><img src="<?= base_url ?>./Recursos/img/core-img/logo.png" alt="" /></a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">
              <!-- Menu Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap">
                  <span class="top"></span><span class="bottom"></span>
                </div>
              </div>

              <!-- Nav Start -->
              <?php $categorias = Utils::showCategorias(); ?>
              <div class="classynav">
                <ul id="nav">
                  <li><a href="<?= base_url ?>">Inicio</a></li>
                  <li>
                    <a>Categorias</a>
                    <ul class="dropdown" style="width: 238px;">
                      <?php while ($cat = $categorias->fetch_object()) : ?>
                        <li><a href="<?= base_url ?>categoria/ver&id=<?= $cat->CAT_ID ?>"><?= $cat->CAT_NOMBRE; ?></a></li>
                      <?php endwhile; ?>
                    </ul>
                  </li>
                  <?php if (!isset($_SESSION['identity'])) : ?>
                    <li><a href="<?= base_url ?>usuario/login">Iniciar Sesion</a></li>
                  <?php else : ?>
                    <li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['admin'])) : ?>
                    <li>
                      <a>Acciones</a>
                      <ul class="dropdown">
                        <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                        <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                        <li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
                      </ul>
                    </li>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['identity'])) : ?>
                    <li>
                      <a><?= $_SESSION['identity']->USU_NOMBRE ?> <?= $_SESSION['identity']->USU_APELLIDOS ?></a>
                      <ul class="dropdown">
                        <li><a href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
                      </ul>
                    </li>
                  <?php else : ?>
                    <li><a href="<?= base_url ?>usuario/registro">Registrate</a></li>
                  <?php endif; ?>
                  <li><a href="<?= base_url ?>carrito/index"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></a></li>
                </ul>
              </div>
              <!-- Nav End -->
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Area End -->

  <!-- Blog Area Start -->
  <div class="container">