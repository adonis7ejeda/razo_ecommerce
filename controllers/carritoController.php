<?php

require_once 'models/producto.php';

class carritoController
{
    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $id_producto = $_GET['id'];
        } else {
            header('location:' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $id_producto) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            $producto = new Producto();
            $producto->setId($id_producto);
            $producto = $producto->getOne();

            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->PRO_ID,
                    "precio" => $producto->PRO_PRECIO,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }

        header("Location:" . base_url . "carrito/index");
    }

    public function delete()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            if ($_SESSION['carrito'][$index]['unidades'] < 5) {
                $_SESSION['carrito'][$index]['unidades']++;
            }
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;

            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    }
}
