<?php
class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $id_categoria;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function getStock()
    {
        return $this->stock;
    }

    function getOferta()
    {
        return $this->oferta;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    function getId_categoria()
    {
        return $this->id_categoria;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM t_productos ORDER BY PRO_ID DESC");
        return $productos;
    }

    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.CAT_NOMBRE AS 'catnombre' FROM t_productos p INNER JOIN t_categorias c ON c.CAT_ID = p.PRO_CATID WHERE p.PRO_CATID = {$this->getId_categoria()} ORDER BY PRO_ID DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM t_productos WHERE PRO_ID = {$this->getId()}");
        return $producto->fetch_object();
    }

    public function getRandom($limit)
    {
        $productos = $this->db->query("SELECT * FROM t_productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function save()
    {
        $sql = "INSERT INTO t_productos VALUES(NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImagen()}', {$this->getId_categoria()})";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE t_productos SET PRO_NOMBRE = '{$this->getNombre()}', PRO_DESCRIPCION = '{$this->getDescripcion()}', PRO_PRECIO = {$this->getPrecio()}, PRO_STOCK = {$this->getStock()}, PRO_CATID = {$this->getId_categoria()} ";

        if ($this->getImagen() != null) {
            $sql .= ", PRO_IMAGEN = '{$this->getImagen()}'";
        }

        $sql .= "WHERE PRO_ID = {$this->id}";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM t_productos WHERE PRO_ID = {$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }
}
