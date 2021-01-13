<?php

require_once 'models/pedido.php';

class PedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $total = $stats['total'];
            $id_usuario = $_SESSION['identity']->USU_ID;

            if ($departamento && $ciudad && $direccion) {
                $pedido = new Pedido();
                $pedido->setDepartamento($departamento);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setTotal($total);
                $pedido->setId_usuario($id_usuario);

                $save = $pedido->save();

                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }

            header("Location:" . base_url . 'pedido/confirmado');
        } else {
            header("Location:" . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setId_usuario($identity->USU_ID);
            $pedido = $pedido->getOneByUser();
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->PED_ID);
            $stock = new Pedido();
            $update_stock = $stock->update_stock();
        }
        require_once 'views/pedido/confirmado.php';
        unset($_SESSION['carrito']);
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();
        $id_usuario = $_SESSION['identity']->USU_ID;
        $pedido = new Pedido();
        $pedido->setId_usuario($id_usuario);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id =  $_GET['id'];

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        } else {
            header("Location:" . base_url . 'pedido/mis_pedidos');
        }
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            header("Location:" . base_url . 'pedido/detalle&id=' . $id);
        } else {
            header("Location:" . base_url);
        }
    }
}
