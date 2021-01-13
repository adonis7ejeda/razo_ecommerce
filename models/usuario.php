<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
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

    function getApellidos()
    {
        return $this->apellidos;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol()
    {
        return $this->rol;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setRol($rol)
    {
        $this->rol = $rol;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function save()
    {
        $sql = "INSERT INTO t_usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL)";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function iniciarSesion()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        $sql = "SELECT * FROM t_usuarios WHERE USU_EMAIL = '$email'";
        $iniciarSesion = $this->db->query($sql);

        if ($iniciarSesion && $iniciarSesion->num_rows == 1) {
            $usuario = $iniciarSesion->fetch_object();
            $verify = password_verify($password, $usuario->USU_PASSWORD);

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
