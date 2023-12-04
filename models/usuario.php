<?php

// se crea la clases privadas con los campos de la tabla de usuario en la db
class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;
    public function __construct(){
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
        return $this->password;
    }
    public function getRol()
    {
        return $this->rol;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

 // Se crean los setter, que permiten asignar valores a las clases

    function setId($id)
    {
        $this->id = $id;
    }   

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string ($nombre);
    }
    
    function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string ($apellidos);
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string ($email);
    }

    function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 8]);
    }

    function setRol($rol)
    {
        $this->rol = $this->db->real_escape_string ($rol);
    }

    function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string ($imagen);
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null)";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
       }
         return  $result;   

         
    }

    

}







?>