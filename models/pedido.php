<?php
class Pedido
{
    private $id;
    private $departamento;
    private $ciudad;
    private $direccion;
    private $total;
    private $estado;
    private $fecha;
    private $hora;
    private $id_usuario;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getDepartamento()
    {
        return $this->departamento;
    }

    function getCiudad()
    {
        return $this->ciudad;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getTotal()
    {
        return $this->total;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getHora()
    {
        return $this->hora;
    }

    function getId_usuario()
    {
        return $this->id_usuario;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setDepartamento($departamento)
    {
        $this->departamento = $this->db->real_escape_string($departamento);
    }

    function setCiudad($ciudad)
    {
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setTotal($total)
    {
        $this->total = $total;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function setHora($hora)
    {
        $this->hora = $hora;
    }

    function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM t_pedidos ORDER BY PED_ID DESC"); /*DUDA*/
        return $productos;
    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM t_pedidos WHERE PED_ID = {$this->getId()}"); /*DUDA*/
        return $producto->fetch_object();
    }

    public function getOneByUser()
    {
        $sql = "SELECT p.PED_ID, p.PED_TOTAL FROM t_pedidos p /*INNER JOIN t_lineas_pedidos lp ON lp.LP_PEDID = p.PED_ID*/ WHERE p.PED_USUID = {$this->getId_usuario()} ORDER BY PED_ID DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM t_pedidos p WHERE p.PED_USUID = {$this->getId_usuario()} ORDER BY PED_ID DESC";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function getProductosByPedido($id)
    {
        // $sql = "SELECT * FROM t_productos WHERE PRO_ID IN(SELECT LP_PROID FROM t_lineas_pedidos WHERE LP_PEDID = {$id})";

        $sql = "SELECT pr.*, lp.LP_UNIDADES FROM t_productos pr INNER JOIN t_lineas_pedidos lp ON pr.PRO_ID = lp.LP_PROID WHERE lp.LP_PEDID = {$id}";

        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save()
    {
        $sql = "INSERT INTO t_pedidos VALUES(NULL, '{$this->getDepartamento()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getTotal()}, 'confirm', CURDATE(), CURTIME(), {$this->getId_usuario()})";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO t_lineas_pedidos VALUES(NULL, {$elemento['unidades']}, {$pedido_id}, {$producto->PRO_ID})";

            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function update_stock()
    {
        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $update = "UPDATE t_productos SET PRO_STOCK = PRO_STOCK - {$elemento['unidades']} WHERE PRO_ID = {$producto->PRO_ID}";

            $save = $this->db->query($update);
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE t_pedidos SET PED_ESTADO = '{$this->getEstado()}' WHERE PED_ID = {$this->getId()}";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
