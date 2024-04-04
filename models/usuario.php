<?php

// Se la clases privadas para Usuario
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

    //Metodo constructor que cocenta a la base de datos
    public function __construct()
    {
        $this->db = Database::connect();

    }


    // Se crean los getter, que permiten obtener la propriedad actual de la clase
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return  password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 9]);
    }
    public function getRol()
    {
        return $this->rol;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    // Se crean los setter, que permiten asignar un nuevo valor a las clases

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
        $this->rol = $this->db->real_escape_string($rol);
    }

    function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    // Se crea la funcion para validar y guardar la informacion del usuario en bd
    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null)";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    /**
     * Realiza el inicio de sesión del usuario.
     *
     * @return mixed Devuelve el objeto del usuario si el inicio de sesión es exitoso, de lo contrario devuelve false.
     */
    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            //verificar la contraseña
            $verify = password_verify($password, $usuario->password);

            if ($verify) {
                $result = $usuario;
            }
        }

        return $result;
    }



}

