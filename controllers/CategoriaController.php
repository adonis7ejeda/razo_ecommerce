<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            $producto = new Producto();
            $producto->setId_categoria($id);
            $productos = $producto->getAllCategory();
        }
        require_once 'views/categoria/ver.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();

        if (isset($_POST) && !empty($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $categoria->setId($id);
                $save = $categoria->edit();
            } else {
                $save = $categoria->save();
            }

            if ($save) {
                $_SESSION['insertCat'] = "complete";
                header("Location:" . base_url . "categoria/index");
            } else {
                $_SESSION['insertCat'] = "failed";
                header("Location:" . base_url . "categoria/crear");
            }
        } else {
            $_SESSION['insertCat'] = "failed";
            header("Location:" . base_url . "categoria/crear");
        }
    }

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();
            require_once 'views/categoria/crear.php';
        } else {
            header('Location:' . base_url . 'categoria/index');
        }
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->delete();
            if ($delete) {
                $_SESSION['deleteCat'] = 'complete';
            } else {
                $_SESSION['deleteCat'] = 'failed';
            }
        } else {
            $_SESSION['deleteCat'] = 'failed';
        }
        header('Location:' . base_url . 'categoria/index');
    }
}
